<?php
require_once 'mvc/model/gaSectionModel.php';
require_once 'mvc/model/gaGroupModel.php';
require_once 'mvc/model/gaImageModel.php';

require_once 'mvc/view/gaMainView.php';

class mainController
{
  const SALT = "dxa<<?./+%>gf_)°klqs$`ù^)--";
  const LOGGED_COOKIE_VAL = "94fDUJi351-678::Brt";
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
    if(!$this->_isLogged() && $query[0] == 'login') {

      $this->_displayLogin();

    } else if($this->_isLogged()) {

      switch ($query[0]) {
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
    return isset($_COOKIE["lgok"]) && $_COOKIE["lgok"] === LOGGED_COOKIE_VAL;
  }

  public function _displayHome()
  {
    echo $this->_viewManager->render('adminHome');
  }

  public function _displayLogin()
  {
    if(isset($_POST["pwd"]) && sha1($_POST["pwd"] . SALT) === sha1("rantanplan" . SALT)) {     // try to login, TODO store the sha1Version
      $tomorow = time() + ( 3600 * 24 );

      setcookie('lgok', LOGGED_COOKIE_VAL, $tomorow, '/admin');

      $redirect = "http://".$_SERVER['HTTP_HOST'] . 'admin/home';
      header("Location: $redirect");
      exit();
    }
    echo $this->_viewManager->render('login');
  }

}

?>
