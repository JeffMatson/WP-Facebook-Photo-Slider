<?php
add_action( 'admin_menu', 'fb_photo_slider_menu' );

function fb_photo_slider_menu() {
  add_submenu_page(
    'tools.php',
    __( 'Facebook Photo Slider', 'fb-photo-slider' ),
    __( 'Facebook Photo Slider', 'fb-photo-slider' ),
    'manage_options',
    'fb-photo-slider',
    'fb_photo_slider_menu_settings',
    99
  );
  add_action( 'admin_init', 'update_fb_photo_slider_settings' );
}
function update_fb_photo_slider_settings() {
  register_setting( 'fb_photo_slider_settings', 'fb_photo_slider_page_id' );
}

function fb_photo_slider_menu_settings(){ ?>
  <h1><?php _e('Facebook Photo Slider Configuration'); ?></h1>
        <form method="post" action="options.php">
        <?php settings_fields( 'fb_photo_slider_settings' ); ?>
	      <?php do_settings_sections( 'fb_photo_slider_settings' ); ?>
	<table class="form-table">
    <tr valign="top">
			<th scope="row"><?php _e('Facebook Page ID') ?>:</th>
      <td><input type="text" name="fb_photo_slider_page_id" value="<?php echo get_option('fb_photo_slider_page_id'); ?>"/></td>
    </tr>
    </table>
	<?php submit_button(); ?>
	</form>
</div>
<?php
}
