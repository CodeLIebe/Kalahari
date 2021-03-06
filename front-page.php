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

<div class="row mt-5 w-100 h-100">
  <div class="col my-5 mx-3 text-white spacing text-center">
    <h1 class="front-page-title text-uppercase">
      <?php echo get_option('kalahari_theme_options')['front_page_title']; ?>
    </h1>
    <h2 class="front-page-title">
      <?php echo get_option('kalahari_theme_options')['front_page_subtitle']; ?>
    </h2>
  </div>
</div>
<?php get_footer(); ?>
