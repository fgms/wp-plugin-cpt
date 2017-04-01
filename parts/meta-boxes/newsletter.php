<?php
/*
Title: Newsletter
Post Type: newsletter
Order: 10
Collapse: false
Priority: high
*/
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Release Date'),
  'field' => 'fg-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'MM d, yy'
    )
]);
piklist('field', [
    'type' => 'file',
    'field' => 'newsletter-pdf',
    'label' => 'PDF',
    'options' => array('button' => 'Add PDF'),
    'columns' => 12
]);
