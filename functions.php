<?php
/**
* Add featured image theme support
*
*/
add_theme_support( 'post-thumbnails' );
/**
* Add excerpt support for pages
*
*/
add_action( 'init', 'custom_add_excerpts_to_pages' );
function custom_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
/**
* Add menu theme support
* use bootstrap 4 nav bar
*/
require_once ( get_template_directory() . '/inc/bootstrap-navwalker.php' );

/**
 * Add Custom Theme Options
 *
 */
 require_once ( get_stylesheet_directory() . '/inc/theme-options.php' );

/**
 * Register custom menus
 *
 */

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )#,
      #'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

/**
 * Registers a widget area.
 *
 */
function kalahari_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'kalahari' ),
			'id'            => 'sidebar-footer',
			'description'   => __( 'Add widgets here to appear in your footer sidebar.', 'kalahari' ),
			'before_widget' => '<div id="%1$s" class="col-lg col-md-6 col-sm-6 col-xs-12 widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="pt-0">',
			'after_title'   => '</h3>',
		)
	);
  register_sidebar(
		array(
			'name'          => __( 'Partner', 'kalahari' ),
			'id'            => 'sidebar-partner',
			'description'   => __( 'Add widgets here to appear in your partner sidebar.', 'kalahari' ),
			'before_widget' => '<div id="%1$s" class="col widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="pt-0">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'kalahari_widgets_init' );

/**
 * Change the Tag Cloud's Font Sizes.
 *
 */
add_filter( 'widget_tag_cloud_args', 'change_tag_cloud_font_sizes');

function change_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '14';
    $args['largest'] = '25';

    return $args;
}

?>
