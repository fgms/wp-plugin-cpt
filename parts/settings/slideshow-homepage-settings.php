<?php
/*
Title: Homepage
Setting: disabled_slideshow_settings
Order: 20
*/

require_once __DIR__.'/../../includes/slideshow.php';

piklist('field',[
    'type' => 'group',
    'field' => 'home',
    'label' => __('Home Page Slideshow'),
    'description' => _('Main Slideshow<br/>Multiple feature images will be randomized'),
    'add_more' => false,
    'fields' => get_slideshow_fields('home')
]);
