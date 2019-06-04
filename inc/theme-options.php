<?php

/* ------------------ */
/* theme options page */
/* ------------------ */

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

// register settings
function theme_options_init(){
	register_setting( 'kalahari_options', 'kalahari_theme_options' );
}

//create page in admin dashboard navigation
function theme_options_add_page() {
  // page title, Titel in nav menu, user role, slug, function
	add_theme_page('Kalahari Theme Options', 'Kalahari Theme Options', 'edit_theme_options', 'kalahari-theme-options', 'kalahari_theme_options_page' );
}

// create options page
function kalahari_theme_options_page() {
global $select_options, $radio_options;
if ( ! isset( $_REQUEST['settings-updated'] ) )
	$_REQUEST['settings-updated'] = false; ?>

<div class="wrap">
<?php screen_icon(); ?><h2>Change Kalahari Theme Options</h2>

<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div class="updated fade">
	<p><strong>Settings updated!</strong></p>
</div>
<?php endif; ?>

  <form method="post" action="options.php">
	<?php settings_fields( 'kalahari_options' ); ?>
    <?php $options = get_option( 'kalahari_theme_options' ); ?>

    <!-- submit -->
    <p class="submit"><input type="submit" class="button-primary" value="Save settings" /></p>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Front Page Title</th>
        <td><input id="kalahari_theme_options[front_page_title]" class="regular-text" type="text" placeholder="Enter title to be displayed on front page - overwrites front page content" name="kalahari_theme_options[front_page_title]" value="<?php esc_attr_e( $options['front_page_title'] ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">Front Page Subtitle</th>
        <td><input id="kalahari_theme_options[front_page_subtitle]" class="regular-text" type="text" placeholder="Enter subtitle to be displayed on front page - overwrites front page content" name="kalahari_theme_options[front_page_subtitle]" value="<?php esc_attr_e( $options['front_page_subtitle'] ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">Blog Page Title</th>
        <td><input id="kalahari_theme_options[blog_page_title]" class="regular-text" type="text" placeholder="Enter title to be displayed on blog page" name="kalahari_theme_options[blog_page_title]" value="<?php esc_attr_e( $options['blog_page_title'] ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">Blog Page Subtitle</th>
        <td><input id="kalahari_theme_options[blog_page_subtitle]" class="regular-text" type="text" placeholder="Enter subtitle to be displayed on blog page" name="kalahari_theme_options[blog_page_subtitle]" value="<?php esc_attr_e( $options['blog_page_subtitle'] ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">FAQ Page Title</th>
        <td><input id="kalahari_theme_options[faq_page_title]" class="regular-text" type="text" placeholder="Enter title to be displayed on FAQ page" name="kalahari_theme_options[faq_page_title]" value="<?php esc_attr_e( $options['faq_page_title'] ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">FAQ Page Subtitle</th>
        <td><input id="kalahari_theme_options[faq_page_subtitle]" class="regular-text" type="text" placeholder="Enter subtitle to be displayed on FAQ page" name="kalahari_theme_options[faq_page_subtitle]" value="<?php esc_attr_e( $options['faq_page_subtitle'] ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">Tracking Code I</th>
        <td>
          <textarea id="kalahari_theme_options[tracking1]" placeholder="Enter any tracking code here to be loaded in footer" class="large-text" cols="50" rows="10" name="kalahari_theme_options[tracking1]"><?php echo esc_textarea( $options['tracking1'] ); ?></textarea></td>
      </tr>
      <tr valign="top">
        <th scope="row">Tracking Code II</th>
        <td><textarea id="kalahari_theme_options[tracking2]" placeholder="Enter any tracking code here to be loaded in footer" class="large-text" cols="50" rows="10" name="kalahari_theme_options[tracking2]"><?php echo esc_textarea( $options['tracking2'] ); ?></textarea></td>
      </tr>
    </table>

    <!-- submit -->
    <p class="submit"><input type="submit" class="button-primary" value="Save settings" /></p>

  </form>
</div>
<?php }
?>
