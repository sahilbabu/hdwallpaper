<?php

  function check_htaccess($marker)
  {
    $htaccess_file = ABSPATH.'.htaccess';
    $tmp = extract_from_markers($htaccess_file, $marker);
    if ((sizeof($tmp)>1)) {
	return true;
    } else {
	return false;
    }
  }

  
  $updated = FALSE;
  
  if (isset($_POST['ir_submit']))
  {   
		update_option( 'ir_page_slug', trim($_POST['ir_page_slug']) );	
		update_option( 'ir_page_title', trim($_POST['ir_page_title']) );
		update_option( 'ir_image_width', (int)$_POST['ir_image_width'] );
		update_option( 'ir_image_height', (int)$_POST['ir_image_height'] );
		update_option( 'ir_whitelist', trim($_POST['ir_whitelist']) );
		update_option( 'ir_whitelistUA', trim($_POST['ir_whitelistUA']) );
		update_option( 'ir_image_ext', trim($_POST['ir_image_ext']) );
		update_option( 'ir_show_homelink', trim($_POST['ir_show_homelink']) );
		update_option( 'ir_showImgText', trim($_POST['ir_showImgText']) );
		update_option( 'ir_showImgTextStr', trim($_POST['ir_showImgTextStr']) );
		update_option( 'ir_imgopacity', trim($_POST['ir_imgopacity']) );
		update_option( 'ir_textposcorr', trim($_POST['ir_textposcorr']) );
		update_option( 'ir_fontsizemultiple', trim($_POST['ir_fontsizemultiple']) );
		update_option( 'ir_redirectcode', trim($_POST['ir_redirectcode']) );
		update_option( 'ir_showpostpage', trim($_POST['ir_showpostpage']) );

		ir_update_rewrite();
		
		$updated = TRUE;
  }


?> 
<div class="wrap">
<?php echo "  <h2>" . __( 'Imaguard Settings', 'imaguard' ) . "</h2>"; ?>


    <?php if (!check_htaccess('imaguard')) { ?>
<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);"><p><?php echo __('There is a problem with your .htaccess file.  Set file permissions to 666, deactivate Imaguard and reactivate it again. If you have no .htaccess file you may have to manually create it and enable WP permalink before de- and reactivating Imaguard.', 'imaguard' ); ?></p></div>
<?php } ?>

    <?php if (!check_htaccess('WordPress')) { ?>
<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);"><p><?php echo __('There is a problem with your .htaccess file.  You need to activate Wordpress rewrite. In wp-admin click on the Settings tab and select the Permalinks link. Then deactivate and reactivate Imaguard from the plugins menu', 'imaguard' ); ?></p></div>
<?php } ?>

	
    <?php if ($updated == TRUE) { ?>
<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);"><p><?php echo __('Settings Updated!', 'imaguard' ); ?></p></div>
<?php } ?>

  <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <table class="form-table">
    <tbody>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Page Slug','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_page_slug" name="ir_page_slug" class="regular-text" value="<?php echo get_option( 'ir_page_slug' ); ?>" />
          <br /><small>The URL page slug that images get redirected to</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Redirect to post page','imaguard'); ?></label></th>
        <td>
          <input type="checkbox" id="ir_showpostpage" name="ir_showpostpage" class="checkbox" <?php if (get_option( 'ir_showpostpage' ) ) {echo "checked";} ?> />
          <br /><small>[BETA functionality - use with caution] Checking this box will forward direct / non white listed hits on images in redirect mode to the first post the image was used on instead of the preview page.</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Redirect code to send','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_redirectcode" name="ir_redirectcode" class="regular-text" length="3" value="<?php echo get_option( 'ir_redirectcode'); ?>"  />
          <br /><small>Redirect code to send when redirecting to post page or watermarked image. This should be set to 302 or 301.  Only change this if you know what you are doing.</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Page Title','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_page_title" name="ir_page_title" class="regular-text" value="<?php echo get_option( 'ir_page_title' ); ?>" />
          <br /><small>The Title for the page that the images are redirected to</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Image Extensions','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_image_ext" name="ir_image_ext" class="regular-text" value="<?php echo get_option( 'ir_image_ext' ); ?>" />
          <br /><small>Extensions of images to redirect (just extension, no filenames or period) seperated by comma</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Max Image Width','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_image_width" name="ir_image_width" class="regular-text" value="<?php echo get_option( 'ir_image_width' ); ?>" />
          <br /><small>Max width of the images on the page in pixels (0 = disabled)</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Max Image Height','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_image_height" name="ir_image_height" class="regular-text" value="<?php echo get_option( 'ir_image_height' ); ?>" />
          <br /><small>Max height of the images on the page in pixels (0 = disabled)</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">Referrer Whitelist</th>
        <td>
        <textarea class="large-text code" id="ir_whitelist" cols="40" rows="5" name="ir_whitelist"><?php echo get_option( 'ir_whitelist' ); ?></textarea><br />
        <small>Enter just the domain names of acceptable referrers who can be served the image directly.  One domain per line.</small>
        </td>
        </tr>
      <tr valign="top">
        <th scope="row">User Agent Whitelist</th>
        <td>
        <textarea class="large-text code" id="ir_whitelistUA" cols="40" rows="5" name="ir_whitelistUA"><?php echo get_option( 'ir_whitelistUA' ); ?></textarea><br />
        <small>Enter a list of User Agents who can be served the image directly.  One agent per line. E.g: Googlebot.</small>
        </td>
        </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Show text over image','imaguard'); ?></label></th>
        <td>
          <input type="checkbox" id="ir_showImgText" name="ir_showImgText" class="checkbox" <?php if (get_option( 'ir_showImgText' ) ) {echo "checked";} ?> />
          <br /><small>This will deactivate the redirect to show image in wordpress layout and show the darkened image with a text on top instead. This will only work for jpg files. All others will still be redirected to view image as post.</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Text to show over image','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_showImgTextStr" name="ir_showImgTextStr" class="regular-text" value="<?php echo get_option( 'ir_showImgTextStr' ); ?>" <?php if (!get_option( 'ir_showImgText' ) ) {echo "disabled";} ?> />
          <br /><small>Text to show on top of images (one line only, so keep it short). Eg: "Click to see!". If you just turned the Text Over Image function on, click "save settings" to enable this field.</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Image darkness','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_imgopacity" name="ir_imgopacity" class="regular-text" length="3" value="<?php echo get_option( 'ir_imgopacity'); ?>" <?php if (!get_option( 'ir_showImgText' ) ) {echo "disabled";} ?> />
          <br /><small>The percentage of dark overlay to add to an image. Accepted values are 0 (light) to 255 (dark).</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Text position','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_textposcorr" name="ir_textposcorr" class="regular-text" length="4" value="<?php echo get_option( 'ir_textposcorr'); ?>" <?php if (!get_option( 'ir_showImgText' ) ) {echo "disabled";} ?> />
          <br /><small>Move text up (negative) or down (positive). Accepted range is -100 to 100.  This is the bottom line of the text, so at -100 the actual text will be off the image.</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Font size multiple','imaguard'); ?></label></th>
        <td>
          <input type="text" id="ir_fontsizemultiple" name="ir_fontsizemultiple" class="regular-text" length="4" value="<?php echo get_option( 'ir_fontsizemultiple'); ?>" <?php if (!get_option( 'ir_showImgText' ) ) {echo "disabled";} ?> />
          <br /><small>Increase or decrease font size. The range is from 0 and up.  The recommended setting for the default font is 138.</small>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Powered by Imguard','imaguard'); ?></label></th>
        <td>
          <input type="checkbox" id="ir_show_homelink" name="ir_show_homelink" class="checkbox" <?php if (get_option( 'ir_show_homelink' ) ) {echo "checked";} ?> />
          <br /><small>This will show "Powered by Imaguard" under your image.  We really appreciate if you keep this checked to spread the word to more users!</small>
        </td>
      </tr>
    </tbody>
  </table>
  <p class="submit">
    <input type="submit" value="Update Settings" class="button-primary" name="ir_submit" />
  </p>
</form>
</div>