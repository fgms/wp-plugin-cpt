<?php
/*
Title: Feature Box
Post Type: special
Order: 3
Collapse: false
Priority: high
*/

piklist('field',[
  'type' => 'textarea',
  'label' => __('Hover Summary'),
  'field' => 'fg-hover-text',
  'columns' => 12
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Hover Button Text'),
  'field' => 'fg-hover-button-text',
  'columns' => 12
]);
