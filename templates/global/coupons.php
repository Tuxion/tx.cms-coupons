<?php namespace components\coupons; if(!defined('TX')) die('No direct access.'); ?>

<h1><?php __($names->component, 'Coupon types'); ?></h1>

<?php
echo $data->types->as_table(array(
  __($names->component, 'Title', true) => 'title',
  __($names->component, 'Name', true) => 'name'
));
?>

<h1><?php __($names->component, 'Coupon list'); ?></h1>

<?php
echo $data->coupons->as_table(array(
  __('ID', true) => 'id',
  __($names->component, 'Key', true) => 'key',
  __($names->component, 'Type', true) => function($row){ return $row->type->title; },
  __('Actions', true) => function($row){ return '<a href="#" data-id="'.$row->id.'" class="edit edit-coupon">Edit</a>'; }
));
?>

<script type="text/javascript">
jQuery(function($){
  $('.edit-coupon').on('click', function(e){
    e.preventDefault();
    <?php /* TODO: Make this type dependent or provide generic editor. */ ?>
    app.Settings.loadView('cms/settings', {settings: 'gallery/coupon_access', coupon_id:$(this).data('id')});
  });
});
</script>