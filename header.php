<?php
if(is_user_logged_in()&&is_page(161)){
  wp_redirect(get_permalink(7));
    exit();
}
/**
* The Header template for our theme
*
* Displays all of the <head> section and everything up till <div id="main">
*
* @package WordPress
* @subpackage Twenty_Thirteen
* @since Twenty Thirteen 1.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" type="image/ico"  href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico?v=2">
<!--[if IE]>
    <link href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<![endif]-->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/social-buttons.css">

<!-- Overwritten style of Bootstrap & custom styles -->
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.less.css">

<!-- CSS for carousel -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/slick.css"/>
<!--CSS for Fonts-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/fonts/stylesheet.css"/>
  
<!-- CSS for dropdown menu -->
<link href="<?php bloginfo( 'template_url' ); ?>/css/yamm.css" rel="stylesheet">
<link href="<?php bloginfo( 'template_url' ); ?>/css/jcarousel.responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' ); ?>/css/custom.css" rel="stylesheet">
<link href="<?php bloginfo( 'template_url' ); ?>/css/custom_javakup.css" rel="stylesheet">
<link href="<?php bloginfo( 'template_url' ); ?>/css/responsive.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
 
<?php wp_head();
global $woocommerce;
 ?>

</head>

<body <?php body_class(); ?>>
<div class="body-wd">
<!-- <header> -->

      <div class="header">

          <div class="header-top">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 col-sm-12">
                          <div class="header-icon"></div>
                          <div class="header-shipping text-left">
                            <?php echo get_field('promo_product', '2'); ?> <a href="<?php echo get_field('promo_link', '2'); ?>">Learn More ></a></strong>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <p class="header-member text-right pull-right">
                            <strong>
                              <?php 
                              if (is_user_logged_in()) {
                                global $current_user;
                                get_currentuserinfo();
                                echo 'Welcome! '; 
                                echo '<a href="'.get_permalink('7').'">' . $current_user->display_name . "</a>";
                                printf(
                                __( ' / <a href="%2$s"> Sign out</a>', 'woocommerce' ) . ' ',
                                $current_user->display_name,
                                wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
                              );
                              } else {
                              ?>
                                <a href="<?php echo get_permalink('152'); ?>">join the club</a> | 
                                <a href="<?php echo get_permalink('161'); ?>">already a member? (sign in)</a>
                              <?php      
                              }
                              ?>
                              
                            </strong>
                          </p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="header-middle">
              <div class="container">
                  <div class="row">
                      <div class="col-md-2 col-sm-2 col-xs-2">
                          <a class="img-responsive header-logo" href="<?php bloginfo('url'); ?>" title="">
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/milk_kup.png" alt="" />
                          </a>
                      </div>
                      <div class="col-md-6 col-sm-10 col-xs-10">
                          <p class="header-tag-line text-left"><strong><?php echo get_field('ft_tg_ln', '2'); ?></strong></p>
                      </div>
					  <div class="col-md-4 col-sm-12 col-xs-12">                                
                          <div class="pull-right"><a href="<?php echo get_permalink(6);  ?>" class="btn btn-default btn-success btn-checkout btn-lg">CHECKOUT</a></div>
                          <!-- #put a tag -->
                          <?php global $woocommerce; ?>
                          <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                              <div class="well-sm pull-right" id="shopping-cart">
                                  <span class="glyphicon glyphicon-shopping-cart"></span> SHOPPING CART (<?php 
                                    echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>)
                              </div>
                          </a>  
                                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> SHOPPING CART (0)</a>-->
                        <div id="shopping-cart-container" class="flyout-shopping-cart">
                          <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                              $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                              $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                              if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                ?>

                  <!--<p>You have no items in your shopping bag. </p>-->
                              <div class="flyout-cart-items">
                                <div class="row">
                                  <div class="col-md-4">
                                    <a href="product-details.html" title="">
                                      <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( ! $_product->is_visible() )
                                          echo $thumbnail;
                                        else
                                          printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
                                      ?>
                                    </a>
                                  </div>
                                  <div class="col-md-8">
                                    <p class="product-name">
                                      <?php
              if ( ! $_product->is_visible() )
                echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
              else
                echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

              // Meta data
              echo WC()->cart->get_item_data( $cart_item );

                      // Backorder notification
                      if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
                        echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
            ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                      
                              
                                 <?php }} ?>  
                                 <div class="flyout-cart-item-counter">
                                <div class="row">
                                  <div class="col-md-12">
                                    <p>There are <a href="<?php echo get_permalink(5);  ?>" title=""><?php 
                                    echo sprintf(_n('%d ', '%d ', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> item(s)</a> in your shopping bag. </p>
                                  </div>
                                </div>
                              </div>  <?php if ($woocommerce->cart->cart_contents_count > 0){ ?>
                                 <div class="flyout-cart-buttons">
                                  <div class="row">
                                  <div class="col-md-12">
                                    <p>
                                      <a href="<?php echo get_permalink(5);  ?>" class="pull-left btn btn-default btn-lg" title="">shopping bag</a>
                                      <a href="<?php echo get_permalink(6);  ?>" class="pull-right btn btn-default btn-lg checkout" title="">checkout</a>
                                    </p>
                                  </div>
                                  </div>
                                </div>   
                                <?php } ?>        
                </div> 
                                
            </div>
                        </div>
                  </div>
              </div>
          

          <div class="header-menu">
              <div class="container">                        
                  <div class="header-menu-container">
                      <div class="row">
                          <div class="col-md-2 menu-border-right">
              
                             
                              <?php 
                              if($_SESSION['usr_sel_pack_qty']){
                                ?>
                                <a href="<?php echo get_permalink('101') ?>&bpcat=y" title="">
                                 <img src="<?php echo get_field('build_a_box_img', '2');  ?>" alt="Build-A-Box">
                                </a>
                              <?php 
                              } else {
                              ?>
                                <a class="" href="<?php echo get_permalink('101') ?>" title="">
                                 <img src="<?php echo get_field('build_a_box_img', '2');  ?>" alt="Build-A-Box">
                                </a>
                              <?php
                              }
                              ?>
                          </div>
                          <div class="col-md-10">
                              <h3 class="menu-title">shop brews</h3>
                              <!-- Demo navbar -->
                              <div class="navbar yamm navbar-default">
                                  <div class="navbar-header">
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>            
                                  </div>
                                  <div id="navbar-collapse-1" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                    	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Main Nav', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>

                                     <!--  <li class="dropdown">
                                       <a href="category.html" title="" class="dropdown-toggle">Coffee</a>
                                       <ul class="dropdown-menu">
                                         <li>
                                           <a href="">Brand</a>
                                     
                                             <ul class="col-sm-3 list-unstyled">
                                               <li><a href="#"><strong>Brand</strong></a></li>
                                               <li><a href="#">Blackhand Coffee</a></li>
                                               <li><a href="#">Pannikin Coffee & Tea</a></li>
                                               <li><a href="#">Brown Gold</a></li>
                                               <li><a href="#">Coppermoon</a></li>
                                               <li><a href="#">Caffe D'arte</a></li>
                                               <li><a href="#">Jittery Joe's</a></li>
                                             </ul>
                                         </li> 
                                         <li> 
                                           <a href="">Roast</a> 
                                           <ul class="col-sm-3 list-unstyled">
                                             <li>
                                               <a href="#"><strong>Roast</strong></a>
                                             </li>
                                             <li><a href="#">Light</a></li>
                                             <li><a href="#">Medium</a></li>
                                             <li><a href="#">Dark</a></li>
                                             <li><a href="#">Extra Dark</a></li>
                                             <li><a href="#">Espresso</a></li>
                                             <li><a href="#">Decaffinated</a></li>
                                           </ul>
                                         </li>   
                                           
                                       </ul>
                                     </li>
                                     
                                     <li><a href="#">Brew Finder</a></li>
                                     <li><a href="#">On Sale</a></li>
                                     <li><a href="#">New Arrivals</a></li>
                                     <li><a href="#">About</a></li> -->
                                    </ul>
                                      <ul class="nav navbar-nav navbar-right">
                                          <li class="dropdown search-btn">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search <span class="glyphicon glyphicon-search"></span></a>                                                
                                            <div class="dropdown-menu" id="custom-search-input">
                                                  <div class="input-group">
                                                    <?php //get_product_search_form(); ?>
                                                    <form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                                                     
                                                        
                                                        <input type="text" class="search-query form-control input-csize" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search for Product', 'woocommerce' ); ?>" />
                                                       
                                                          <span class="input-group-btn">
                                                              <button class="btn btn-danger" type="submit" id="searchsubmit">
                                                                  <span class="glyphicon glyphicon-search"></span>
                                                              </button>
                                                          </span>
                                                        <input type="hidden" name="post_type" value="product" />
                                                      
                                                    </form>
                                                      <!-- <input type="text" class="search-query form-control input-csize" placeholder="Search" />
                                                      <span class="input-group-btn">
                                                          <button class="btn btn-danger" type="button">
                                                              <span class="glyphicon glyphicon-search"></span>
                                                          </button> 
                                                      </span> -->
                                                  </div>
                                              </div>
                                          </li>
                                      </ul>
                                  </div>                                      
                              </div>
                          </div>
                      </div>
                  </div>                        
              </div>
          </div>
      </div>

      
      <!-- <End of header> -->

<div class="main-content">
