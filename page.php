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
$sidenav=get_sidenav();
?>
	<!-- <div class="container">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main"> -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="category-content bap_category_content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12 left-sidebar-wrapper">
                              <?php  if (!is_page(161)){ ?>
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
                                                    <span class="navbar-brand"></span>
                                                  </div>
                                                  <!-- Collect the nav links, forms, and other content for toggling -->
                                                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                    <div class="nav navbar-nav">
                                                        <?php /*wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Side Nav 1', 'container' => false, 'items_wrap' => '%3$s' ) ); */?>
                                                        <?php foreach ($sidenav as $snkey => $snvalue) {?>

                                                                <div class="category-other">
                                                                    <a href="<?php echo get_permalink($snvalue->ID); ?>" title=""><?php echo get_the_title($snvalue->ID); ?></a>
                                                                </div>
                                                                <!-- <div class="category-other">
                                                                    <a href="#" title="">Account</a>
                                                                </div> -->
                                                               <?php } ?> 
                                                               
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
                            </div> <?php } ?>
                            <div class="col-md-9 col-sm-12 col-xs-12 right-sidebar-wrapper">
                                <div class="about_right_bar">
                                	<?php  if (!is_page(161)){ ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php woocommerce_breadcrumb(); ?>
                                        </div>
                                    </div>
                                     <?php } ?>
									<div class="row">
										<div class="col-md-12">
											<?php  if (!is_page(161)){ ?><h1>
											<?php the_title();?></h1>
											 <?php } ?>
											 <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
											<div class="entry-thumbnail">
												<?php the_post_thumbnail(); ?>
											</div>
											<?php endif; ?>
											<?php the_content(); ?>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				<?php //comments_template(); ?>
			<?php endwhile; ?>

<!-- 		</div>#content
	</div>#primary
	</div> -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>