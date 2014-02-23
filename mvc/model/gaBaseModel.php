<?php

class baseModel
{
  private $_jsonSrc;
  private $_jsonRaw;
  private $_jsonData;

  public function __construct($src)
  {
    $this->_jsonSrc = $src;
    $this->_loadJson();
  }

  private function _saveJson()
  {

  }
  private function _loadJson()
  {
    $this->_jsonRaw = file_get_contents($this->_jsonSrc);
    $this->_jsonData = json_decode($this->_jsonRaw, true);
  }

  public function getAll()
  {
    return $this->_jsonData;
  }

  public function getById($id)
  {
    return $this->_singleParam("id", $id);
  }

  public function getByParentId($id)
  {
    return $this->_allParams("parentId", $id);
  }

  public function getByAlias($alias)
  {
    return $this->_singleParam("alias", $alias);
  }

  private function _allParams ($key, $value) {
    $result = array();
    foreach ($this->_jsonData as $data) {
      if($data[$key] == $value) {
        $result[] = $data;
      }
    }

    if(empty($result)) {
      $result = false;
    }

    return $result;
  }

  private function _singleParam ($key, $value) {
    $result = $this->_allParams($key, $value);

    if(is_array($result)) {
      return array_shift($result);
    }

    return false;
  }
}
?>
