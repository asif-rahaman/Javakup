<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); 
$brfind=get_brewfinder();
$newarv= get_newarrival_coffee();
$newarvt= get_newarrival_tea();
$newarvcc= get_newarrival_cocoa();
$newarvch= get_newarrival_chai();
$newarvcdr= get_newarrival_cider();

?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

        <div class="new-arrivals-content">
            <div class="new-arrivals-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo get_the_post_thumbnail(97,'full'); ?>
                            </div>
                        </div>
                    </div>
            </div>
           
        <div class="new-arrivals-tabs">
            <div class="container">
			
			<!-- Products with tab n slider -->
            <div class="row" style="margin-top: -129px;">
                <div class="col-md-12 user-details">
                    <div class="user-info-block">
                        <ul class="navigation">
                            <li class="col-md-4 active">
                                <a data-toggle="tab" href="#coffee-tab">
                                    <h3>Coffee</h3>
                                </a>
                            </li>
                            <li class="col-md-4">
                                <a data-toggle="tab" href="#tea-tab">
                                    <h3>Tea</h3>
                                </a>
                            </li>
							<li class="col-md-4">
                                <a data-toggle="tab" href="#cocoa-tab">
                                    <h3>Cocoa</h3>
                                </a>
                            </li>
                            
                        </ul>
                        <div class="user-body">
                            <div class="tab-content">
                                <div id="coffee-tab" class="tab-pane active">
									<div class="wrapper">
                                        <div class="jcarousel-wrapper">
                                            <div id="coffee_tab" class="jcarousel">
                                                <ul>
                                                	<?php 
						if($newarv){
							foreach ($newarv as $nakey => $arrv) {
							?>
                                                    <li>
														<div class="thumbnail ">
                                                            <a href="<?php echo get_permalink($arrv->ID ); ?>" title="">
                                                                <?php echo get_the_post_thumbnail($arrv->ID,array(195,195));?>
                                                                <div class="caption">
                                                                    <p class="product-name"><?php echo get_the_title($arrv->ID); ?></p>
                                                                    <p class="product-price"><?php echo get_woocommerce_currency_symbol();
											$product = new WC_Product($arrv->ID);$price = $product->price; echo $price; ?></p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </li>
                                        <?php 
									}
								}else{
                                                    echo "Check Back Soon!!";
                                                }
								?>
                                                    			
                                                </ul>
                                            </div>
                                                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                                                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                                        </div>
                                    </div>                                                
                                </div>
                                <div id="tea-tab" class="tab-pane">
									<div class="wrapper">
                                        <div class="jcarousel-wrapper">
                                            <div id="tea_tab" class="jcarousel">
                                                <ul>
                                                    
                                        <?php 
                                        if($newarvt){
                                            foreach ($newarvt as $nakey => $arrv) {
                                            ?>
                                            <li>
                                                <div class="thumbnail ">
                                                    <a href="<?php echo get_permalink($arrv->ID ); ?>" title="">
                                                        <?php echo get_the_post_thumbnail($arrv->ID,array(195,195));?>
                                                        <div class="caption">
                                                            <p class="product-name"><?php echo get_the_title($arrv->ID); ?></p>
                                                            <p class="product-price"><?php echo get_woocommerce_currency_symbol();
                                    $product = new WC_Product($arrv->ID);$price = $product->price; echo $price; ?></p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                                        <?php 
                                                    }
                                                }else{
                                                    echo "Check Back Soon!!";
                                                }
                                                ?>
                                        
                                                    			
                                                </ul>
                                            </div>
                                                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                                                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                                        </div>
                                    </div>												
                                </div>
								<div id="cocoa-tab" class="tab-pane">
									<div class="wrapper">
                                        <div class="jcarousel-wrapper">
                                            <div id="cocoa_tab" class="jcarousel">
                                                <ul>
                                                    <?php 
                                        if($newarvcc){
                                            foreach ($newarvcc as $nakey => $arrv) {
                                            ?>
                                            <li>
                                                <div class="thumbnail ">
                                                    <a href="<?php echo get_permalink($arrv->ID ); ?>" title="">
                                                        <?php echo get_the_post_thumbnail($arrv->ID,array(195,195));?>
                                                        <div class="caption">
                                                            <p class="product-name"><?php echo get_the_title($arrv->ID); ?></p>
                                                            <p class="product-price"><?php echo get_woocommerce_currency_symbol();
                                    $product = new WC_Product($arrv->ID);$price = $product->price; echo $price; ?></p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                                        <?php 
                                                    }
                                                }else{
                                                    echo "Check Back Soon!!";
                                                }
                                                ?>
                                                </ul>
                                            </div>
                                                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                                                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <!-- /Products with tab n slider -->
			<!-- <div class="row">
				<div class="col-md-12">
					<div class="slider-responsive feature-cat-items bapcategory_right_bar">
						<?php /*
						if($newarv){
							foreach ($newarv as $nakey => $arrv) {
							?>
							<div class="thumbnail col-md-2">
								<a href="#" title="">
									<?php echo get_the_post_thumbnail($arrv->ID,array(195,195));?>
								</a>
								<div class="caption">
									<p class="product-name">
										<a href="<?php echo get_permalink($arrv->ID ); ?>" title="">
											<?php echo get_the_title($arrv->ID); ?>
										</a>
									</p>												
									<p class="product-price">
										<a href="<?php echo get_permalink($arrv->ID ); ?>" title=""><?php echo get_woocommerce_currency_symbol();
											$product = new WC_Product($arrv->ID);$price = $product->price; echo $price; ?>
										</a>
									</p>												
								</div>										
							</div>										
							<?php 
							}
						}*/
						?>
					</div>
				</div>
			</div> -->

			<!-- /New arrivals slider slider -->
			
            </div>
        </div>    
        </div>


			

			<?php //comments_template(); ?>
		<?php endwhile; ?>

		
	

<?php// get_sidebar(); ?>
<?php get_footer(); ?>