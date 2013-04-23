<?php namespace components\coupons; if(!defined('TX')) die('No direct access.');

class Helpers extends \dependencies\BaseComponent
{
  
  public function table__type(\dependencies\Table $table, $type)
  {
    
    $type = tx('Sql')
      ->table('coupons', 'CouponTypes')
      ->where('name', "'$type'")
      ->execute_single()
      ->is('empty', function()use($type){
        throw new \exception\Programmer('No coupon type called: %s', $type);
      });
    
    $table->where('type_id', $type->id);
    
  }
  
}
