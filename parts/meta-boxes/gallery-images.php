<?php
/*
Title: Images
Post Type: gallery
Order: 15
Collapse: false
Priority: high
*/
//require_once __DIR__.'/../../includes/gallery.php';

piklist('field',[
    'type' => 'group',
    'field' => 'cp_gallery',
    'label' => __('Media'),
    'description' => _(''),
    'list' => true,
    'on_post_status' => array( 'value' => 'lock' ),
    'add_more' => true,
    'fields' => get_gallery_fields('cp_gallery'),

]);
