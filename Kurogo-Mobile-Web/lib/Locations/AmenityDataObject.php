<?php

/*
 * Copyright © 2010 - 2013 Modo Labs Inc. All rights reserved.
 *
 * The license governing the contents of this file is located in the LICENSE
 * file located at the root directory of this distribution. If the LICENSE file
 * is missing, please contact sales@modolabs.com.
 *
 */

class AmenityDataObject extends KurogoDataObject {

  protected $icon;
  
  public function setIcon($icon) {
    $this->icon = $icon;
  }
  
  public function getIcon() {
    return $this->icon;
  }
  
  public function filterItem($filters) {
  }
  
}