<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage kalahari
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/bird.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/bird.ico" type="image/x-icon" />
	<!-- Integrate Bootstrap 4 -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  />
	<!-- Integrate Theme Stylesheets -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/searchfilter.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/imgoverlay.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/form.css" />
	<!-- Fontawesome to integrate icons -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>
<body>

	<div class="container-fluid full-page"
			<?php if ( has_post_thumbnail() && (is_page() or is_single()) ) {
							$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), ’full’ );
							 echo 'style="background: url(' . $image_src[0] . ') no-repeat center top;
							 -webkit-background-size: cover;
			 				 -moz-background-size: cover;
							 -o-background-size: cover;
							 background-size: cover;"';
					}
				else echo 'style="background: #555;"';
			?>
			>
			<div class="row w-100">
				<div class="col">
					<nav class="navbar navbar-expand-lg py-0 navbar-light bg-light fixed-top text-uppercase">
							<a class="navbar-brand" href="<?php echo esc_url( get_site_url() ); ?>">
								<sec class="logo">
									<?php bloginfo( 'name' ); ?>
								</sec>
						    <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/bird_60.png" alt="<?php bloginfo( 'name' ); ?>">
						  </a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbar-content">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'header-menu', // defined during menu registration
								'menu_id'        => 'header-menu', // css ID
								'container'      => false,
								'depth'          => 2,
								'menu_class'     => 'navbar-nav ml-auto',
								'walker'         => new Bootstrap_NavWalker(),
								'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
							) );
							?>
						</div>
					</nav>
			 </div>
		</div>
