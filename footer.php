<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		<div class="site-info">
			<?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
			<?php endif; ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentynineteen' ) ); ?>" class="imprint">
				<?php
				/* translators: %s: WordPress. */
				printf( __( 'Proudly powered by %s.', 'twentynineteen' ), 'WordPress' );
				?>
			</a>
			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
			?>
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .footer-navigation -->
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?> 
<script type="text/javascript">
(function($) {

		var index = 0;
		
		var images = [
		  'http://placehold.it/300&text=first+picture',
		  'http://placehold.it/300&text=second+picture',
		  'http://placehold.it/300&text=third+picture'
		];
		
		var previousIndex = function(id, cvalue) {
		 <!--console.log(id+"--"+cvalue); -->
		  var arrayOfData = [];
		  var id=$('#'+id).data('images').split(',');
		  arrayOfData.push(id);
		  var length=arrayOfData[0].length;
		  
		  var index = arrayOfData[0].indexOf(cvalue);
		
		  if (index <= 0) {
		    return length - 1; 
		  } else {
		    return index - 1;
		  }
		}
		
		var nextIndex = function(id,cvalue) {
			var arrayOfData = [];
			var id=$('#'+id).data('images').split(',');
			arrayOfData.push(id);
			var length=arrayOfData[0].length;

			var index = arrayOfData[0].indexOf(cvalue);	
			return ((index + 1) % length);
		};
		
		$('.next').click(function(e) {
			e.preventDefault();
		  var img=$(this).parent('.large_view').data('images');
		  var id=$(this).parent('.large_view').attr('ID');
		  var stuff =$(this).parent('.large_view').data('images').split(',');
		  var cvalue=$(this).parent('.large_view').find('img').attr('src');
		  index = nextIndex(id,cvalue);
		  $('#'+id+'.large_view img').attr('src', stuff[index]);
		});
		
		$('.previous').click(function(e) {
			e.preventDefault();
			var id=$(this).parent('.large_view').attr('ID');
			var stuff =$(this).parent('.large_view').data('images').split(',');
			var cvalue=$(this).parent('.large_view').find('img').attr('src');
		   index = previousIndex(id,cvalue);
		   console.log(index+"--"+id);
		   $('#'+id+'.large_view img').attr('src', stuff[index]);
		});
		
		/** initialize the image on load to the first one */
		//$('.large_view img').attr('src', images[index]);
		
	

})(jQuery);
		
	</script>
</body>
</html>
