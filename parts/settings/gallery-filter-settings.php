<?php
/*
Title: Filters
Setting: gallery_settings
Order: 10
*/
require_once __DIR__.'/../../includes/slideshow.php';
piklist('field',[
    'type' => 'group',
    'field' => 'gallery',
    'label' => __(''),
    'description' => _('Used for creating galleries, creates checkbox items to add filter'),
    'add_more' => true,
    'fields' => [
      [
          'type' => 'text',
          'label' => __('Filter Name'),
          'field' => 'filters',
      ]
    ]
]);
