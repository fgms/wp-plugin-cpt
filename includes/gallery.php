<?php
// used to get choices called internally
function get_galllery_filters(){
  $filters = [];
  $filter_option = empty(get_option('gallery_settings')['gallery']) ? [] : get_option('gallery_settings')['gallery'];
  foreach ($filter_option as $f){
    $filters[$f['filters']] = $f['filters'];
  }
  return $filters;
}

// used to get slideshow fields in settings and in post types.
function get_gallery_fields($group='') {
    $filters = get_galllery_filters();
    $group = (strlen($group) > 0 ) ? $group.':': $group;
    $fields = [
/*
        [
          'type' => 'radio',
          'field' => 'image-or-youtube-radio',
          'label'=> __('Type'),
          'choices' =>[
            'image' => 'Image',
            'youtube' => 'Youtube'
          ],
          'value' => 'image',
          'columns' => 2

        ],*/
        [
            'type' => 'file',
            'field' => 'image',
            'label' => 'ADD Image',
            'options' => array('button' => 'Select ...'),
            'preview_size' =>'thumb',
            'columns' => 3,
        ],
        [
            'type' => 'text',
            'label' => __('OR ADD Youtube ID'),
            'description' => '',
            'field' => 'youtubeid',
            'columns' => 3,


        ],
        [
          'type' => 'checkbox',
          'field' => 'fg-filters',
          'label'=> __('Filters'),
          'choices' => $filters,
          'columns' => 2
        ],
        [
            'type' => 'file',
            'field' => 'thumb',
            'label' => 'OPTIONAL - Image Override (replaces thumb and medium sizes)',
            'description' => __('Only use if you want need to override automatic medium / thumb.'),
            'options' => array('button' => 'Select ...'),
            'preview_size' =>'piklist',
            'columns' => 5,
        ],
    ];
    return $fields;
}
?>
