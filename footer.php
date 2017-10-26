<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		 <!-- Footer -->
            <div class="footer">
                <div class="container">
                    
                    <!-- Footer newsletter -->
                    <div class="row">
                        <div class="col-md-12 footer-newsletter">
                            <div class="footer-newsletter-content pull-left">
                                <div class="col-md-7">
                                    <h3 class="pull-left">Get our newsletter?</h3>
                                    <h4 class="pull-left">Discounts, special offers, & more!</h4>
                                </div>
                                <div class="col-md-5">
                                    <div class="widget_wysija_cont html_wysija pull-right"><div id="msg-form-wysija-html5372dfb4049cc-1" class="wysija-msg ajax"></div><form id="form-wysija-html5372dfb4049cc-1" method="post" action="#wysija" class="widget_wysija html_wysija">
                                               <p class="wysija-paragraph">
                                                  <!--  <label>Email <span class="wysija-required">*</span></label> -->
                                                   
                                                       <input type="text" name="wysija[user][email]" class="wysija-input validate[required,custom[email]] form-control input-csize" title="Email"  value="" placeholder="Enter Email" />
                                                   
                                                   
                                                   
                                                   <span class="abs-req">
                                                       <input type="text" name="wysija[user][abs][email]" class="wysija-input validated[abs][email]" value="" />
                                                   </span>
                                                   
                                               
                                               <input class="wysija-submit wysija-submit-field btn btn-default btn-lg" type="submit" value="Subscribe" />
                                               </p>
                                               
                                                   <input type="hidden" name="form_id" value="1" />
                                                   <input type="hidden" name="action" value="save" />
                                                   <input type="hidden" name="controller" value="subscribers" />
                                                   <input type="hidden" value="1" name="wysija-page" />
                                               
                                                   
                                                       <input type="hidden" name="wysija[user_list][list_ids]" value="1" />
                                                   
                                                </form></div>
                                    <!-- <form class="form-inline pull-right" role="form">
                                        <div class="form-group">
                                          <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                          <input type="email" class="form-control input-csize" id="exampleInputEmail2" placeholder="Enter email">
                                        </div>
                                        <button type="submit" class="btn btn-default btn-lg">subscribe</button>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer newsletter -->
                    
                    <!-- Footer menu -->
                    <div class="footer-menu">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-4 menu-border-right">
                                <ul class="list-unstyled">
                                    <li class="footer-menu-title"><strong>SHOP BREWS</strong></li>
                                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Footer Menu 1', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <ul class="list-unstyled">
                                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Footer Menu 2', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <ul class="list-unstyled">
                                     <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Footer Menu 3', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <ul class="blog-news list-unstyled">
                                    <li class="blog-link">
                                        <a href="<?php bloginfo('url'); ?>/?cat=1">The Brew Blog</a>
                                    </li>
                                    <?php 
                                    $curr_posts = get_lat_posts();
                                    if($curr_posts){
                                        foreach ($curr_posts as $cpkey => $cpost) {
                                        ?>
                                        <li>
                                            <a href="<?php echo get_permalink($cpost->ID); ?>">
                                                <?php echo get_the_title($cpost->ID); ?>
                                            </a>
                                        </li>
                                        <?php 
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-2 col-xs-12 pull-right">
                                <ul class="socials list-unstyled">
                                    <li>
                                        <a href="<?php echo get_field('con_fb', '204'); ?>" target="_blank">
                                            <img src="<?php bloginfo('template_url'); ?>/images/facebookbutton.png" alt="facebook" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_field('con_twit', '204'); ?>" target="_blank">
                                            <img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="twitter" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_field('con_pin', '204'); ?>" target="_blank">
                                            <img src="<?php bloginfo('template_url'); ?>/images/pinterest-logo.png" alt="pinterest">
                                        </a>
                                    </li>
                                    <li>
                                        
                                            <img src="<?php bloginfo('template_url'); ?>/images/paypal_f.png" alt="pinterest">
                                       
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                    
                    <!-- /Footer menu -->
                    
                    <!-- Footer copyright -->
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="footer-copyright">
                                <p class="text-center">
                                    ©2014 Javakup.com™ | <a href="<?php echo get_permalink(215); ?>">Terms of Use</a> | <a href="<?php echo get_permalink(217); ?>">Privacy Policy</a> <br><br>
                                </p>
                            </div>                            
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <!-- /Footer copyright -->
                    
                </div>
            </div>
            <!-- /Footer -->            
            
        </div>
    </div>
    
    <div class="pp_notify"></div> 

    <div id="basic-modal-content" class="">
        <h2>Name Your Box</h2>
        <p class="form-row form-row-wide">
            <input type="text" value="" placeholder="Enter Box Name" name="usr_box_name" class="usrbox">
        </p>    
        <button class="box_save">Save</button>
        <a href="#" class="canc_bname">Cancel</a>
        <p class="error"></p>
    </div> 
        
        
        <script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.8.3.min.js"></script> <!-- jQuery plugin -->
        <script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.min.js"></script> <!-- Bootstrap plugin -->
        <script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/js/carousel.js"></script> <!-- Bootstrap Carousel plugin -->
        <script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/js/tab.js"></script> <!-- Bootstrap Tab plugin -->
        <script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/js/collapse.js"></script> <!-- Bootstrap Collapse plugin -->
		
        <script type="text/javascript">
         jQuery(document).ready(function() {
            /* changing DOM for top nav*/
            //alert(1);
            jQuery('.navbar .nav > li.menu-item-has-children').addClass('dropdown');
            jQuery('.navbar .nav > li.menu-item-has-children > a').addClass('dropdown-toggle');
            jQuery('.navbar .nav > li > ul.sub-menu').addClass('dropdown-menu');
            jQuery('.navbar .nav > li ul.sub-menu > li ul.sub-menu').addClass('col-sm-3 list-unstyled');
			 
			/* adding dropdown caret for mobile/tab devices only */
			var drp_caret = '<a class="mob_dropdown dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>';
			jQuery('.navbar .nav > li.menu-item-has-children > a').after(drp_caret);

            jQuery('ul.navbar-nav li.menu-item-object-product_cat.menu-item-has-children ul.sub-menu li ul.list-unstyled li').each(
            function(){
                var built_link = '';
                var curr_item_href = jQuery(this).find('a').attr('href');
                var par_item_href = jQuery(this).parent('ul.list-unstyled').parent('li').parent('ul.dropdown-menu').parent('li.menu-item-object-product_cat').find('a').attr('href');
                //console.log(par_item_href);
                var attr_str_parts = curr_item_href.split('?');
                //alert(attr_str[1]);

                var attr_inner = attr_str_parts[1].split('=');
                if(attr_inner[0] == 'product_cat'){
                    built_link = par_item_href+','+attr_inner[1];
                } else {
                    built_link = par_item_href+'&'+attr_str_parts[1];
                }
                
                jQuery(this).find('a').attr('href', built_link);
            });

            /* add to pack ajax call */
            jQuery('.addpack_sub').click('click', function (event) {
                var pid = jQuery(this).attr('rel');
                var pqty = jQuery('.ap_qty_'+pid).val();
                var anchor_href = jQuery(this).attr('href')+'&ppqty='+pqty;

                jQuery.ajax({
                    url:anchor_href,
                    dataType:"html", 
                    success:function (data, textStatus) {
                        var old_num = parseInt(jQuery.trim(jQuery('.bapcategory_top_bar_counter .nmbr').text()));
                        var new_num = parseInt(old_num+parseInt(jQuery.trim(pqty)));
                        //alert(new_num);
                        if(data != 'Given quantity exceeded box limit!'){
                            jQuery('.bapcategory_top_bar_counter .nmbr').text(new_num);
                        }

                        if(new_num == 30 || new_num == 45 || new_num == 60){
                            var savepack_link = "<?php echo get_permalink('101').'&save_pack=y'; ?>";
                            if(jQuery('.bapcategory_top_bar_btn .viewpack_btn_wrap .btn.btn-success.btn-lg.sv_pack').hasClass('sv_disabled')){
                                jQuery('.bapcategory_top_bar_btn .viewpack_btn_wrap .btn.btn-success.btn-lg.sv_pack').removeClass('sv_disabled');
                                jQuery('.bapcategory_top_bar_btn .viewpack_btn_wrap .btn.btn-success.btn-lg.sv_pack').addClass('sv_enabled');
                                jQuery('.bapcategory_top_bar_btn .viewpack_btn_wrap .btn.btn-success.btn-lg.sv_pack').attr('href', savepack_link);
                            }
                        }
                        jQuery('.pp_notify').html(data).show();
                        jQuery('.pp_notify').show().delay(2000).fadeOut(400);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        //console.log(jqXHR);
                        jQuery('.pp_notify').html('Error! '+errorThrown).show();
                    } 
                });

                return false;
            });

            /* start over box ajax call*/
            jQuery('.start_over_btn').click(function (event) {
                var tar_href = jQuery(this).attr('href');
                jQuery.ajax({
                    url:tar_href,
                    dataType:"html", 
                    success:function (data, textStatus) {
                        if(data){
                            jQuery('.bapcategory_top_bar_counter .nmbr').text(data);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        //console.log(jqXHR);
                        jQuery('.pp_notify').html('Error! '+errorThrown).show();
                    } 
                });
                return false;
            });
         });
        </script>

        <script type="text/javascript">
            $(function(){
                
                $('#myTab a').click(function (e) {
                    e.preventDefault()
                    $(this).tab('show')
                });

                $('#new-arrivals-carousel').carousel({
                    interval: false,
                    pause: "hover"
                });
				
				$('#carousel-example-generic').carousel({
                    interval: 5000,
                    pause: "hover"
                });
				
                $('.slider-responsive').slick({
                  dots: false,
                  infinite: false,
                  speed: 300,
                  arrows: true,
                  slidesToShow: 5,
                  slidesToScroll: 1,
                  responsive: [
                        {
                          breakpoint: 1024,
                          settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                          }
                        },
                        {
                          breakpoint: 600,
                          settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                          }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                          }
                        }
                  ]
                });
				
				$("#shopping-cart").hover(function () {
					$("#shopping-cart-container").css("visibility","visible");					
				  },
				  function () {
					$("#shopping-cart-container").css("visibility","hidden");					
				  });
				  $("#shopping-cart-container").hover(function () {
					$("#shopping-cart-container").css("visibility","visible");					
				  },
				  function () {
					$("#shopping-cart-container").css("visibility","hidden");					
				  });

                $('#imageWrap').show();
                $('.thumbnail-img').live("click", function() {
                    $('#mainImage').hide();
                    $('#imageWrap').css('background-image', "url('ajax-loader.gif')");
                    var i = $('<img />').attr('src',this.href).load(function() {
                        //$( "#mainImage" ).addClass( "img-zoom" );
                        $('#mainImage').attr('src', i.attr('src'));
                        $('.loupe img').attr('src',  i.attr('src'));
                        $('#imageWrap').css('background-image', 'none');
                        $('#mainImage').fadeIn();
                    });
                    return false; 
                });  
				  
            });
                
                /*Single prodct page*/
                
                $(document).on('click', '.panel-heading div.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $('#cancel').css('display', 'none');
                $('#review').css('display', 'block');
                //$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $('#cancel').css('display', 'block');
                $('#review').css('display', 'none');
                //$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
        });
        $(document).ready(function () {
            $('.panel-heading span.clickable').click();
            $('.panel div.clickable').click();
        });
        </script>
		
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/slick.min.js"></script>
        
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css"></script>
        <script>
          $(function() {
            window.prettyPrint && prettyPrint()
            $(document).on('click', '.yamm .dropdown-menu', function(e) {
              e.stopPropagation()
            })
          });
        </script>

        <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.loupe.min.js"></script>
        <script type="text/javascript">$('.img-zoom').loupe();</script>
        
        <!-- Auto Hide Scrollbar -->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/facescroll.js"></script>
        <script>    
            jQuery(function(){ // on page DOM load
                $('.auto-scroll-group').alternateScroll({ 'hide-bars': false });
            });

            jQuery(function(){
                $(".left_cats_filter input[type='checkbox']").change(function(){
                    var item=$(this);    
                    if(item.is(":checked"))
                    {
                        window.location.href= item.attr("rel");
                    }    
                });
            });

            jQuery(function(){
                var baseurl = '<?php echo get_permalink("101");?>';
                //var currqty = '<?php echo get_curr_pack_qty(); ?>';
                $(".select_bbqty").change(function(){
                    var old_num = parseInt(jQuery.trim(jQuery('.bapcategory_top_bar_counter .nmbr').text()));
                    //var new_num = parseInt(old_num+parseInt(jQuery.trim(currqty)));
                    if(old_num > jQuery(this).val()){
                        //alert(1);
                        jQuery('.pp_notify').html('You cannot switch to lower quantity box! Remove box quantity first!').show();
                        jQuery('.pp_notify').show().delay(2000).fadeOut(400);
                    } else {
                        window.location.href= baseurl+'&bpcat=y&cpack='+jQuery(this).val();
                    }    
                });
            });
        </script>
        <!--  Newsletter -->
        <!--<script type="text/javascript" src="<?php //bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js?ver=2.6.6"></script>-->
        <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/plugins/wysija-newsletters/js/validate/languages/jquery.validationEngine-en.js?ver=2.6.6"></script>
        <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/plugins/wysija-newsletters/js/validate/jquery.validationEngine.js?ver=2.6.6"></script>
        <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/plugins/wysija-newsletters/js/front-subscribers.js?ver=2.6.6"></script>
        <script type="text/javascript">
        /* <![CDATA[ */
        var wysijaAJAX = {"action":"wysija_ajax","controller":"subscribers","ajaxurl":"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php","loadingTrans":"Loading..."};
        /* ]]> */
        </script>
        <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/plugins/wysija-newsletters/js/front-subscribers.js?ver=2.6.6"></script>
        <!--  Newsletter -->
        
        <!-- Tab slider -->
        <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.jcarousel.js"></script>
        <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jcarousel.js"></script>
        <!-- Tab slider -->

        <!-- Build a box modal -->
        <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.simplemodal.js"></script>
        <link type='text/css' href='<?php bloginfo('template_url') ?>/css/basic.css' rel='stylesheet' media='screen' />
        <!-- IE6 "fix" for the close png image -->
        <!--[if lt IE 7]>
        <link type='text/css' href='<?php bloginfo("template_url") ?>/css/basic_ie.css' rel='stylesheet' media='screen' />
        <![endif]-->
        <script type="text/javascript">
            jQuery(function () {
                jQuery('.order-summary-content a.sv_pack.sv_enabled, a.sv_pack.sv_enabled').live('click', function (e) {
                    save_url = jQuery(this).attr('href');
                    jQuery('#basic-modal-content').modal();

                    jQuery('#basic-modal-content button.box_save').live('click', function(){
                        if(jQuery('.usrbox').val() == ''){
                            jQuery('#simplemodal-container p.error').text('Please enter your box name!').show();
                        } else {
                            var usrbox_name = jQuery('.usrbox').val();
                            jQuery.modal.close();
                            window.location.href= save_url+'&usrbox='+usrbox_name;
                        }
                        //return false;
                    });

                    return false;
                });

                /* cancel and close the modal*/
                jQuery('.canc_bname').live('click',
                    function(){
                        jQuery.modal.close();
                        return false;
                    }
                );
            });
        </script>

	    <?php wp_footer(); ?>
</body>
</html>