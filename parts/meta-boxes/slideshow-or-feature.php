<?php
/*
Title: Images(s)
Post Type: page, special, post, lp
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

$label = get_post_type() == 'lp' ? __('Gallery') : __('Sidebar Gallery');
piklist('field',[
    'type' => 'select',
    'label' => $label,
    'field' => 'sidebar-gallery',
    'choices' => get_slideshow_choices('gallery')

]);
