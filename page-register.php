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

 ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="register-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="category-breadcumbs">
                                    <ol class="breadcrumb">
                                      <?php woocommerce_breadcrumb(); ?>  
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="register-title">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-md-9">
								<?php echo do_shortcode('[register role="subscriber" message="Thanks for registering!!" notify="asd@asd.com" password="yes" fields="s_male,s_female,first_name,last_name,birth_date,company_details,newsletter_sub"]'); ?>
							</div>
						</div>
                        
                    </div>
                </div>
				

		
						
				

					
				<?php //comments_template(); ?>
			<?php endwhile; ?>



<?php// get_sidebar(); get_terms ?>
<?php get_footer(); ?>