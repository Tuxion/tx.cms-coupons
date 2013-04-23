<?php namespace components\coupons; if(!defined('TX')) die('No direct access.');

//Make sure we have the things we need for this class.
tx('Component')->check('update');
tx('Component')->load('update', 'classes\\BaseDBUpdates', false);

class DBUpdates extends \components\update\classes\BaseDBUpdates
{
  
  protected
    $component = 'coupons',
    $updates = array(
    );
  
  public function install_0_1($dummydata, $forced)
  {
    
    if($forced === true){
      tx('Sql')->query('DROP TABLE IF EXISTS `#__coupons_coupons`');
      tx('Sql')->query('DROP TABLE IF EXISTS `#__coupons_coupon_types`');
    }
    
    tx('Sql')->query('
      CREATE TABLE `#__coupons_coupons` (
        `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `key` varchar(255) NOT NULL,
        `type_id` int(10) UNSIGNED NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `key` (`key`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8
    ');
    
    tx('Sql')->query('
      CREATE TABLE `#__coupons_coupon_types` (
        `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `title` varchar(255) NOT NULL,
        `target_component_name` varchar(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `name` (`name`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8
    ');
    
    //Queue self-deployment with CMS component.
    $this->queue(array(
      'component' => 'cms',
      'min_version' => '3.0'
      ), function($version){
        
        tx('Component')->helpers('cms')->_call('ensure_pagetypes', array(
          array(
            'name' => 'coupons',
            'title' => 'Coupon system'
          ),
          array(
            'coupons' => 'MANAGER'
          )
        ));
        
      }
    ); //END - Queue CMS 3.0+
    
  }
  
}
