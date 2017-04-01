<?php
/*
Title: Date Windows
Post Type: special
Order: 1
Collapse: false
Priority: high
*/

piklist('field',[
  'type' => 'datepicker',
  'label' => __('Stay Start Date'),
  'field' => 'fg-start-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'MM d, yy'
    )
]);
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Stay End Date'),
  'field' => 'fg-end-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'MM d, yy'
    )
]);

piklist('field',[
  'type' => 'datepicker',
  'label' => __('Booking Window Start Date'),
  'field' => 'fg-booking-start-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'MM d, yy'
    )
]);
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Booking Window End Date'),
  'field' => 'fg-booking-end-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'MM d, yy'
   )
]);
