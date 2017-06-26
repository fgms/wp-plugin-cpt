<?php
/*
Title: Table Columns
Setting: realestate_settings
Tab: Index
*/
piklist('field',[
    'type' => 'group',
    'field' => 'columns',
    'label' => __(''),
    'description' => _('Table Columns will show from left to right.'),
    'add_more' => true,
    'fields' => [
      [
          'type' => 'select',
          'label' => __('Column Type'),
          'field' => 'column_type',
          'choices' => [
            'condo-status' => 'Status',
            'condo-style' => 'Type',
            'condo-type' => 'Bedrooms',
            'condo-unit' => 'Unit',
            'condo-view' => 'View',
            'condo-location' => 'Building',
            'condo-area' => 'Floor Area',
            'condo-floor' =>'Floor',
            'condo-price' =>'Price',
            'condo-index-details' => 'Details'
          ],
          'columns' => 4
      ],
      [
        'type' => 'text',
        'label' => __('Column Label'),
        'field' => 'column_label',
        'columns' => 4
      ]
    ]
]);
