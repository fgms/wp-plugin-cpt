<?php
call_user_func(function () {
  add_shortcode('slick_carousel',function ($atts, $content) {
    echo '<pre>';
    print_R($atts);
    echo '</pre>' .do_shortcode($content);
  });
});
?>
