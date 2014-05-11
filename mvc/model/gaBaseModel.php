<?php

class baseModel
{
  private $_jsonSrc;
  private $_jsonRaw;
  private $_jsonData;

  private $_defaultData;

  public function __construct($src, $defaultData = array())
  {
    $this->_jsonSrc     = $src;
    $this->_defaultData = $defaultData;

    $this->_loadJson();
  }

  private function _saveJson()
  {
    $dataString = json_encode($this->_jsonData);
    return file_put_contents($this->_jsonSrc, $dataString);
  }

  private function _loadJson()
  {
    $this->_jsonRaw  = file_get_contents($this->_jsonSrc);
    $this->_jsonData = json_decode($this->_jsonRaw, true);
  }

  private function _allParams ($key, $value)
  {
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

  private function _singleParam ($key, $value)
  {
    $result = $this->_allParams($key, $value);

    if(is_array($result)) {
      return array_shift($result);
    }

    return false;
  }

  /* getters */
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

  /* update */
  public function updateById($id, $data)
  {
    $this->_singleParam("id", $id);

    $this->_saveJson();
  }

  /* put */
  public function add($data)
  {
    $data = array_merge($data, $this->_defaultData);

    $data['id'] = end($this->_jsonData)['id'] + 1 ;
    $data['alias'] = self::slugify($data["name"]);

    $propToInt = array("id", "parentId");
    foreach ($propToInt as $prop) {
      if (isset($data[$prop])) {
        $data[$prop] = intval($data[$prop]);
      }
    }

    $this->_jsonData[] = $data;
    $res = $this->_saveJson();

    if ($res) {
      return $data;
    } else {
      return false;
    }

  }

  /* delete */
  public function removeById($id)
  {
    foreach ($this->_jsonData as $key => $data) {
      if($data["id"] == $id) {
        unset($this->_jsonData[$key]);
        break;
      }
    }

    return $this->_saveJson();
  }

  /* STATIC */
  static function slugify($text)
  {
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    if (function_exists('iconv')) {
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // text is empty
    if (empty($text)) {
      $text = 'n-a';
    }
    // return
    return $text;
  }

}
?>
