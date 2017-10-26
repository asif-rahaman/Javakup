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
$newarv= get_newarrival();
$salepr= get_saleproduct();
?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="brew-finder-content">
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
								         'Type' => 'pa_p-type', 
								         'Origin' => 'pa_origin', 
								         'Accessories' => 'pa_accessories'
								        ),
								        'tea' => array(
								         'Type' => 'pa_p-type', 
								         'Variety' => 'pa_variety'
								        )
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
											$mcat_link = get_term_link($mcat, 'product_cat');

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
										                  $new_cats = $cat_str.','.$br_cat->slug;
										                  $cat_pattern = '/(product_cat=)(\w+)(&)/';
										$cat_replacement = '${1}'.$new_cats.'$3';
										$built_link = preg_replace($cat_pattern, $cat_replacement, $_SERVER['REQUEST_URI'].'&');
										                  ?>
										                    <div class="checkbox">
																<label>
																    <input type="checkbox" rel="<?php echo $built_link; ?>">
																	<?php echo $br_cat->name; ?>
																</label>
															</div>
										                <?php
										                }
										                ?>	
													</div>                
                                                </div>
												
												<?php
								                foreach ($attr_pref[$mcat->slug] as $prkey => $pref) 
								                {
									                $inner_attr = get_terms($pref, 
									                 	array(
										                    'parent' => 0,
										                    'hide_empty' => 0
									                	 ) 
									         		);
								                    ?>
								                    <div class="form-group">
	                                                    <label><?php echo $prkey; ?></label>
														<div class="<?php if(count($inner_attr) > 6){ ?>auto-scroll-group<?php } ?>">
														<?php 
										                    foreach ($inner_attr as $iakey => $inn_attr) {
										                    $attr_link = get_term_link($inn_attr, $pref); 
										                    $find_attr = $pref.'='.$inn_attr->slug;
										                    $found_attr = strpos($_SERVER['REQUEST_URI'], $find_attr);


										                    if ($found_attr !== false) {
										                    $upd_link = $_SERVER['REQUEST_URI'];
										                    } else {
										                    $upd_link = $_SERVER['REQUEST_URI'].'&'.$pref.'='.$inn_attr->slug;
										                    }
										                    ?>
															<div class="checkbox">
																<label>
																  <input type="checkbox" rel="<?php echo $upd_link; ?>"> 
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
                        <?php woocommerce_breadcrumb(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12">
					<?php //echo get_the_post_thumbnail(95,'full'); ?>
                    <?php the_post_thumbnail('full'); ?>
				</div>
			</div>
            <!-- Products with tab n slider -->
            <div class="row">
                <div class="col-md-12 user-details">
                    <div class="user-info-block">
                        <ul class="navigation">
                            <li class="col-md-6 active">
                                <a data-toggle="tab" href="#new-arrivals-tab">
                                    <h3>New Arrivals</h3>
                                </a>
                            </li>
                            
                            <li class="col-md-6">
                                <a id="sale-tab-btn" data-toggle="tab" href="#sale-tab">
                                    <h3>Sale</h3>
                                </a>
                            </li>
                        </ul>
                        <div class="user-body">
                            <div class="tab-content">
                                <div id="new-arrivals-tab" class="tab-pane active">
                                    <div class="wrapper">
                                        <div class="jcarousel-wrapper">
                                            <div id="new-arrivals" class="jcarousel">
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
			                                                    echo "Check back Soon!!";
			                                                }
											?>
                                                
                                                </ul>
                                            </div>
                                            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                                            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="sale-tab" class="tab-pane">
                                    <div class="wrapper">
                                        <div class="jcarousel-wrapper">
                                            <div id="sale" class="jcarousel">
                                                <ul>
                                                	<?php 
						if($salepr){
							foreach ($salepr as $nakey => $arrv) {
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
                                                    echo "Check BACK Soon!!";
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
			<div class="row">
				<div class="col-md-12">
					<div class="feature-cat-title">
					
					</div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12">
                    <div class="brewers-heading">
                        <h2>JavaKup.com Brewers</h2>
                    </div>
                </div>
            </div>
            <?php if ($brfind){ ?>
            <div class="row">
                <div class="col-md-12">
                	<div class="brewers-logos">
                		<div class="row" style="margin-bottom: 20px;">
                		<?php 
                		foreach ($brfind as $bfkey => $bfvalue) {
                		?>
                    	
                            <div class="col-md-3">
                                <div class="brewers-items">
                                	<a href="<?php $term_link = get_term_link( $bfvalue, 'product_cat' );
                                	echo $term_link;
                                	 ?>">
                                    <?php 
                                    $bf_cat_thumbnail_id = get_woocommerce_term_meta( $bfvalue->term_id, 'thumbnail_id', true );
								    $bf_cat_image = wp_get_attachment_url( $bf_cat_thumbnail_id );
								    if ( $bf_cat_image ) {
									    echo '<img src="' . $bf_cat_image . '" alt="" />';
									}
                                    ?>
                                </a>
                                </div>
                            </div>

                        <?php 
                        if(($bfkey+1) % 4 == 0){
                		?>
						</div>
						<div class="row" style="margin-bottom: 20px;">
                		<?php
                		}
                		?>
                    <?php 
                	} 
                	?>
                	</div>
                    
                   </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
        </div>
    </div>

			

			<?php //comments_template(); ?>
		<?php endwhile; ?>

		
	

<?php// get_sidebar(); ?>
<?php get_footer(); ?>