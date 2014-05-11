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
        'delImage', 'delGroup', 'delSection',
        'resize'
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

  private function _uploadImage($name) {
    if($_FILES['img']['error']) {
      return false;
    }

    $info    = pathinfo($_FILES['img']['name']);
    $ext     = $info['extension']; // get the extension of the file
    if($ext == 'jpg' || $ext == 'jpeg' ) {

      $target = 'gallery/big/' . $name . '.jpg';
      move_uploaded_file($_FILES['img']['tmp_name'], $target);

    } else {
      return false;
    }
  }

  private function _processPostRequest()
  {
    if(isset($_POST["action"]) && $this->_isLogged()) {

      $action = $_POST['action'];
      unset($_POST['action']);
      //var_dump($_POST);

      switch ($action) {

        case 'addImage':
          $data = $this->_images->add($_POST);
          $this->_uploadImage($data['alias']);
          $this->_viewManager->render('adminResize', array('newImageName' => $data['alias']));
          break;
        case 'addGroup':
          $res = $this->_groups->add($_POST);
          break;
        case 'addSection':
          $res = $this->_sections->add($_POST);
          break;

        case 'delImage':
          $res = $this->_images->removeById($_POST['id']);
          break;
        case 'delGroup':
          $res = $this->_groups->removeById($_POST['id']);
          break;
        case 'delSection':
          $res = $this->_sections->removeById($_POST['id']);
          break;

        case 'editGroup':
          $res = $this->_groups->updateById($_POST);
          break;
        case 'editGroup':
          $res = $this->_sections->updateById($_POST);
          break;

      }
      $this->_redirect('/admin/home/');
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
    $this->_redirect('/admin/home/');
  }

  /* * * * * * * * * pages */
  private function _displayLogin()
  {
    if(isset($_POST["pwd"]) && sha1($_POST["pwd"] . $this->_salt) === sha1("rantanplan" . $this->_salt)) {     // try to login, TODO store the sha1Version
      $this->_logMeIn();
    } else if ($this->_isLogged()) {
      $this->_redirect('/admin/home/');
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

  private function _redirect($page)
  {
    $redirect = "http://".$_SERVER['HTTP_HOST'] . $page;
    header("Location: $redirect");
    exit();
  }

}

?>
