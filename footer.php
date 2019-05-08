<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage kalahari
 */
?>
  <div class="row mt-auto">
    <div class="col">
          <?php if ( is_active_sidebar( 'sidebar-partner' ) ) : ?>
          	<div class="row px-3 bg-light text-muted">
          		<?php dynamic_sidebar( 'sidebar-partner' ); ?>
          	</div>
          <?php endif; ?>

            <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
            	<div class="row px-5 py-3 bg-dark bg-fade text-muted">
            		<?php dynamic_sidebar( 'sidebar-footer' ); ?>
            	</div>
            <?php endif; ?>

        <div class="row">
            <div class="col text-center tiny bg-dark text-muted pt-1">
          		<a href="<?php echo esc_url( __( 'https://codinski.club/', 'codinski' ) ); ?>" target="_blank" class="credits">
          			<?php printf( __( 'Handmade with <i class="fa fa-magic" aria-hidden="true" title="magic"></i> by %s', 'codinski' ), 'Liz' ); ?>
          		</a>
          	</div>
        </div>
      </div>
    </div>
  </div> <!-- close .container-fluid -->
</body>
<!-- load js script -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php bloginfo("template_directory"); ?>/js/searchfilter.js"></script>
</html>
