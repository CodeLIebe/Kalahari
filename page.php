<?php
/**
 * The main template file for displaying pages
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
    <div class="col-lg-4 col-md-12 my-lg-5 mx-3 bg-dark bg-fade text-white">
			<div class="mt-10">
				<h1 class="handwritten pt-5"><?php the_title(); ?></h1>
				<p>
					<?php the_excerpt(); ?>
				</p>
			</div>
    </div>
    <div class="col-lg-7 col-md-12 my-5 mx-3 bg-dark bg-fade text-white">
      <?php // TO SHOW THE PAGE CONTENTS
        while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
            <div class="entry-content-page p-5">
                <?php the_content(); ?> <!-- Page Content -->
            </div><!-- .entry-content-page -->

        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
      ?>
		</div>
  </div>
<?php get_footer(); ?>
