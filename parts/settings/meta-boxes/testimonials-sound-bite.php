<?php
/*
Title: Sound Bites
Post Type: testimonial
Order: 20
Collapse: false
Priority: high
*/

piklist('field',[
  'type' => 'group',
  'field' => 'testimonial-sound-bite',
  'description' => __('You can create multiple short snippets from a full testimonial.  These sound bites will be randomized and displayed via any testimonial widgets.'),
  'add_more' => true,
  'fields' => [ 

  [
      'type' => 'text',
      'label' => __('Sound Bite'),
      'field' => 'fg-testimonial-bite',
      'columns' => 12
  ]
  
]
]);