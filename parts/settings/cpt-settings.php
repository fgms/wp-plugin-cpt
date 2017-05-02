<?php
/*
Title: Settings.
Setting: cpt_settings
Order: 10
*/

piklist('field',[
    'type' => 'checkbox',
    'field' => 'awards-enable',
    'label' => __('Awards:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'testimonials-enable',
    'label' => __('Testimonials:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'specials-enable',
    'label' => __('Specials:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'slideshows-enable',
    'label' => __('Slideshows:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'galleries-enable',
    'label' => __('Galleries:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'announcements-enable',
    'label' => __('Announcements:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable '
    ],
    'value' => 'disable'
]);

piklist('field',[
    'type' => 'checkbox',
    'field' => 'clippings-enable',
    'label' => __('Media Clippings:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'newsletters-enable',
    'label' => __('Newsletters:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'realestate-enable',
    'label' => __('Real Estate:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
