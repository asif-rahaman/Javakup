<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>

<div class="buildapack_wrapper login_wrapper">
                    <div class="container">
						<div class="row">
                            <div class="col-md-12">
                                <div class="category-breadcumbs">
                                    <?php woocommerce_breadcrumb(); ?>
                                </div>
                            </div>
							<div class="col-md-12">
								<h1 class="login_head">Login</h1>
							</div>
                        </div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="login_frm">
									<h2>Returning Customer </h2>
								<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">
									<?php $template->the_action_template_message( 'login' ); ?>
									<?php $template->the_errors(); ?>
									<form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">
									  <div class="form-group">
										<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username' ); ?></label>
										<input  type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="form-control input" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" placeholder="Username" />
									  </div>
									  <div class="form-group">
										<label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password' ); ?></label>
										<input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input form-control" placeholder="Password" value="" size="20" />
									  </div>
									  <div class="login_checkbox">
									  	<?php do_action( 'login_form' ); ?>

		<p class="forgetmenot">
			<input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
			<label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me' ); ?></label>
		</p>
		<p class="submit">
			<input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In' ); ?>" class="btn btn-default" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="login" />
		</p>

									  </div>
									</form>


								</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 new_reg">
								<div class="new_reg_text">
									<h2>New Customer </h2>
									<p>By creating an account on our website you will be able to shop faster, be up to date on an orders status, and keep track of the orders you have previously made</p>
									<a type="button" class="btn btn-default" href="<?php echo get_permalink(152); ?>">Register</a>
								</div>
							</div>
						</div>						
                    </div>
                </div>


