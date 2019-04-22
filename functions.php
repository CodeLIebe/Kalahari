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
require get_template_directory() . '/bootstrap-navwalker.php';

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
			'before_widget' => '<div id="%1$s" class="col widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="pt-0">',
			'after_title'   => '</h2>',
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
 * Admin init
 *
 */
add_action( 'admin_init', 'blog_settings_init' );

/* Settings Init */
function blog_settings_init(){

    /* Register blog title Settings */
    register_setting(
        'reading',             // Options group
        'custom-blog-page-title',      // Option name/database
        'esc_attr' // sanitize callback function
    );

    /* Register blog subtitle Settings */
    register_setting(
        'reading',             // Options group
        'custom-blog-page-subtitle',      // Option name/database
        'esc_attr' // sanitize callback function
    );

    /* Create blog settings section */
    add_settings_section(
        'blog_section',                   // Section ID
        'Additional Blog Page Settings',  // Section title
        'blog_settings_section_description', // Section callback function
        'reading'                          // Settings page slug
    );

    /* Create blog title settings field */
    add_settings_field(
        'custom-blog-page-title',       // Field ID
        'Blog Title',       // Field title
        'blog_settings_field_text_callback', // Field callback function
        'reading',                    // Settings page slug
        'blog_section',               // Section ID
        array(
            'custom-blog-page-title'  // $args for callback
        )
    );
    /* Create blog subtitle settings field */
    add_settings_field(
        'custom-blog-page-subtitle',       // Field ID
        'Blog Subtitle',       // Field title
        'blog_settings_field_text_callback', // Field callback function
        'reading',                    // Settings page slug
        'blog_section',               // Section ID
        array(
            'custom-blog-page-subtitle'  // $args for callback
        )
    );
}

/* Setting Section Description */
function blog_settings_section_description(){
    echo wpautop( "Insert Settings to display on blog page." );
}

function blog_settings_field_text_callback($args)
{
    $value = get_option( $args[0] , '' );
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $value . '" />';
}
?>