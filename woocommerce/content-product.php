<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array('thumbnail');
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
if ( 0 == ($woocommerce_loop['loop']-1) % 4 )
	echo '<div class="clearfix"></div>';

$cat_str = get_query_var('product_cat');
$cat_arr = explode(",", $cat_str);
?>

<div class="col-md-3">
<div class="thumbnail">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<a href="<?php the_permalink(); ?>">

			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				//do_action( 'woocommerce_before_shop_loop_item_title' );
				woocommerce_template_loop_product_thumbnail();
			?>

			<p class="product-name">
				<?php the_title(); ?>
				<?php //echo get_post_meta($product->id, 'box', true ); ?>
			</p>
		</a>	
		
		<?php 
		if (in_array('pack-products', $cat_arr)) {
		?>
			<input class="input-number product-qty ap_qty_<?php echo $product->id; ?>" type="text" name="ap_qty" value="1">
			<a rel="<?php echo $product->id; ?>" href="<?php echo get_permalink('101')."&pack-prod=".$product->id."&addtopack=y"; ?>" class="btn btn-default btn-success btn-checkout btn-small addpack_sub">Add</a>
		<?php 
		} else {
		?>
			<p class="product-price">
				<a href="<?php the_permalink(); ?>">
				<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				woocommerce_template_loop_price();
				?> /box
				</a>
			</p>
		<?php
		}
		?>

	

	<?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>

</div>
</div>