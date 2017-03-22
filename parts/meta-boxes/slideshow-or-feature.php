<?php
/*
Title: Slide Show / Feature Image Settings
Post Type: page,  specials, post
Order: 5
Collapse: false
Priority: high
*/
require_once __DIR__.'/../../includes/slideshow.php';

piklist('field',[
    'type' => 'group',
    'field' => 'slideshow',
    'label' => __(''),
    'description' => _(''),
    'add_more' => false,          
    'fields' => get_slideshow_fields('slideshow')
]);