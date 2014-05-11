<?php
require_once 'mvc/model/gaBaseModel.php';

class groupModel extends baseModel
{

  public function __construct()
  {

    parent::__construct(
      "./db/groups.json",
      array(
        "color" => "888888"
      )
    );
  }
}

?>
