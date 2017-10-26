<?php
/**
 * Subscription Product Add to Cart
 */
global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;

// Availability
$availability = $product->get_availability();

if ($availability['availability']) :
	echo apply_filters( 'woocommerce_stock_html', '<p class="stock '.$availability['class'].'">'.$availability['availability'].'</p>', $availability['availability'] );
endif;

if ( ! $product->is_in_stock() ) : ?>
	<link itemprop="availability" href="http://schema.org/OutOfStock">
<?php else : ?>

	<link itemprop="availability" href="http://schema.org/InStock">

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="form-inline category-sort-btn" method="post" enctype='multipart/form-data'>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
		<?php $prod_per_box = get_post_meta($product->id, 'box', true ); ?>
	 	<div class="btn-group">
          <button type="button" class="btn btn-default details-cart-dd"><?php echo $prod_per_box; ?> Box</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"><?php echo $prod_per_box; ?> Box</a></li>
          </ul>
        </div>
        <div class="form-group"> 

		<?php
		if ( ! $product->is_sold_individually() )
			woocommerce_quantity_input( array(
				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
		) );
		?>
		</div>
		<div class="form-group">                                                        
		    <label class="" for="quantity">Qty</label>
		</div>
		<button type="submit" class="button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>