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
    <?php
    $tags = get_the_tags();
    $html_tag = '<a href="' . get_tag_link($tags[0]->term_id) . '"> #' . $tags[0]->name . '</a>';
    echo '<div>Currently displaying blog posts tagged with' . $html_tag . '</div>';
    ?>

    <div class="mt-5">
      Other tags that might be interesting for you:
      <br />
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
        	'show_count'                => 0,
        	'child_of'                  => null, // see Note!
        );
        wp_tag_cloud( $args );
      ?>
    </div>
    <div class="text-center mt-5">
    <a href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>/blog"><< Go back to blog page to see and filter all posts.</a>
    </div>
  </div>
  <div class="col my-5 mx-3 bg-dark bg-fade no-overflow">
    <div class="row">
      <div id="portfolio" class="col">
      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();

						if ( has_post_thumbnail() ) {
									    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),’thumbnail’ );
											$url = get_the_permalink();
                      $title = get_the_title();
                      $excerpt = get_the_excerpt();
                      $items = array('top', 'bottom', 'left');
                      $post_tags = get_the_tags();
                      $html_tags = '';
                      foreach($post_tags as $t){
                        $html_tags = $html_tags . ' ' . $t->slug;
                      }
									     echo '<div class="mb-3 imagebox tile scale-anm all' . $html_tags . '">
                              <a href="' . $url . '">
                                <img width="100%" height="100%" class="category-banner img-responsive" src="' . $image_src[0] . '">
                                <!-- overlay content -->
                                <span class="imagebox-desc"><h3 class="img-overlay text-uppercase">' . $title . '</h3>
                                <div class="imagebox-excerpt">
                                ' . $excerpt . '
                                </div>
                                </span>
                               </a>
                             </div>';
									}
						  endwhile;
       else :
          _e( 'Sorry, nothing to see here. Mind your own business, bro!', 'textdomain' );
      endif;
      ?>
    </div> <!-- end portfolio col -->
    </div>

  </div>
</div>
<?php get_footer(); ?>
