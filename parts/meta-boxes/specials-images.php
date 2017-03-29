<?php
/*
Title: Feature Images
Post Type: specialoff
Order: 20
Collapse: false
Priority: high
*/

piklist('field', array(
  'type' => 'file'
  ,'field' => 'fg-images'
  ,'description' => 'Add images to Special'
  ,'options' => array(
    'modal_title' => 'Add File(s)'
    ,'button' => 'Add'
  )
));
