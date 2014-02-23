<?php
require_once 'mvc/model/gaSectionModel.php';
require_once 'mvc/model/gaGroupModel.php';
require_once 'mvc/model/gaImageModel.php';

require_once 'mvc/view/gaMainView.php';

class mainController
{

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

    //var_dump($this->_sections->getById(0));
  }

  public function route($rawQuery)
  {
    $query = explode("/", $rawQuery);

    if(end($query) == '') {
      array_pop($query);
    }

    if($query[0] == "admin") {
      array_shift($query);
      $this->_adminRoute($query);
    } else {
      $this->_normalRoute($query);
    }

  }

  private function _adminRoute($query)
  {
    if(!$this->isLogged() && $query[0] == 'login') {

      $this->_displayLogin();

    } else if($this->isLogged()) {

      // admin sections

    } else {
      $this->_viewManager->render('404');
    }
  }

  private function _normalRoute($query)
  {
    $queryLength = count($query);

    if($queryLength == 0) {
      $this->_displayHome();
    } else if ($queryLength == 1) {
      $this->_displaySection($query);
    } else if ($queryLength == 2) {
      $this->_displayGroup($query);
    } else {
      $this->_displayImage($query);
    }
  }

  public function _displayHome()
  {
    $data = array(
      "sections" => $this->_sections->getAll()
    );

    echo $this->_viewManager->render('home', $data);
  }

  public function _displaySection($query)
  {
    $section = $this->_sections->getByAlias(array_shift($query));

    if(!$section) {
      echo $this->_viewManager->render('404');
    }

    $data = array(
      "section" => $section,
      "groups"  => $this->_groups->getByParentId($section['id'])
    );

    echo $this->_viewManager->render('section', $data);
  }

  public function _displayGroup($query)
  {
    $section = $this->_sections->getByAlias(array_shift($query));
    $group   = $this->_groups->getByAlias(array_shift($query));

    if(!$section || !$group) {
      echo $this->_viewManager->render('404');
    }

    $data = array(
      "section" => $section,
      "group"   => $group,
      "images"  => $this->_images->getByParentId($group['id'])
    );

    echo $this->_viewManager->render('group', $data);
  }

  public function _displayImage($query)
  {
    $section = $this->_sections->getByAlias(array_shift($query));
    $group   = $this->_groups->getByAlias(array_shift($query));
    $image   = $this->_images->getByAlias(array_shift($query));

    if(!$section || !$group || !$image) {
      echo $this->_viewManager->render('404');
    }

    $data = array(
      "section" => $this->_sections->getByAlias(array_shift($query)),
      "group"   => $this->_groups->getByAlias(array_shift($query)),
      "image"   => $this->_images->getByAlias(array_shift($query))
    );

    echo $this->_viewManager->render('image', $data);
  }

}

?>
