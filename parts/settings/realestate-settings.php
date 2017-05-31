<?php
/*
Title: Defaults
Setting: realestate_settings
Order: 10
*/

piklist('field',[
  'type' => 'text',
  'field'=> 'realestate_units',
  'value' => 'Euros',
  'label' => __('Price Units'),
  'description' => ''
]);

$piklist_editor_options = array( // Pass any option that is accepted by wp_editor()
      'wpautop' => false,
      'media_buttons' => true,
      'shortcode_buttons' => true,
      'teeny' => true,
      'dfw' => false,
      'quicktags' => true,
      'drag_drop_upload' => true,
      'tinymce' => array(
        'resize' => false,
        'wp_autoresize_on' => true
      )
);

$choices_array = array(''=>'-- Select Menu -- ');
$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );

foreach ( $menus as $menu ) {
   $choices_array[$menu->term_id] =  $menu->name;
}
/*
piklist('field',  [
    'type' => 'editor',
    'field' => 'sidebar-before-menu-editor',
    'label' => __('Content Before Nav'),
    'options' => $piklist_editor_options,
    'description'=> __('')

]);*/

piklist('field',  [
    'type' => 'checkbox',
    'field' => 'sidebar-override',
    'label' => '',
    'choices' => [
        'yes' => 'Use Custom Menu',
    ],
    'value' => 'no',
    'columns' => 12
]);

piklist('field',  [
    'type' => 'select',
    'label' => __('Choose Menu'),
    'field' => 'sidebar-override-menu',
    'choices' => $choices_array,
    'conditions' => [
      [
        'field' => 'sidebar-override',
        'value' => 'yes'
      ]
    ]
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Index Title'),
  'field' => 'realestate_title',
  'columns' => 12
]);
piklist('field',[
  'type' => 'editor',
  'field' => 'realestate_pre_text',
  'label' => __('Index Pre Text'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'realestate_post_text',
  'label' => __('Index Post Text'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'realestate_call_to_action',
  'label' => __('Display Page Call To Action'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);
/*
piklist('field',  [
    'type' => 'editor',
    'field' => 'sidebar-after-menu-editor',
    'label' => __('Content After Nav'),
    'options' => $piklist_editor_options,
    'description'=> __('')

]);

piklist('field',  [
    'type'          => 'checkbox',
    'field'         => 'sidebar-testimonials',
    'label'         => __(''),
    'description'   => __(''),
    'choices'       => [
        'true'  => 'Testimonial Widget'
    ]
]);*/
