<?php
/*
Title: Extras
Post Type: page, special
Order: 0
Collapse: false
Priority: high
*/

piklist('field',[
  'type' => 'textarea',
  'label' => __('Intro Text'),
  'field' => 'intro-text',
  'columns' => 12,
  'attributes' => array(
      'rows' => 5,
      'cols' => 50,
      'class' => 'large-text'
    )
]);
