<?php
require_once 'mvc/model/gaSectionModel.php';
require_once 'mvc/model/gaGroupModel.php';
require_once 'mvc/model/gaImageModel.php';

class mainView
{
  public function __construct()
  {
  }

  public function render($view, $data = null)
  {
    //var_dump($data);
    $this->_renderPhp(
      'mvc/view/'.$view.'.php',
      $data
    );
  }

  private function _renderPhp($file, $vars)
  {
    if (is_array($vars) && !empty($vars)) {
        extract($vars);
    }

    //ob_start();
    include $file;
    exit();
    //return ob_get_clean();
  }

}

?>
