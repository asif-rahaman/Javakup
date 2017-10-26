<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>



			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="blog-details-content">
                    <div class="container">
                        <div class="row">
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
                                            <div class="blog-items">
                                                <div class="blog-item-header">
													<h1><?php the_title(); ?></h1>
													<span><?php the_weekday(); echo ", "; the_date();?></span>
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
														$tags = get_the_tags();
														if($tags){
															foreach ( $tags as $tag ) {
																$tag_link = get_tag_link( $tag->term_id );
																		
																$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='btn btn-sm trm'>";
																$html .= "{$tag->name}</a>";

															}
														}
															
															echo $html;
														 ?>
													</p>													
												</div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="details-product-comments">
										<div class="well">
											<div class="row">
												<div class="col-md-12 pull-left">
													<div class="panel panel-primary">
														<div class="panel-heading row">
															<div class="panel-title col-md-5 pull-left">
																<h2>Comments</h2>
															</div>
															<div class="pull-right col-md-3 col-md-offset-4 text-right clickable">															
																<button id="comment" type="submit" class="btn btn-default btn-lg pull-right">write a comment</button>
																<button style="display:none;" id="cancel" type="submit" class="btn btn-default btn-lg pull-right">cancel</button>															
															</div>
														</div>
														<div class="panel-body">
															<div style="display:none;" class="write-comment">
																<form role="form">
																	<label class="control-label">Write a Comment </label>
																	<textarea class="form-control" rows="3"></textarea>
																	<button type="submit" class="btn btn-default btn-lg">new comment</button>
																</form>
															</div>
															<div class="comment-list">

																<?php comments_template(); ?>
																<!-- <p class="user">Guest <span>(Posted on 5/2/2014 4:34 AM)</span></p>
																<p class="user-comment">
																	It's remarkable to pay a quick visit this site and reading the views of all mates about this piece of writing, while I am also zealous of getting experience.
																	home based business http://allhint.com
																</p> -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
										
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				

			<?php endwhile; ?>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>