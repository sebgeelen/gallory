<?php
require_once 'mvc/model/gaBaseModel.php';

class imageModel extends baseModel
{

  public function __construct()
  {
    parent::__construct("./db/images.json");
  }
}

?>
