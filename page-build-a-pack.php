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

/* add pack products by ajax*/
if(isset($_GET['addtopack']) && isset($_GET['pack-prod'])){
	if($_GET['pack-prod']){
		$pid = $_GET['pack-prod'];
		$pqty = $_GET['ppqty'];
		if((get_curr_pack_qty()+$pqty) <= $_SESSION['usr_sel_pack_qty']){
			if($_SESSION['bp_pro_info'][$pid]){
				$old_qty = $_SESSION['bp_pro_info'][$pid]['bp_qty'];
				$_SESSION['bp_pro_info'][$pid]['bp_qty'] = $old_qty+$pqty;
				
			} else {
				$_SESSION['bp_pro_info'][$pid] = array('bpid' => $pid,
												 'bp_qty' => $pqty
											);
			}
			echo $pqty." item(s) added to your box!";
		} else {
			echo "Given quantity exceeded box limit!";
		}	
	} else {
		echo "Invalid product!";
	}
	exit;
}
/* add pack products by ajax*/

/* start over for box products */
if(isset($_GET['start_over'])){
	if($_SESSION['bp_pro_info']){
		/*reset pack cart*/	
		unset($_SESSION['bp_pro_info']);
		echo 0;
	}
	exit;
}

/* reset box from view box page */
if(isset($_GET['reset_box'])){
	if($_SESSION['bp_pro_info']){
		/*reset pack cart*/	
		unset($_SESSION['bp_pro_info']);
	}
}
/* reset box from view box page */

/*chk for user selected pack*/
if(isset($_GET['cpack'])){
	if($_SESSION['usr_sel_pack_qty']){
		unset($_SESSION['usr_sel_pack_qty']);
		$_SESSION['usr_sel_pack_qty'] = $_GET['cpack'];
	} else {
		$_SESSION['usr_sel_pack_qty'] = $_GET['cpack'];
	}
	//$_SESSION['usr_sel_pack_qty'] = $_GET['cpack'];
}
/*chk for user selected pack*/


/* save pack products */
if(isset($_GET['save_pack'])){
	$pack_cart_items = $_SESSION['bp_pro_info'];
	if($pack_cart_items){
		$currbox_qty = get_curr_pack_qty();
		$fix_pack_products = array(
			'thirty_pack' => '108',
			'fortyfive_pack' => '110',
			'sixty_pack' => '111'
		);

		$added_str = '';
		if(isset($_GET['usrbox'])){
			$added_str .= 'Box Name: '.$_GET['usrbox'].'<br/>';
		}
		
		foreach ($pack_cart_items as $pk_key => $pack) {
			$pack_prod = get_post($pack['bpid']); 
			$prod_per_box = get_post_meta($pack['bpid'], 'box', true );
			$added_str .= 'Product Name: '.$pack_prod->post_title.' - '.$prod_per_box.'ct. - Quantity '.$pack['bp_qty'].'<br/>';
		}

		if($currbox_qty == 30){
 			$woocommerce->cart->add_to_cart($fix_pack_products['thirty_pack'], 1, null, array('bb_prods'=>$added_str));
		} elseif ($currbox_qty == 45) {
			$woocommerce->cart->add_to_cart($fix_pack_products['fortyfive_pack'], 1, null, array('bb_prods'=>$added_str));
		} elseif ($currbox_qty == 60) {
			$woocommerce->cart->add_to_cart($fix_pack_products['sixty_pack'], 1, null, array('bb_prods'=>$added_str));
		}
		

		/*reset pack cart*/	
		unset($_SESSION['bp_pro_info']);
		/*reset user selected pack*/
		unset($_SESSION['usr_sel_pack_qty']);
		/*redirect to shopping bag after adding to cart*/
		wp_redirect(get_permalink('5')); 
		exit;				
	}	
}
/* EOF save pack products */

get_header(); 

$packs = get_packs();

/*if(isset($_POST['addpack_sub']) && isset($_GET['pack-prod'])){
	if($_GET['pack-prod']){
		$pid = $_GET['pack-prod'];
		$pqty = $_POST['ap_qty'];
		$_SESSION['bp_pro_info'][$pid] = array('bpid' => $pid,
											 'bp_qty' => $pqty
										);
	}
}*/

$upd_err = '';
if(isset($_POST['upd_pack'])){
	if(isset($_POST['pr_rem'])){
		foreach ($_POST['pr_rem'] as $prkey => $prid) {
			unset($_SESSION['bp_pro_info'][$prid]);
		}
	} elseif (isset($_POST['bp_pr_qty'])){
		$tot_pr_qty = 0;
		foreach ($_POST['bp_pr_qty'] as $pqkey => $pr_qty) {
			$tot_pr_qty += $pr_qty;
		}

		if($tot_pr_qty <= $_SESSION['usr_sel_pack_qty']){
			foreach ($_POST['bp_pr_qty'] as $pqkey => $pr_qty) {
				$_SESSION['bp_pro_info'][$pqkey]['bp_qty'] = $pr_qty;
			}
		} else {
			$upd_err = 'Given quantity exceeded box limit!';
		}	
	}
}


?>

<?php 
if(isset($_GET['bpcat'])){
$pack_products = get_pack_products();
$all_brands = get_brewfinder();
?>
	<div class="category-content bap_category_content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 left-sidebar-wrapper">
                    <div class="left-sidebar">
                        <div class="row">
							<div class="col-md-12 col-sm-12">
                                <nav class="navbar navbar-default" role="navigation">
                                    <div class="container-fluid">
                                      <!-- Brand and toggle get grouped for better mobile display -->
                                      <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                          <span class="sr-only">Toggle navigation</span>
                                          <span class="icon-bar"></span>
                                          <span class="icon-bar"></span>
                                          <span class="icon-bar"></span>
                                        </button>
                                        <span class="navbar-brand">Build a Box by Brew</span>
                                      </div>

                                      <!-- Collect the nav links, forms, and other content for toggling -->
                                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <div class="nav navbar-nav">
											<?php 
											$comm_cats= get_terms( 'product_cat', 
											array(
											   'parent' => 0,
                                    			'exclude' => '19,26,29,44,45',
                                    			'hide_empty' => 0
											) );

											foreach ($comm_cats as $cckey => $comm_cat) {
												$comm_term_link = get_term_link( $comm_cat, 'product_cat' );
											?>
												<div class="category-other">
	                                                <a href="<?php echo $comm_term_link.',pack-products'; ?>"> 
				                                        <?php echo $comm_cat->name; ?>
				                                    </a>
	                                            </div>
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
                <div class="col-md-9 col-sm-12 col-xs-12 right-sidebar-wrapper">
                    <div class="bapcategory_right_bar right-sidebar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="category-breadcumbs">
                                    <ol class="breadcrumb">
                                        <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                                        <li class="active">Build-A-Box</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
						<!-- top bar -->
						<div class="row">
							<div class="col-md-12 bapcategory_top_bar">
								<div class="bapcategory_top_bar_wrapper">
									<div class="row">
										<?php $currpack_qty = get_curr_pack_qty(); ?>
										<div class="col-md-6 col-sm-6 col-xs-12 bapcategory_top_bar_counter">
											<h4 class="pull-left">Build-A-Box:</h4>
											<span class="nmbr pull-left">
												<?php echo $currpack_qty; ?>
											</span>
											<span class="span_of pull-left"> of</span>
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
											<select class="select_bbqty">
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
						if($pack_products){
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="feature-cat-title">
									<p>New Arrivals</p>
								</div>
							</div>
						</div>									
						<div class="row">
							<div class="col-md-12">
								<div class="slider-responsive feature-cat-items bapcategory_slider">
									<?php 
									foreach ($pack_products as $ppkey => $pack_arrivl) {
									?>
									<div class="thumbnail col-md-2">
										<a href="<?php echo get_permalink($pack_arrivl->ID); ?>" title="">
											<?php echo get_the_post_thumbnail($pack_arrivl->ID,'pack_prod_arriv');?>
										</a>
										<div class="caption">
											<p class="product-name">
												<a href="<?php echo get_permalink($pack_arrivl->ID); ?>" title="">
													<?php echo get_the_title($pack_arrivl->ID); ?>
												</a>
											</p>												
											<div class="product-input-wrap">
												<!-- <form method="post" action="<?php //echo get_permalink('101')."&pack-prod=".$pack_arrivl->ID.'&curr_pack=show'; ?>">
													<input class="input-number product-qty" type="text" name="ap_qty" value="1">
													<button class="btn btn-default btn-success btn-checkout btn-small" type="submit" name="addpack_sub" value="Add">Add</button>
												</form> -->
												<input class="input-number product-qty ap_qty_<?php echo $pack_arrivl->ID; ?>" type="text" name="ap_qty" value="1">
												<a rel="<?php echo $pack_arrivl->ID; ?>" href="<?php echo get_permalink('101')."&pack-prod=".$pack_arrivl->ID."&addtopack=y"; ?>" class="btn btn-default btn-success btn-checkout btn-small addpack_sub">Add</a>
											</div>												
										</div>										
									</div>											
									<?php 
									}
									?>
								</div>										
							</div>
						</div>
						<?php 
						}
						?>

						<?php 
						if($all_brands){
						?>
							<div class="row">
								<div class="col-md-12">
									<div class="bapcategory_brands_title">
										<h3>OneCup.com Brands</h3>
									</div>
								</div>
							</div>	


							<div class="row">
								<?php 
								foreach ($all_brands as $abkey => $brand) {
								?>
									<div class="col-md-3 col-sm-3 col-xs-6 bapcategory_brands">
										<a href="<?php echo get_term_link( $brand, 'product_cat' );?>">
											<?php 
	                                    	$br_cat_thumbnail_id = get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true );
									        $br_cat_image = wp_get_attachment_url( $br_cat_thumbnail_id );
									        if ( $br_cat_image ) {
									            echo '<img src="' . $br_cat_image . '" alt="" />';
									        }
	                                    ?>
										</a>
									</div>

									<?php 
	                        		if(($abkey+1) % 4 == 0){
								    ?>
								        </div>
								        <div class="row">
				                    <?php
				                    }
				                    ?>

								<?php 
								}
								?>
							</div>
						<?php 
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
} elseif(isset($_GET['curr_pack'])) {
$tot_pk_qty = 0;
$pack_items = $_SESSION['bp_pro_info'];
?>

	<div class="category-content bap_category_content bap_view_category_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<div class="category-breadcumbs">
						 <ol class="breadcrumb">
							<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
							<li class="active">Build-A-Box</li>
						 </ol>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<div class="bapcategory_top_bar_wrapper bapcategory_top_bar_viewpack">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 bapcategory_top_bar_counter">
								<h4 class="pull-left">Build-A-Box:</h4>
								<span class="nmbr pull-left"><?php echo get_curr_pack_qty(); ?></span>
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
								<select class="select_bbqty">
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
						</div>
					</div>	
				</div>
			</div>

			
            <!-- <div class="row bap-viewpack-row">
				<div class="col-md-4 col-sm-4 col-xs-12 bap-viewpack-col12">
					<div class="price12">
						<img class="img-responsive" src="<?php //bloginfo('template_url'); ?>/images/buildapack-12.png" alt="" />
						<h2>$15 ($1.25/cup)</h2>
					</div>
					<ol class="cups">
						<li class="cup cup12">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
					</ol>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 bap-viewpack-col24">
					<div class="price24">
						<img class="img-responsive" src="images/buildapack-24.png" alt="" />
						<h2>$24 (save 20%)</h2>
					</div>
					<ol class="cups">
						<li class="cup cup24">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
					</ol>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 bap-viewpack-col30">
					<div class="price30">
						<img class="img-responsive" src="images/buildapack-30.png" alt="" />
						<h2>$28 (save 25%)</h2>
					</div>
					<ol class="cups">
						<li class="cup cup30">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
						<li class="cup">Empty Cup</li>
					</ol>
				</div>							
            </div> -->

            <div class="row bap-viewpack-row">
				<?php 
                if($packs){
	            	foreach ($packs as $pkey => $pack) {
	            	$packqty = get_post_meta($pack->ID, 'pack_qty', true );
	            	$pack_product = new WC_Product($pack->ID);
	            	?>
						<div class="col-md-4 col-sm-4 col-xs-12 bap-viewpack-col<?php echo $packqty; ?>">
							<div class="price<?php echo $packqty; ?>">
								<?php 
								$attachment_ids = $pack_product->get_gallery_attachment_ids();
            					if ($attachment_ids) {
            						$pack_image_link = wp_get_attachment_url($attachment_ids[0]);
            						?>
            							<!-- <img class="img-responsive" src="<?php //bloginfo('template_url') ?>/images/viewpack_<?php //echo $packqty; ?>.png" alt="" /> -->
            							<img class="img-responsive" src="<?php echo $pack_image_link; ?>" alt="" />
            						<?php
            					}	
								?>
								<h2>
									<?php 
									echo get_woocommerce_currency_symbol().$pack_product->price; 
									?> 
									<?php echo $pack->post_excerpt;?>
								</h2>
								
							</div>
							<div class="viewpack_cups">
								<img src="<?php bloginfo('template_url') ?>/images/black_kup_logo.png" alt="" />
								<h1>
									<span class="viewpack_cups_red">
										<?php 
										
										/*if($packqty == 30 && get_curr_pack_qty() < 31){
											echo get_curr_pack_qty();
										} elseif($packqty == 45 && get_curr_pack_qty() > 30 && get_curr_pack_qty() < 46){
											echo get_curr_pack_qty();
										} elseif($packqty == 60 && get_curr_pack_qty() > 45) {
											echo get_curr_pack_qty();
										} else {
											echo 0;
										}*/

										if($_SESSION['usr_sel_pack_qty']){
											//echo "saif";
											if($_SESSION['usr_sel_pack_qty'] == 30 && $packqty == 30){
												echo get_curr_pack_qty();
											} elseif($_SESSION['usr_sel_pack_qty'] == 45 && $packqty == 45){
												echo get_curr_pack_qty();
											} elseif($_SESSION['usr_sel_pack_qty'] == 60 && $packqty == 60) {
												echo get_curr_pack_qty();
											} else {
												echo 0;
											}
										} else {
											echo 0;
										}	
										?>
									</span> of 
									<span><?php echo $packqty; ?></span>
								</h1>
								<h3>Cups Chosen</h3>
								<p>You may Chose 
									<span class="viewpack_cups_red">
										<?php 
										/*if($packqty == 30 && get_curr_pack_qty() < 31){
											echo ($packqty - get_curr_pack_qty());
										} elseif($packqty == 45 && get_curr_pack_qty() > 30 && get_curr_pack_qty() < 46){
											echo ($packqty - get_curr_pack_qty());
										} elseif($packqty == 60 && get_curr_pack_qty() > 45) {
											echo ($packqty - get_curr_pack_qty());
										} else {
											echo 0;
										}*/

										if($_SESSION['usr_sel_pack_qty']){
											if($packqty == 30 && $_SESSION['usr_sel_pack_qty'] == 30){
												echo ($packqty - get_curr_pack_qty());
											} elseif($packqty == 45 && $_SESSION['usr_sel_pack_qty'] == 45){
												echo ($packqty - get_curr_pack_qty());
											} elseif($packqty == 60 && $_SESSION['usr_sel_pack_qty'] == 60) {
												echo ($packqty - get_curr_pack_qty());
											} else {
												echo 0;
											}
										} else {
											echo 0;
										}	
										?>
									</span> more
								</p>	
							</div>
						</div>
					<?php 
					}
				}	
				?>
            </div>	

            <?php 
            if(!empty($upd_err)){
            ?>
            	<div class="row">
            		<p class="error" style="margin: 0 15px 10px">
            			<?php echo $upd_err; ?>
            		</p>
            	</div>
            <?php
            }
            ?>

            <?php/*  ?>
			<div class="row product_info_bar">
				<div class="col-md-12">
					<div class="productinfo">
						<span class="pro_info">Product Information</span>
						<span class="pull-right rem_info">Remove</span>
						<span class="pull-right quant_info">Quantity</span>
					</div>
				</div>
			</div>

			<form action="<?php echo get_permalink('101'); ?>&curr_pack=show" method="post">
				<div class="row">
					<div class="col-md-12">

						<?php
						foreach ($pack_items as $pk_key => $pack) {
							$pack_prod = get_post($pack['bpid']); 
							?>

							<div class="productinfo_Quant">
								<div class="row">
									<div class="col-md-7 col-sm-6 col-xs-12 Kau_coffee">
										<p>
											<a href="<?php echo get_permalink($pack_prod->ID); ?>">
												<?php echo $pack_prod->post_title; ?>
											</a>
										</p>
									</div>
									<div class="col-md-5 col-sm-6 col-xs-12 update_shopping">
										<input class="product-qty pull-left" type="text" name="bp_pr_qty[<?php echo $pack['bpid']; ?>]" value="<?php echo $pack['bp_qty']; ?>">
										<div class="remove-from-cart pull-right">
											<input type="checkbox" name="pr_rem[]" value="<?php echo $pack['bpid']; ?>">
										</div>
									</div>
								</div>
							</div>
							<?php
							$tot_pk_qty += $pack['bp_qty'];
						}
						?>

					</div>
				</div>
				
				
				

				<div class="row order-summary-content">
					<div class="col-md-7">
						<a class="btn btn-info btn-lg" href="<?php echo get_permalink('101').'&bpcat=y' ?>"> Continue Shopping</a>
					</div>
					<div class="col-md-5">
						<!-- <a href="">Update shopping cart</a> -->
						<input type="submit" name="upd_pack" value="Update Pack Cart">

						<!-- <button class="btn btn-default btn-lg pull-right" type="submit"> Save Pack</button> -->
						<?php 
						//echo do_shortcode('[add_to_cart_url id="42"]');
						if($tot_pk_qty == 30 || $tot_pk_qty == 45 || $tot_pk_qty == 60){
						?>
							<a class="btn btn-default btn-lg pull-right" href="<?php echo get_permalink('101')."&save_pack=y"; ?>">Save Box</a>
						<?php
						} else {
						?>
							<a class="btn btn-default btn-lg pull-right" href="javascript:void(0)">Save Box</a>
						<?php
						}
						?>

						<!-- <a href="#">Reset Pack</a> -->
					</div>
				</div>
			</form>

			<?php */ ?>

			<?php 
			if($pack_items){
			?>
			<form action="<?php echo get_permalink('101'); ?>&curr_pack=show" method="post">
				<div class="row product_info_bar">
				    <div class="col-md-12">
				        <div class="viewpack_items">
				            <table class="table table-hover">
				                <thead>
				                    <tr>
				                        <th class="th_col_1">Product Information</th>
				                        <th class="th_col_2">Quantity</th>
				                        <th class="th_col_3">Remove</th>
				                    </tr>
				                </thead>
				                <tbody>
				                    <?php
									foreach ($pack_items as $pk_key => $pack) {
									$pack_prod = get_post($pack['bpid']); 
									?>
				                    <tr>
				                        <td class="col-md-6 col-sm-6 col-xs-5 viewpack_thumb">
				                            <div class="media">
				                                <!-- <a class="thumbnail pull-left" href="<?php //echo get_permalink($pack_prod->ID); ?>">
													<img class="media-object" src="images/kau-coffee-mill-single-cups-12ct_300.png"/>
												</a> -->
				                                
				                                <div class="media-body">
				                                    <h4 class="media-heading">
				                                    	<a href="<?php echo get_permalink($pack_prod->ID); ?>">
															<?php echo $pack_prod->post_title; ?>
														</a>
				                                    </h4>
				                                </div>
				                            </div>
				                        </td>
				                        <td class="col-md-3 col-sm-3 col-xs-4 viewpack_input" style="text-align: center">
				                            <input class="form-control input-csize" type="text" name="bp_pr_qty[<?php echo $pack['bpid']; ?>]" value="<?php echo $pack['bp_qty']; ?>">
				                        </td>
				                        <td class="col-md-3 col-sm-3 col-xs-3  viewpack_chk" style="text-align: center">
				                            <div class="checkbox">
				                            	<input type="checkbox" name="pr_rem[]" value="<?php echo $pack['bpid']; ?>">
				                            </div>
				                        </td>
				                    </tr>
				                    <?php
										$tot_pk_qty += $pack['bp_qty'];
									}
									?>
				                </tbody>
				            </table>
				        </div>
				    </div>
				</div>

				<div class="update_shop_cart">
					<input type="submit" name="upd_pack" value="Update Box Cart">
				</div>

				<div class="row order-summary-content">
			        <div class="col-md-7 col-sm-7 col-xs-5">
			        	<a class="btn btn-info btn-lg" href="<?php echo get_permalink('101').'&bpcat=y' ?>"> Continue Shopping</a>
			        </div>
			       	<div class="col-md-5 col-sm-5 col-xs-7">
			        	
			        	<?php 
						//echo do_shortcode('[add_to_cart_url id="42"]');
						if($tot_pk_qty == 30 || $tot_pk_qty == 45 || $tot_pk_qty == 60){
						?>
							<a class="btn btn-default btn-lg pull-right sv_pack sv_enabled" href="<?php echo get_permalink('101')."&save_pack=y"; ?>">Save Box</a>
						<?php
						} else {
						?>
							<a class="btn btn-default btn-lg pull-right sv_pack sv_disabled" href="javascript:void(0)">Save Box</a>
						<?php
						}
						?>
						<a href="<?php echo get_permalink('101')."&reset_box=y&curr_pack=show"; ?>">Reset Box</a>
			       	</div>
			    </div>
			</form>

			<?php 
			} else {
			?>
				<div class="row">
            		<p style="margin: 0 15px 10px">
            			Your box is empty!
            		</p>
            		<p style="margin: 0 15px 10px">
            			<a class="btn btn-info btn-lg" href="<?php echo get_permalink('101').'&bpcat=y' ?>"> Continue Shopping</a>
            		</p>
            	</div>
			<?php
			}
			?>
        </div>
    </div>


<?php
} else {	
?>
	<div class="buildapack_wrapper">
        <div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="category-breadcumbs">
                        <ol class="breadcrumb">
                            <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                            <li class="active">Build A Box</li>
                        </ol>
                    </div>
                </div>
            </div>

            <?php 
            while ( have_posts() ) : the_post(); 
            $bap_image_link = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            ?>
            <div class="row bap-banner-row">
				<div class="col-md-12 bap-banner" style="background:url('<?php echo $bap_image_link; ?>') no-repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0);">
					<h1 class="page-title">
						<?php the_title(); ?>
					</h1>

					<?php the_content(); ?>
				</div>
            </div>
            <?php endwhile; ?>	
			

            <div class="row bap-pack-row">
                <?php 
                if($packs){
                	$pack_image_link = '';
                	foreach ($packs as $pkey => $pack) {
                	$packqty = get_post_meta($pack->ID, 'pack_qty', true );
 					$pack_product = new WC_Product($pack->ID);

					$attachment_ids = $pack_product->get_gallery_attachment_ids();
					if ($attachment_ids) {
						$pack_image_link = wp_get_attachment_url($attachment_ids[0]);
					}	

                	?>
	                <div class="col-md-4 col-sm-4 col-xs-12 bap-pack-col<?php echo $packqty; ?>">
	                    <div class="bap-pack-item pack-<?php echo $packqty; ?>">
							<h2 class="pack-title" style="background-image:url('<?php echo $pack_image_link; ?>')">
								<?php echo $packqty; ?> Box
							</h2>
							<p class="price"> 
								<?php 
								echo get_woocommerce_currency_symbol().$pack_product->price; 
								?>
							</p>
							<?php 
							echo $pack->post_excerpt;
							?>								
							<p>
								<a href="<?php echo get_permalink('101')."&bpcat=y&cpack=".$packqty; ?>" class="btn btn-info btn-lg" role="button">
									Get Started
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
<?php
}
?>



		
				
				

<?php 
/*echo "<pre>";
print_r($_SESSION['bp_pro_info']);
echo "</pre>";*/
get_footer(); 
?>