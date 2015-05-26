<?php

namespace LCM\BrightcoveBundle\API;

use BCMAPI as BrightcoveBase;

/**
 * Wrapper for the brightcove api class
 * @author jspizziri <jacob.spizziri@gmail.com>
 */
class Brightcove extends BrightcoveBase {

  /**
   * Alias find methods
   */
  public function __call($method, $args) {
    if (strlen($method) > 4 && substr($method, 0,4) == 'find') {

      $rest = substr($method, 4, strlen($method) - 1);
      array_unshift($args, strtolower($rest));

      return call_user_func_array('find', $args);
    }
  }
}