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
    $group = (strlen($group) > 0 ) ? $group.':': $group;
    $fields = [
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
        ],
        [
            'type' => 'file',
            'field' => 'image',
            'label' => 'Image',
            'options' => array('button' => 'Add Image'),
            'preview_size' =>'piklist',
            'columns' => 3,
            'conditions' => [
                [
                  'field' => $group . 'image-or-youtube-radio',
                  'value' => 'image'
                ]
            ],
        ],
        [
            'type' => 'text',
            'label' => __('Youtube ID'),
            'description' => '',
            'field' => 'youtubeid',
            'columns' => 3,
            'conditions' => [
                [
                  'field' => $group . 'image-or-youtube-radio',
                  'value' => 'youtube'
                ]
            ],

        ],
        [
            'type' => 'text',
            'label' => __('Caption'),
            'description' => '',
            'field' => 'caption',
            'columns' => 3

        ],
        [
          'type' => 'checkbox',
          'field' => 'fg-filters',
          'label'=> __('Filters'),
          'choices' => get_galllery_filters(),
          'columns' => 2
        ],
        [
            'type' => 'file',
            'field' => 'thumb',
            'label' => 'Thumb Override',
            'description' => __('Only use if you want need to override automatic thumb.'),
            'options' => array('button' => 'Add Image'),
            'preview_size' =>'piklist',
            'columns' => 2,
        ],
    ];
    return $fields;
}
?>
