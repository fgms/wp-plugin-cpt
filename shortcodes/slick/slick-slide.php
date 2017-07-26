<?php
call_user_func(function () {
  add_shortcode('slick_slide',function ($atts, $content) {
    return do_shortcode($content);
  });
});
?>
