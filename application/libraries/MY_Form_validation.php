<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class MY_Form_validation extends CI_Form_validation
  {
     public function __construct($rules = array())
      {
        parent::__construct($rules);
      }

      public function error_array()
      {
        if (count($this->_error_array) === 0)
          return FALSE;
        else
          return $this->_error_array;
      }
  }
?>