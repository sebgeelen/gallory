<?php
require_once 'mvc/model/gaSectionModel.php';
require_once 'mvc/model/gaGroupModel.php';
require_once 'mvc/model/gaImageModel.php';

require_once 'mvc/view/gaMainView.php';

class adminController
{
  private $_salt            = "dxa<<?./+%>gf_)°klqs$`ù^)--";
  private $_loggedCookieVal = "94fDUJi351-678::Brt";

  private $_sections;
  private $_groups;
  private $_images;

  private $_viewManager;

  public function __construct()
  {
    $this->_sections    = new sectionModel();
    $this->_groups      = new groupModel();
    $this->_images      = new imageModel();

    $this->_viewManager  = new mainView();
  }

  public function route($query)
  {
      $this->_adminRoute($query);
  }

  private function _adminRoute($query)
  {
    if(!isset($query[0])) {
      $query[0] = null;
    }

    if($query[0] == 'login') {

      $this->_displayLogin();

    } else if($this->_isLogged()) {

      // default namespaced pages
      $pagesAvailable = array(
        'addImage', 'addGroup', 'addSection',
        'editImage', 'editGroup', 'editSection',
        'delImage', 'delGroup', 'delSection'
      );
      if(in_array($query[0], $pagesAvailable)) {
        $this->_displayPage(ucfirst($query[0]));
      }

      // other pages
      switch ($query[0]) {
        case 'logoff':
          $this->logMeOff();
          break;
        case 'post':
          $this->_processPostRequest();
          break;
        case 'home':
        default:
          $this->_displayHome();
          break;
      }

    } else {
      $this->_viewManager->render('404');
    }
  }
  private function _isLogged() {
    return isset($_COOKIE["lgok"]) && $_COOKIE["lgok"] === $this->_loggedCookieVal;
  }

  private function _processPostRequest()
  {
    if(isset($_POST["action"]) && $this->_isLogged()) {

      $action = $_POST['action'];
      unset($_POST['action']);

      switch ($action) {
        case 'addImage':
          break;
        case 'addGroup':
          $this->_groups->add($_POST);
          break;
        case 'addSection':

          break;
      }
    } else {
      $this->_viewManager->render('404');
    }
  }

  private function _logMeOff() {
    setcookie('lgok', '', time() - ( 3600 * 24 ), '/admin');
  }

  private function _logMeIn($until = null) {
    if(is_null($until)) {
      $until = time() + ( 3600 * 24 );  // tomorow
    }

    setcookie('lgok', $this->_loggedCookieVal, $until, '/admin');

    $redirect = "http://".$_SERVER['HTTP_HOST'] . '/admin/home';
    header("Location: $redirect");
    exit();
  }

  /* * * * * * * * * pages */
  private function _displayLogin()
  {
    if(isset($_POST["pwd"]) && sha1($_POST["pwd"] . $this->_salt) === sha1("rantanplan" . $this->_salt)) {     // try to login, TODO store the sha1Version
      $this->_logMeIn();
    } else if ($this->_isLogged()) {
      $redirect = "http://".$_SERVER['HTTP_HOST'] . '/admin/home/';
      header("Location: $redirect");
    } else {
      echo $this->_viewManager->render('login');
    }
  }

  private function _displayHome()
  {
    echo $this->_viewManager->render('adminHome');
  }

  private function _displayPage($pageName)
  {
    $sections = $this->_sections->getAll();
    $groups   = $this->_groups->getAll();
    $images   = $this->_images->getAll();

    $data = array(
      "sections" => $sections,
      "groups"   => $groups,
      "images"   => $images
    );

    echo $this->_viewManager->render('admin' . $pageName, $data);
  }

}

?>
