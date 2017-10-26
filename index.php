<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); 
$slider= get_sliders();
$prmbox= get_prmbox();
$newarv= get_newarrival();
$salepr= get_saleproduct();

$home_page = get_post(2); 
?>
<?php if ($slider) { ?>
	<div class="content-home-slider">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            	
                                <!-- Carousel -->
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                    	<?php 
                                    	foreach ($slider as $hskey => $hsvalue) {
                                    		?>
                                    		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $hskey; ?>" class="<?php if ($hskey==0){echo "active";} ?>"></li>
                                    		 <?php
                                    	}
                                    	?>
                                       
                                       
                                    </ol>
                                    <div class="carousel-inner">
                                    <!-- Wrapper for slides -->
                                    <?php 
                                    	foreach ($slider as $hskey => $hsvalue) {
                                    		?>
                                    
                                        <div class="item <?php if ($hskey==0){echo "active";} ?>">
                                            <a href="<?php echo get_field('url',$hsvalue->ID);?>"><?php echo get_the_post_thumbnail($hsvalue->ID,'full');?></a>
                                        </div>
                                        
                                   
                                    <?php
                                    	}
                                    	?>
                                    	 </div>

                                </div><!-- /carousel -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="content-home-intro-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo apply_filters('the_content', $home_page->post_content);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-home-feature-product">
                    <div class="container">
                    	<?php if($prmbox){ ?>
                        <!-- Feature Items -->
                        <div class="row">
                        	<?php foreach ($prmbox as $prmkey => $prmvalue) {?>
                            <div class="col-md-4">
                              <div class="thumbnail">
                                <?php echo get_the_post_thumbnail($prmvalue->ID,'full');?>
                                	<?php $pr_cls = array(' feature-new',' feature-brews',' feature-picks');?>

                                  <div class="caption<?php echo $pr_cls[$prmkey]; ?>">
                                    <h2><?php echo get_the_title($prmvalue->ID); ?></h2>
                                    <p><a href="<?php echo get_field('prm_url',$prmvalue->ID);?>" class="btn btn-info btn-lg" role="button">shop</a></p>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- /Feature Items -->
                        <?php } ?>

                        <!-- Topseller Save -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-topseller-save pull-left">
                                    <div class="col-md-2"><img src="<?php echo get_field('special_offer_image',2);?>" alt=""></div>
                                    <div class="col-md-8"><span><?php echo get_field('special_offer',2);?></span></div>
                                    <div class="col-md-2"><a href="<?php echo get_field('sp_offer_link',2);?>" class="btn btn-info btn-lg" role="button">learn more</a></div>

                                </div>
                            </div>
                        </div>
                        <!-- /Topseller Save -->
                        <!-- New Arrivals -->
						
						<div class="row">
							<div class="col-md-12">
								<div class="feature-cat-title">
									<p>New Arrivals</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="slider-responsive feature-cat-items">
									<?php 
									if($newarv){
										foreach ($newarv as $nakey => $arrv) {
										?>
										<div class="thumbnail col-md-2">
											<a href="<?php echo get_permalink($arrv->ID ); ?>" title="">
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
									}
									?>
								</div>
							</div>
						</div>

                   <!--      End of New arival -->
						<?php if($salepr){ ?>
						<div class="row">
							<div class="col-md-12">
								<div class="feature-cat-title">
									<p>Sale</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="slider-responsive feature-cat-items">
									<?php foreach ($salepr as $spkey => $spvalue) {?>
									<div class="thumbnail col-md-2">
										<a href="<?php echo get_permalink($spvalue->ID ); ?>" title="">
											<?php echo get_the_post_thumbnail($spvalue->ID,array(195,195));?>
										</a>
										<div class="caption">
											<p class="product-name">
												<a href="<?php echo get_permalink($spvalue->ID ); ?>" title="">
														<?php echo get_the_title($spvalue->ID); ?>
													</a>
											</p>												
											<p class="product-price">
												<a href="<?php echo get_permalink($spvalue->ID ); ?>" title=""><?php echo get_woocommerce_currency_symbol();
														$product = new WC_Product($spvalue->ID);$price = $product->price; echo $price; ?>
													</a>
											</p>												
										</div>										
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>

                    </div>
                </div>
<?php get_footer(); ?>