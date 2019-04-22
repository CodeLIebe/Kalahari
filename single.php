<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package WordPress
 * @subpackage kalahari
 */

get_header(); ?>

<div class="row mt-5 w-100">
  <div class="col-lg-4 col-md-12 my-5 mx-3 bg-dark bg-fade text-white text-center">
    <h2 class="text-uppercase"><?php echo get_option( 'custom-blog-page-title' ); ?></h2>
    <p>
      <?php echo get_option( 'custom-blog-page-subtitle' ); ?>
    </p>
    <div class="text-center mt-5">
    <a href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>/blog"><< Go back to blog page.</a>
    </div>
  </div>
  <div class="col my-5 mx-3 bg-dark bg-fade no-overflow text-white">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
       ?>
       <h1><?php the_title(); ?></h1>
       <p>
         <?php the_content(); ?>
       </p>
    <?php endwhile;
    else :
       _e( 'Sorry, nothing to see here. Mind your own business, bro!', 'textdomain' );
   endif;
   ?>
  </div>
</div>
<?php get_footer(); ?>
