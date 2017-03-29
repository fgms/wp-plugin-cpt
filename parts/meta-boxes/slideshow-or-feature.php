<?php
/*
Title: Slideshow / Gallery Settings
Post Type: page,  special, post
Order: 5
Collapse: false
Priority: high
*/
require_once __DIR__.'/../../includes/slideshow.php';

piklist('field',[
    'type' => 'group',
    'field' => 'slideshow',
    'label' => __('Slideshow / Feature Image'),
    'description' => _(''),
    'add_more' => false,
    'fields' => get_slideshow_fields('slideshow')
]);

piklist('field',[
    'type' => 'select',
    'label' => __('Sidebar Gallery'),
    'field' => 'sidebar-gallery',
    'choices' => get_slideshow_choices('gallery')

]);
