<?php namespace components\coupons; if(!defined('TX')) die('No direct access.');

class Views extends \dependencies\BaseViews
{
  
  protected
    $default_permission = 2,
    $permissions = array();
  
  protected function coupons()
  {
    
    return array(
      'types' => tx('Sql')
        ->table('coupons', 'CouponTypes')
        ->order('title')
        ->execute(),
      'coupons' => tx('Sql')
        ->table('coupons', 'Coupons')
        ->order('type_id')
        ->execute()
    );
    
  }
  
}
