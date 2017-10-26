<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



get_header( 'shop' );?>
<div class="category-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="left-sidebar">
                	<?php //woocommerce_get_sidebar(); ?>

                    <div class="row">
                        <div class="col-md-12">                                        
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                	<?php 
                                	$cat_str = get_query_var('product_cat');
								    $cat_arr = explode(",", $cat_str);

								    $attr_pref = array(
								        'coffee' => array(
								         'Roast' => 'pa_roast', 
								         //'Type' => 'pa_p-type', 
								         //'Origin' => 'pa_origin', 
								         //'Accessories' => 'pa_accessories'
								        ),
								        'tea' => array(
								         //'Type' => 'pa_p-type', 
								         'Variety' => 'pa_variety'
								        ),
								        'cocoa' => array(
								        	'Type' => 'pa_p-type'
								        ),
								        'chai' => array(
								        	//'Type' => 'pa_p-type', 
								         	'Variety' => 'pa_variety'
								        ),
								        'cider' => array(

								        )
								        /*'pack-products' => array(

								        )*/
								    );
                                	?>
                                  <!-- Brand and toggle get grouped for better mobile display -->
                                  <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                    </button>
                                    <span class="navbar-brand">Shop by Brew</span>
                                    <!-- <a class="navbar-brand category-current" href="#">Coffee</a> -->
                                  </div>

                                  <!-- Collect the nav links, forms, and other content for toggling -->

                                    <?php 
                                    

								    $main_categories = get_terms('product_cat', 
								            array(
								                'parent' => 0,
								                'exclude' => '19,26,44,45',
								                'hide_empty' => 0
								            ) 
								    );
                                    ?>
                                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <div class="nav navbar-nav left_cats_filter">
                                        <?php 
                                        foreach ($main_categories as $mchkey => $mcat) 
                                        {
											if (in_array('pack-products', $cat_arr)) {
												$mc_link = get_term_link($mcat, 'product_cat');
												$mcat_link = $mc_link.',pack-products';
											} else {
												$mcat_link = get_term_link($mcat, 'product_cat');
											}	
											

											if (in_array($mcat->slug, $cat_arr)) { 
								                $br_categories = get_terms('product_cat', 
								                array(
								                    'parent' => 19,
								                    'hide_empty' => 0
								                ) 
								        		);
                                            ?>
                                            <form>
                                            	<div class="form-group">
                                            		<a class="category-current" href="#">
				                                    	<?php echo $cat_arr[0]; ?>
				                                    </a>
                                            	</div>

                                                <div class="form-group">
                                                    <label>Brand</label>
													<div class="<?php if(count($br_categories) > 6){ ?>auto-scroll-group<?php } ?>">
														<?php 
										                foreach ($br_categories as $brkey => $br_cat) {
										                	if (in_array('pack-products', $cat_arr)) {	
										                		$new_cats = $cat_arr[0].',pack-products,'.$br_cat->slug;
										                	} else {
										                		$new_cats = $cat_arr[0].','.$br_cat->slug;
										                	}

										                    $cat_pattern = '/(product_cat=)([\w\W]+)(&)/';
															$cat_replacement = '${1}'.$new_cats.'$3';
															$built_link = preg_replace($cat_pattern, $cat_replacement, $_SERVER['REQUEST_URI'].'&');
										                    
										                    $rel_cat = get_field('brand_for_cat', $br_cat);
										                    if($rel_cat == $mcat->term_id){
										                    ?>
										                    <div class="checkbox">
																<label>
																    <input type="checkbox" rel="<?php echo $built_link; ?>"<?php if (in_array($br_cat->slug, $cat_arr)) {echo "checked";} ?>>
																	<?php echo $br_cat->name; ?>
																</label>
															</div>
										                	<?php
										                	}
										                }
										                ?>	
													</div>                
                                                </div>
												
												<?php
												if($attr_pref[$mcat->slug]){
									                foreach ($attr_pref[$mcat->slug] as $prkey => $pref) 
									                {
										                $inner_attr = get_terms($pref, 
										                 	array(
											                    'parent' => 0,
											                    'hide_empty' => 0
										                	 ) 
										         		);

										         		if(!empty($inner_attr) && !is_wp_error($inner_attr)) 
										         		{
									                    ?>
										                    <div class="form-group">
			                                                    <label><?php echo $prkey; ?></label>
																<div class="<?php if(count($inner_attr) > 6){ ?>auto-scroll-group<?php } ?>">
																<?php 
												                    foreach ($inner_attr as $iakey => $inn_attr) {
												                    $attr_link = get_term_link($inn_attr, $pref); 
												                    //$find_attr = $pref.'='.$inn_attr->slug;
												                    $find_attr = $pref;
												                    $found_attr = strpos($_SERVER['REQUEST_URI'], $find_attr);
												                    $chk_curr_attr = strpos($_SERVER['REQUEST_URI'], $inn_attr->slug);

												                    if ($found_attr !== false) {
												                    	$attr_pattern = '/('.$pref.'=)([\w]+)(&)/';
																		$attr_replacement = '${1}'.$inn_attr->slug.'$3';
																		$upd_link = preg_replace($attr_pattern, $attr_replacement, $_SERVER['REQUEST_URI'].'&');
												                    } else {
												                    	$upd_link = $_SERVER['REQUEST_URI'].'&'.$pref.'='.$inn_attr->slug;
												                    }
												                    ?>
																	<div class="checkbox">
																		<label>
																		  <input type="checkbox" rel="<?php echo $upd_link; ?>"<?php if ($chk_curr_attr !== false) {echo "checked";} ?>> 
																		  		<?php echo $inn_attr->name; ?>
																		</label>
																	</div>
																	<?php 
																	}
																	?>
																</div>
			                                                </div>
									                	<?php
									                	}
									              	}
									            }  	
								              	?>

                                            </form>
                                            <?php 
                                        	}
                                            ?>
											
											<?php 
											if (!in_array($mcat->slug, $cat_arr)) { 
											?>
                                            <div class="category-other">
                                                <a href="<?php echo $mcat_link; ?>"> 
								                    <?php echo $mcat->name; ?>
								                </a>
                                            </div>
                                            <?php 
                                        	}
                                            ?>
										<?php 
										}
										?>
                                    </div>
                                  </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                              </nav>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="content-topseller-save pull-left">
                                <img src="<?php echo get_field('side_bar_promo_image',2);?>" alt=""><br>
                                <div class="topseller-save-info">
                                    <span><?php echo get_field('side_bar_promo_text',2);?></span><br>
                                    <a href="<?php echo get_field('side_bar_promo_link',2);?>" class="btn btn-info btn-lg pull-left" role="button">learn more</a>
                                </div>                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="right-sidebar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="category-breadcumbs">
                                <ol class="breadcrumb">
                                   <?php woocommerce_breadcrumb(); ?>
                                </ol>
                            </div>
                        </div>
                    </div>

                     <?php 
                    $cat_str = get_query_var('product_cat');
					$cat_arr = explode(",", $cat_str);
					if (in_array('pack-products', $cat_arr)) {
					?>
                    <div class="row">
						<div class="col-md-12 bapcategory_top_bar">
							<div class="bapcategory_top_bar_wrapper">
								<div class="row">
									<?php $currpack_qty = get_curr_pack_qty(); ?>
									<div class="col-md-6 col-sm-6 col-xs-12 bapcategory_top_bar_counter">
										<h4 class="pull-left">Build-A-Box:</h4>
										<span class="nmbr pull-left"><?php echo $currpack_qty; ?></span>
										<span class="span_of pull-left">of</span>
										<!-- <form class="form-inline category-sort-btn pull-left">
											<div class="btn-group">
											  <button class="btn btn-default details-cart-dd" type="button">5 Pack</button>
											  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											  </button>
											  <ul role="menu" class="dropdown-menu">
												<li><a href="#">12</a></li>
												<li><a href="#">24</a></li>
												<li><a href="#">30 </a></li>
											  </ul>
											</div>
										</form> -->
							            <?php 
										$cups_arr = array(
											'30' => 30,
											'45' => 45,
											'60' => 60,
										);
										?>
										<select>
											<?php 
											$sel = '';
											foreach ($cups_arr as $cak => $cup) {
												if($_SESSION['usr_sel_pack_qty']){
													if($cup == $_SESSION['usr_sel_pack_qty']){
														$sel = ' selected="selected"';
													} else {
														$sel = '';
													}
												}
												echo "<option".$sel." value='".$cak."'>".$cup."</option>";
											}
											?>
										</select>
										<span class="cups_pack pull-left">cups in box</span>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 bapcategory_top_bar_btn">
										<div class="viewpack_btn_wrap">
											<a class="btn btn-info btn-lg pull-left" href="<?php echo get_permalink('101')."&curr_pack=show"; ?>"> View Box </a>
											<?php 
											if($currpack_qty == 30 || $currpack_qty == 45 || $currpack_qty == 60){
											?>
												<a class="btn btn-success btn-lg savepack_btn_wrap pull-left sv_pack sv_enabled" href="<?php echo get_permalink('101')."&save_pack=y"; ?>">Save Box</a>
											<?php
											} else {
											?>
												<a class="btn btn-success btn-lg savepack_btn_wrap pull-left sv_pack sv_disabled" href="javascript:void(0)">Save Box</a>
											<?php
											}
											?>
											<a class="start_over_btn pull-left" href="<?php echo get_permalink('101')."&start_over=y"; ?>"> Start Over </a>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<?php 
					}
					?>

                    <?php if ( have_posts() ) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="category-sort">
                            	<?php woocommerce_catalog_ordering(); ?>
                            	<?php //do_action( 'woocommerce_before_shop_loop' ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                                  	
                            	<?php woocommerce_product_loop_start(); ?>

									<?php woocommerce_product_subcategories(); ?>

									<?php while ( have_posts() ) : the_post(); ?>

										<?php wc_get_template_part( 'content', 'product' ); ?>

									<?php endwhile; // end of the loop. ?>

									<?php woocommerce_product_loop_end(); ?>
									

                                
                                    <!-- <a href="#" title="">
                                        <img src="images/0000727_kau-coffee-mill-single-cups-12ct.png" alt="kau-coffee-mill-single-cups-12ct">
                                    </a>
                                    <div class="caption">
                                        <p class="product-name">
                                            <a href="#" title="">Ka'u Coffee Mill Single Cups - 12ct.</a>
                                        </p>												
                                        <p class="product-price">
                                            <a href="#" title="">$20.80/pack</a>
                                        </p>												
                                    </div> -->
                            
                        </div>
                    </div>
					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

                    <div class="row">
                        <div class="col-md-12 pull-right">
                            <div class="category-pagination pull-right">
                                <ul class="pagination">
                                	<?php  woocommerce_pagination()?> 
                                    <!-- <li class="disabled"><a href="#">&laquo;</a></li>
                                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&raquo;</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

		<?php
			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			//do_action( 'woocommerce_before_main_content' );
		?>


			
				<?php// woocommerce_product_loop_start(); ?>

					<?php //woocommerce_product_subcategories(); ?>

					<?php //while ( have_posts() ) : the_post(); ?>

						<?php //wc_get_template_part( 'content', 'product' ); ?>

					<?php//endwhile; // end of the loop. ?>

				<?php //woocommerce_product_loop_end(); ?>

				<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					//do_action( 'woocommerce_after_shop_loop' );
				?>

			
		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			//do_action( 'woocommerce_after_main_content' );
		?>

		<?php
			/**
			 * woocommerce_sidebar hook
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			//do_action( 'woocommerce_sidebar' );
		?>

	<?php get_footer( 'shop' ); ?>