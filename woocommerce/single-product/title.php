<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<h1 itemprop="name" class="product_title entry-title">
	<?php 
	the_title();
	/*$prod_per_box = get_post_meta($product->id, 'box', true ); 
    echo " - ".$prod_per_box."ct";*/
	?>
</h1>