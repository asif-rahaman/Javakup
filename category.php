<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="blog-content">
                    <div class="container">
                        <div class="row">
<?php if ( have_posts() ) : ?>

                            <div class="col-md-3">
                                <div class="left-sidebar">
                                    <div class="row">
                                        <div class="col-md-12">                                        
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
                                                    <span class="navbar-brand">Blog archive</span>
                                                  </div>

                                                  <!-- Collect the nav links, forms, and other content for toggling -->
                                                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                    <div class="nav navbar-nav">
                        														<div class="category-other">
                                                      <?php wp_get_archives( array( 'type' => 'yearly') ); ?>
                                              <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
                                                                                </div>
                                                    </div>
                                                  </div><!-- /.navbar-collapse -->
                                                </div><!-- /.container-fluid -->
                                              </nav>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">                                        
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
                                                    <span class="navbar-brand">Popular blog tags</span>
                                                  </div>

                                                  <!-- Collect the nav links, forms, and other content for toggling -->
                                              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                <div class="nav navbar-nav">
                                                  <?php wp_tag_cloud('format=list'); ?>
                                                </div>
                                                  </div><!-- /.navbar-collapse -->
                                                </div><!-- /.container-fluid -->
                                              </nav>
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
											<div class="blog-heading">
                                                <h1><?php printf( __( 'Category : %s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>
                                            </div>
										</div>
									</div>
				<?php while ( have_posts() ) : the_post(); ?>
                                    
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="blog-items">
                                                <div class="blog-item-header">
													<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
													<span><?php the_weekday(); echo ", "; echo get_the_date();?></span>
												</div>
												<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
											<div class="entry-thumbnail blgthumb">
												<?php the_post_thumbnail(); ?>
											</div>
											<?php endif; ?>
												<div class="blog-item-body">
													<?php the_content(); ?>
												</div>
												<div class="blog-item-tags">
													<p>
														<span>Tags</span>
														<?php 
														$ptags = get_the_tags($post->ID);
														if($ptags){
															foreach ( $ptags as $ptag ) {
																$ptag_link = get_tag_link( $ptag->term_id );
															?>
																<a href='<?php echo $ptag_link;?>' title='<?php echo $ptag->name;?> Tag' class='btn btn-sm trm'>
																	<?php echo $ptag->name;?>
																</a>
															<?php
															}
														}
														?>
													</p>														
												</div>
												<div class="blog-item-comments">
													<p><a href="<?php echo get_permalink(); ?>" title=""><?php comments_number(); ?></a></p>
												</div>
                                            </div>
                                        </div>
                                    </div>
									
                            <?php endwhile; ?>
                                    <div class="row">
                                        <div class="col-md-12 pull-right">
                                            <div class="blog-pagination pull-right">
                                                <?php twentythirteen_paging_nav(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        




<?php else : ?>
<?php get_template_part( 'content', 'none' ); ?>

						
<?php endif; ?>

					</div>
            </div>
        </div>

		

		

<?php //get_sidebar(); ?>
<?php get_footer(); ?>