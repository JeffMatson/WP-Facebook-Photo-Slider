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


$loading_image = plugins_url('img/loading.gif', __FILE__);
$a17 = plugins_url('img/a17.png', __FILE__);
$t01 = plugins_url('img/t01.png', __FILE__);
$fb_photo_slider_page_id = get_option('fb_photo_slider_page_id');

	$photos = file_get_contents('http://graph.facebook.com/'.$fb_photo_slider_page_id.'/photos/uploaded');
      $photos = json_decode($photos);
      $photos = $photos->data;

$fb_slider_html = '<!-- Jssor Slider Begin -->';
$fb_slider_html .= '<!-- You can move inline styles to css file or css block. -->';
$fb_slider_html .= '<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 960px; height: 480px; background: #191919; overflow: hidden;">';

    $fb_slider_html .= '<!-- Loading Screen -->';
    $fb_slider_html .= '<div u="loading" style="position: absolute; top: 0px; left: 0px;">';
        $fb_slider_html .= '<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block; background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">';
        $fb_slider_html .= '</div>';
        $fb_slider_html .= '<div style="position: absolute; display: block; background: '.$loading_image.' no-repeat center center;
            top: 0px; left: 0px;width: 100%;height:100%;">';
        $fb_slider_html .= '</div>';
    $fb_slider_html .= '</div>';

    $fb_slider_html .= '<!-- Slides Container -->';
    $fb_slider_html .= '<div u="slides" style="cursor: move; position: absolute; left: 240px; top: 0px; width: 720px; height: 480px; overflow: hidden;">';

foreach ($photos as $picture_url) {
$fb_slider_html .= '<div><img u="image" src="'.$picture_url->source.'" /><img u="thumb" src="'.$picture_url->source.'" /></div>';
};

$fb_slider_html .= '</div>';

    $fb_slider_html .= '<!-- Arrow Navigator Skin Begin -->';
    $fb_slider_html .= '<style>';
        $fb_slider_html .= '/* jssor slider arrow navigator skin 05 css */';
        $fb_slider_html .= '/*';
        $fb_slider_html .= '.jssora05l              (normal)';
        $fb_slider_html .= '.jssora05r              (normal)';
        $fb_slider_html .= '.jssora05l:hover        (normal mouseover)';
        $fb_slider_html .= '.jssora05r:hover        (normal mouseover)';
        $fb_slider_html .= '.jssora05ldn            (mousedown)';
        $fb_slider_html .= '.jssora05rdn            (mousedown)';
        $fb_slider_html .= '*/';
        $fb_slider_html .= '.jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn';
        $fb_slider_html .= '{';
          $fb_slider_html .= 'position: absolute;';
          $fb_slider_html .= 'cursor: pointer;';
          $fb_slider_html .= 'display: block;';
            $fb_slider_html .= 'background: url('.$a17.') no-repeat;';
            $fb_slider_html .= 'overflow:hidden;';
        $fb_slider_html .= '}';
        $fb_slider_html .= '.jssora05l { background-position: -10px -40px; }';
        $fb_slider_html .= '.jssora05r { background-position: -70px -40px; }';
        $fb_slider_html .= '.jssora05l:hover { background-position: -130px -40px; }';
        $fb_slider_html .= '.jssora05r:hover { background-position: -190px -40px; }';
        $fb_slider_html .= '.jssora05ldn { background-position: -250px -40px; }';
        $fb_slider_html .= '.jssora05rdn { background-position: -310px -40px; }';
    $fb_slider_html .= '</style>';
    $fb_slider_html .= '<!-- Arrow Left -->';
    $fb_slider_html .= '<span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 248px;">';
    $fb_slider_html .= '</span>';
    $fb_slider_html .= '<!-- Arrow Right -->';
    $fb_slider_html .= '<span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px">';
    $fb_slider_html .= '</span>';
    $fb_slider_html .= '<!-- Arrow Navigator Skin End -->';

    $fb_slider_html .= '<!-- Thumbnail Navigator Skin 02 Begin -->';
    $fb_slider_html .= '<div u="thumbnavigator" class="jssort02" style="position: absolute; width: 240px; height: 480px; left:0px; bottom: 0px;">';

        $fb_slider_html .= '<!-- Thumbnail Item Skin Begin -->';
        $fb_slider_html .= '<style>';
            $fb_slider_html .= '/* jssor slider thumbnail navigator skin 02 css */';
            $fb_slider_html .= '/*';
            $fb_slider_html .= '.jssort02 .p            (normal)';
            $fb_slider_html .= '.jssort02 .p:hover      (normal mouseover)';
            $fb_slider_html .= '.jssort02 .pav          (active)';
            $fb_slider_html .= '.jssort02 .pav:hover    (active mouseover)';
            $fb_slider_html .= '.jssort02 .pdn          (mousedown)';
            $fb_slider_html .= '*/';
            $fb_slider_html .= '.jssort02 .w';
            $fb_slider_html .= '{';
                $fb_slider_html .= 'position: absolute;';
                $fb_slider_html .= 'top: 0px;';
                $fb_slider_html .= 'left: 0px;';
                $fb_slider_html .= 'width: 100%;';
                $fb_slider_html .= 'height: 100%;';
            $fb_slider_html .= '}';
            $fb_slider_html .= '.jssort02 .c';
            $fb_slider_html .= '{';
                $fb_slider_html .= 'position: absolute;';
                $fb_slider_html .= 'top: 0px;';
                $fb_slider_html .= 'left: 0px;';
                $fb_slider_html .= 'width: 95px;';
                $fb_slider_html .= 'height: 62px;';
                $fb_slider_html .= 'border: #000 2px solid;';
            $fb_slider_html .= '}';
            $fb_slider_html .= '.jssort02 .p:hover .c, .jssort02 .pav:hover .c, .jssort02 .pav .c';
            $fb_slider_html .= '{';
              $fb_slider_html .= 'background: url('.$t01.') center center;';
              $fb_slider_html .= 'border-width: 0px;';
                $fb_slider_html .= 'top: 2px;';
                $fb_slider_html .= 'left: 2px;';
                $fb_slider_html .= 'width: 95px;';
                $fb_slider_html .= 'height: 62px;';
            $fb_slider_html .= '}';
            $fb_slider_html .= '.jssort02 .p:hover .c, .jssort02 .pav:hover .c';
            $fb_slider_html .= '{';
                $fb_slider_html .= 'top: 0px;';
                $fb_slider_html .= 'left: 0px;';
                $fb_slider_html .= 'width: 97px;';
                $fb_slider_html .= 'height: 64px;';
                $fb_slider_html .= 'border: #fff 1px solid;';
            $fb_slider_html .= '}';
        $fb_slider_html .= '</style>';
        $fb_slider_html .= '<div u="slides" style="cursor: move;">';
            $fb_slider_html .= '<div u="prototype" class="p" style="position: absolute; width: 99px; height: 66px; top: 0; left: 0;">';
                $fb_slider_html .= '<div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>';
                $fb_slider_html .= '<div class=c>';
                $fb_slider_html .= '</div>';
            $fb_slider_html .= '</div>';
        $fb_slider_html .= '</div>';
        $fb_slider_html .= '<!-- Thumbnail Item Skin End -->';
    $fb_slider_html .= '</div>';
    $fb_slider_html .= '<!-- Thumbnail Navigator Skin End -->';
$fb_slider_html .= '</div>';
$fb_slider_html .= '<!-- Jssor Slider End -->';
return $fb_slider_html;
}
