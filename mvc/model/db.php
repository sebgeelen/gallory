<?php

class galloryDb
{
  private $_sectionsSrc;
  private $_groupsSrc;
  private $_imagesSrc;

  private $_sectionsJson;
  private $_groupsJson;
  private $_imagesJson;

  private function __construct()
  {
    $this->_sectionsSrc = "./sections.json";
    $this->_groupsSrc = "./groups.json";
    $this->_imagesSrc = "./images.json";

    $this->_loadDb();
  }

  private function _saveDb()
  {

  }
  private function _loadDb()
  {

  }

  public function getSections()
  {

  }

  public function getGroups()
  {

  }
  public function getGroupsInSection( $sectionId )
  {

  }

  public function getImages()
  {

  }
  public function getImagesInGroup( $groupId )
  {

  }

  public function updateSectionById( $id )
  {

  }
  public function updateGroupById( $id )
  {

  }
  public function updateImageById( $id )
  {

  }

}

?>
