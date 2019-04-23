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
    <h2 class="text-uppercase mt-2"><?php echo get_option( 'custom-blog-page-title' ); ?></h2>
    <p>
      <?php echo get_option( 'custom-blog-page-subtitle' ); ?>
    </p>
    <div>
      <?php
      $tags = get_tags(array(
        'hide_empty' => true
      ));
      echo '<div class="text-center mt-5">';
      echo '<button class="btn fil-cat mr-1 mb-1" href="" data-rel="all">SHOW ALL</button>';
      foreach ($tags as $tag) {
        echo '<button class="btn fil-cat mr-1 mb-1" href="" data-rel="' . $tag->slug . '">#' . $tag->name . '</button>';
      }
      echo '</div>';
      ?>
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
