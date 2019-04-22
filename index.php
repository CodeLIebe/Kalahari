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
  <div class="col-lg-4 col-md-12 my-5 mx-3 bg-dark bg-fade text-white">
    <h2 class="text-uppercase"><?php echo get_option( 'custom-blog-page-title' ); ?></h2>
    <p>
      <?php echo get_option( 'custom-blog-page-subtitle' ); ?>
    </p>
    <div>
      <?php $args = array(
        	'smallest'                  => 8,
        	'largest'                   => 22,
        	'unit'                      => 'pt',
        	'number'                    => 45,
        	'format'                    => 'flat',
        	'separator'                 => "\n",
        	'orderby'                   => 'name',
        	'order'                     => 'ASC',
        	'exclude'                   => null,
        	'include'                   => null,
        	'topic_count_text_callback' => default_topic_count_text,
        	'link'                      => 'view',
        	'taxonomy'                  => 'post_tag',
        	'echo'                      => true,
        	'show_count'                  => 0,
        	'child_of'                  => null, // see Note!
        );
        wp_tag_cloud( $args );
      ?>
    </div>
  </div>
  <div class="col my-5 mx-3 bg-dark bg-fade no-overflow">
    <div class="row">
    <?php
		$counter = 0;
      if ( have_posts() ) : while ( have_posts() ) : the_post();
					if ($counter%4 == 0){
						?></div><div class="row"><?php
					}?>
          <div class="col p-0 blog-img h-100">
						<!-- <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> -->
						<?php if ( has_post_thumbnail() ) {
									    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),’thumbnail’ );
											$url = get_the_permalink();
                      $title = get_the_title();
                      $items = array('top', 'bottom', 'left');
									     echo '<a href="' . $url . '"><div class="overlay"></div>
                            <img width="100%" height="100%" class="overlay-img vh-25 img-fluid" src="' . $image_src[0] . '">
                            <!-- overlay content -->
                            <div class="overlay-content fadeIn-' . $items[array_rand($items)] . '">
                            <h3>
                              ' . $title . '
                            </h3>
                          </div></a>';
									}
						?>
          </div>
					<?php $counter++; ?>
      <?php  endwhile;
       else :
          _e( 'Sorry, nothing to see here. Mind your own business, bro!', 'textdomain' );
      endif;
      ?>
      </div>
  </div>
</div>
<?php get_footer(); ?>
