<?php namespace components\coupons\models; if(!defined('TX')) die('No direct access.');

class Coupons extends \dependencies\BaseModel
{
  
  protected static
    
    $table_name = 'coupons_coupons';
  
  public function get_type()
  {
    
    return tx('Sql')
      ->table('coupons', 'CouponTypes')
      ->pk($this->type_id)
      ->execute_single();
    
  }
  
}
