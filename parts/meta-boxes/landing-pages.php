<?php
/*
Title: Details
Post Type: lp
Order: 10
Collapse: false
Priority: high
*/
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


piklist('field',  [
    'type' => 'text',
    'label' => __('Subtitle'),
    'field' => 'subtitle',
    'description' => 'The subtitle will appear as an H2 just below the primary H1.',
    'columns' => 12
]);


piklist('field',   [
    'type' => 'editor',
    'field' => 'description',
    'label' => __('Content'),
    'description' => __('The content area contains the body of your landing page message.'),
    'options' => $piklist_editor_options,
    'columns' => 12
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'boilerplate',
  'label' => __('Boilerplate'),
  'description'=> __(''),
  'value' => (empty($options['boilerplate'])) ? '': $options['boilerplate'],
  'options' => $piklist_editor_options
]);

piklist('field',   [
    'type' => 'editor',
    'field' => 'calltoaction',
    'label' => __('Call To Action'),
    'description' => __(''),
    'value' => '',
    'options' => $piklist_editor_options,
    'columns' => 12
]);


$options = get_option('landingpage_settings');
piklist('field',[
  'type' => 'text',
  'field'=> 'phone',
  'value' => (empty($options['phone'])) ? '': $options['phone'],
  'label' => __('Action Phone Number'),
  'description' => ''
]);

piklist('field',  [
    'type' => 'text',
    'label' => __('Booking URL'),
    'field' => 'booking_url',
    'columns' => 8,
    'value'  => (empty($options['booking_url'])) ? '': $options['booking_url']
]);

if (! empty($options['cta_sidebar'])){
  $choices = [''=>'-- Select --'];
  foreach ($options['cta_sidebar'] as $choice){
    if (!empty($choice['cta_id'])){
      $choices[$choice['cta_id']] = $choice['cta_id'];
    }
  }
  piklist('field',[
    'type' => 'select',
    'field'=> 'cta_sidebar',
    'label' => __('CTA Sidebar'),
    'required' => true,
    'description' => '',
    'choices' => $choices
  ]);
}



piklist('field',[
  'type' => 'editor',
  'field' => 'termsandconditions',
  'label' => __('Terms and Conditions'),
  'description'=> __(''),
  'value' => (empty($options['termsandconditions'])) ? '': $options['termsandconditions'],
  'options' => $piklist_editor_options
]);



piklist('field', [
    'type' => 'file',
    'field' => 'background_image',
    'label' => 'Background Image',
    'options' => array('button' => 'Add Image'),
    'columns' => 4,
    'value'  => (empty($options['background_image'])) ? '': $options['background_image']
]);
