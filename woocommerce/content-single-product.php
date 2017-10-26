<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 product_magnifire">
        <div class="left-sidebar">
            <!---<div class="row">
                <div class="col-md-12 pull-left">  --->                                      
                    <div class="image-main pull-left">
                        <!--<img class="col-sm-6 col-md-12 img-responsive" src="http://onecup.com/content/images/thumbs/0000397_cleancups-cleaning-cups.png" alt="Main Image 1" id="mainImage"/>-->
                        <div id="imageWrap">
                            <!-- <img class="img-zoom" src="http://onecup.com/content/images/thumbs/0000397_cleancups-cleaning-cups.png" alt="Main Image 1" id="mainImage"/> -->

                            <?php 
                            if ( has_post_thumbnail() ) {

								$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
								$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
								$image = get_the_post_thumbnail( $post->ID, 'full', array(
										'title' => $image_title,
										'class' => 'img-zoom',
										'id' => 'mainImage'
										) 
								);

								echo $image;
							}

                            ?>
                        	
                        </div>
                    </div>
                <!--</div>
            </div>-->
            
            <?php 
            $attachment_ids = $product->get_gallery_attachment_ids();
            if ( $attachment_ids ) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="image-thumbnail">
                        <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id( $post->ID )); ?>" class="thumbnail-img">
                                <?php echo get_the_post_thumbnail($post->ID, 'product_gall_thumb'); ?>

                        </a>

                        <?php 
                        foreach ( $attachment_ids as $attachment_id ) {
                        $image_link = wp_get_attachment_url( $attachment_id );
                        ?>
                            <a href="<?php echo $image_link; ?>" class="thumbnail-img">
                                <?php echo wp_get_attachment_image( $attachment_id, 'product_gall_thumb' ); ?>

                            </a>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
            }
            ?>

        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 product_magnifire_text">
        <div class="right-sidebar">
            <div class="row">
                <div class="col-md-12">
                    <div class="details-product-name">
                        <?php woocommerce_template_single_title(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="details-product-price">
                        <span class="price-sale"><?php woocommerce_template_single_price(); ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="details-product-description">
                        <?php the_content();
                        //woocommerce_template_single_excerpt(); ?>
                    </div>
                    <div class="details-product-star">
                        <?php woocommerce_template_single_rating(); ?>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="details-product-shopping">
                        
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>
                    <div class="details-product-build-pack">
                        <a href="<?php echo get_permalink('101'); ?>" title="Build A Box">
                            <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/buildapack_cta.png" alt="Build A Box" />
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<div class="row">
        <div class="col-md-12">
            <div class="details-product-reviews">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 pull-left">
                            <div class="panel panel-primary">
                                <div class="panel-heading row">
                                    <div class="panel-title col-md-5 pull-left">
                                        <h2>Customer Reviews</h2>
                                        <h3>
                                            <?php echo $product->get_rating_count(); ?> Review(s)
                                        </h3>
                                    </div>
                                    <div class="pull-right col-md-3 col-md-offset-4 text-right clickable">                                                          
                                        <button id="review" type="submit" class="btn btn-default btn-lg pull-right">write a review</button>
                                        <button style="display:none;" id="cancel" type="submit" class="btn btn-default btn-lg pull-right">cancel</button>                                                           
                                    </div>
                                </div>
                                <div style="display:none;" class="panel-body rev_tabs">
                                    <?php woocommerce_output_product_data_tabs(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        </div>

<!-- <div itemscope itemtype="<?php// echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
        /**
         * woocommerce_before_single_product_summary hook
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        //do_action( 'woocommerce_before_single_product_summary' );
        //woocommerce_show_product_images();
    ?>

    <div class="summary entry-summary">

        <?php
            /**
             * woocommerce_single_product_summary hook
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             */
            //do_action( 'woocommerce_single_product_summary' );
            /*woocommerce_template_single_title();
            woocommerce_template_single_price();
            woocommerce_template_single_excerpt();
            woocommerce_template_single_rating();
            woocommerce_template_single_add_to_cart();*/

        ?>

    </div>.summary

    <?php
        /**
         * woocommerce_after_single_product_summary hook
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_output_related_products - 20
         */
        //do_action( 'woocommerce_after_single_product_summary' );
    ?>

    <meta itemprop="url" content="<?php the_permalink(); ?>" />

</div> --><!-- #product-<?php the_ID(); ?> -->

<?php //do_action( 'woocommerce_after_single_product' ); ?>

