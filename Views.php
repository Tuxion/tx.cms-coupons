<?php namespace components\coupons; if(!defined('TX')) die('No direct access.');

class Views extends \dependencies\BaseViews
{
  
  protected
    $default_permission = 2,
    $permissions = array();
  
  protected function coupons()
  {
    return tx('Sql')
      ->table('coupons', 'Coupons')
      ->limit(50)
      ->execute();
  }
  
}
