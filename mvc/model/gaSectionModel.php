<?php
require_once 'mvc/model/gaBaseModel.php';

class sectionModel extends baseModel
{

  public function __construct()
  {

    parent::__construct("./db/sections.json");
  }
}

?>
