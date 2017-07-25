<?php
/*
Title: Special Settings
Setting: special_settings
Tab: Index
*/



piklist('field',[
    'type' => 'group',
    'field' => 'special_type',
    'label' => __('Special Type'),
    'description' => _('Special Type - Will show up as checkboxes in special'),
    'add_more' => true,
    'fields' => [
      [
        'type' => 'text',
        'label' => __('Slug'),
        'field' => 'special_slug',
        'columns' => 4
      ],
      [
        'type' => 'text',
        'label' => __('Name'),
        'field' => 'special_name',
        'columns' => 4
      ]
    ]
]);
piklist('field', [
  'type' => 'file',
  'label' => __('VIP Banner'),
  'field' => 'vip_banner',
  'description' => 'Banner that gets added to index to indicate VIP',
  'options' => array(
    'modal_title' => 'Add Bannery'
    ,'button' => 'Add'
  )
]);
piklist('field',[
    'type' => 'group',
    'field' => 'special_properties',
    'label' => __('Properties'),
    'description' => _('Special Properties - Will show up as drop down if more than one'),
    'add_more' => true,
    'fields' => [
      [
        'type' => 'text',
        'label' => __('Name'),
        'field' => 'property_name',
        'columns' => 4
      ],
      [
        'type' => 'file',
        'label' => __('Logo'),
        'field' => 'property_logo',
        'description' => 'Add Logo',
        'options' => array(
          'modal_title' => 'Add Logo'
          ,'button' => 'Add'
        ),
        'columns' => 4
      ]
    ]
]);
