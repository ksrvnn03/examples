<?php 

remove_action ('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action ('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );



function cust_thumbnail(){
	
	global $post, $product;

		$post_thumbnail_id = get_post_thumbnail_id();
		$product_images    = $product->get_gallery_image_ids();

		// Remove featured image from gallery
		if ( has_post_thumbnail() && in_array( $post_thumbnail_id, $product_images ) ) {
			unset( $product_images[ array_search( $post_thumbnail_id, $product_images ) ] );
		}

		// Classes
		$classes = array( 'product-images' );

		// Has gallery
		$has_gallery = count( $product_images ) > 0;

		if ( $has_gallery ) {
			$has_gallery =
			$classes[] = 'has-gallery';
		}
		
		$image_size   = apply_filters( 'single_product_archive_thumbnail_size', 'woocommerce_thumbnail' );
		$thumbnail_id = has_post_thumbnail() ? $post_thumbnail_id : array_shift( $product_images );
		
		if ( $thumbnail_id ) {
			$thumb=wp_get_attachment_image_src($post_thumbnail_id,'thumbnail');
			$imgs=array();
			foreach ( $product_images as $thumbnail_id ) {
				$is=wp_get_attachment_image_src($thumbnail_id,'thumbnail');
				$imgs[]=$is[0];			
			}
		} else {
			// @ToDo Show placeholder image
		}
		
		 
		
?>
	<div class="large_view" id="p<?php echo get_the_id(); ?>" data-images="<?php echo implode(", ",$imgs); ?>">
		<img src="<?php echo $thumb[0] ?>" />
		<a href='#' class='next'></a>
		<a href='#' class='previous'></a>
	</div>
<?php
}
add_action( 'woocommerce_before_shop_loop_item_title', 'cust_thumbnail', 10 );
?>


