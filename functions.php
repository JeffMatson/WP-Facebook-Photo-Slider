<?php

add_action( 'wp_enqueue_scripts', 'fb_photo_slider_scripts' );

function fb_photo_slider_scripts() {
	wp_register_script( 'jssor-core', plugins_url('js/jssor.core.js', __FILE__), array( 'jquery' ) );
	wp_register_script( 'jssor-utils', plugins_url('js/jssor.utils.js', __FILE__), array( 'jquery' ) );
	wp_register_script( 'jssor-slider', plugins_url('js/jssor.slider.js', __FILE__), array( 'jquery' ) );
  wp_register_script( 'jssor-options', plugins_url('js/jssor.options.js', __FILE__), array( 'jquery' ) );
}

add_shortcode( 'fb_photo_slider', 'insert_fb_photo_slider' );

function insert_fb_photo_slider() {
  wp_enqueue_script( 'jssor-core' );
	wp_enqueue_script( 'jssor-utils' );
	wp_enqueue_script( 'jssor-slider' );
  wp_enqueue_script( 'jssor-options' );
?>

<!-- Jssor Slider Begin -->
<!-- You can move inline styles to css file or css block. -->
<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 960px;
    height: 480px; background: #191919; overflow: hidden;">

    <!-- Loading Screen -->
    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
            background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
        </div>
        <div style="position: absolute; display: block; background: <?php echo plugins_url('img/loading.gif', __FILE__); ?> no-repeat center center;
            top: 0px; left: 0px;width: 100%;height:100%;">
        </div>
    </div>

    <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; left: 240px; top: 0px; width: 720px; height: 480px; overflow: hidden;">
      <?php
      $fb_photo_slider_page_id = get_option('fb_photo_slider_page_id');
      $photos = file_get_contents('http://graph.facebook.com/'.$fb_photo_slider_page_id.'/photos/uploaded');
      $photos = json_decode($photos);
      $photos = $photos->data;
      foreach ($photos as $picture_url) {
        echo '<div>';
        echo '<img u="image" src="'.$picture_url->source.'" />';
        echo '<img u="thumb" src="'.$picture_url->source.'" />';
        echo '</div>';
      }
      ?>
    </div>

    <!-- Arrow Navigator Skin Begin -->
    <style>
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l              (normal)
        .jssora05r              (normal)
        .jssora05l:hover        (normal mouseover)
        .jssora05r:hover        (normal mouseover)
        .jssora05ldn            (mousedown)
        .jssora05rdn            (mousedown)
        */
        .jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
        {
          position: absolute;
          cursor: pointer;
          display: block;
            background: url(<?php echo plugins_url('img/a17.png', __FILE__); ?>) no-repeat;
            overflow:hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05ldn { background-position: -250px -40px; }
        .jssora05rdn { background-position: -310px -40px; }
    </style>
    <!-- Arrow Left -->
    <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 248px;">
    </span>
    <!-- Arrow Right -->
    <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px">
    </span>
    <!-- Arrow Navigator Skin End -->

    <!-- Thumbnail Navigator Skin 02 Begin -->
    <div u="thumbnavigator" class="jssort02" style="position: absolute; width: 240px; height: 480px; left:0px; bottom: 0px;">

        <!-- Thumbnail Item Skin Begin -->
        <style>
            /* jssor slider thumbnail navigator skin 02 css */
            /*
            .jssort02 .p            (normal)
            .jssort02 .p:hover      (normal mouseover)
            .jssort02 .pav          (active)
            .jssort02 .pav:hover    (active mouseover)
            .jssort02 .pdn          (mousedown)
            */
            .jssort02 .w
            {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
            }
            .jssort02 .c
            {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 95px;
                height: 62px;
                border: #000 2px solid;
            }
            .jssort02 .p:hover .c, .jssort02 .pav:hover .c, .jssort02 .pav .c
            {
              background: url(<?php echo plugins_url('img/t01.png', __FILE__); ?>) center center;
              border-width: 0px;
                top: 2px;
                left: 2px;
                width: 95px;
                height: 62px;
            }
            .jssort02 .p:hover .c, .jssort02 .pav:hover .c
            {
                top: 0px;
                left: 0px;
                width: 97px;
                height: 64px;
                border: #fff 1px solid;
            }
        </style>
        <div u="slides" style="cursor: move;">
            <div u="prototype" class="p" style="position: absolute; width: 99px; height: 66px; top: 0; left: 0;">
                <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                <div class=c>
                </div>
            </div>
        </div>
        <!-- Thumbnail Item Skin End -->
    </div>
    <!-- Thumbnail Navigator Skin End -->
</div>
<!-- Jssor Slider End -->
<?php
}
