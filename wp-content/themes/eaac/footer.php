<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
    <section class="brand-slider">
        <div class="container">
            <div id="brand_sldr">
                <?php	
				$args = array('post_type' => 'logo','posts_per_page'=>-1,'order'=>'DESC');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="item">
                        <?php if ( has_post_thumbnail() ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-logo' );
						?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                            <?php
						} else { ?>
                                <img src="http://placehold.it/258x75&amp;text=No image found" alt="Not found" />
                                <?php } ?>
                    </div>
                    <?php	
				endwhile;
				wp_reset_query();
				?>

            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="block1">

                        <?php the_field('about','option');?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="block2">
                        <h2>Training Modules</h2>
                        <ul>
                            <?php 
							$defaults = array(
							'theme_location'  => '',
							'menu'            => 'training_menu',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '%3$s',
							'depth'           => 0,
							'walker'          => ''
							);
							wp_nav_menu( $defaults ); 
						   ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3">
                    <div class="block3">
                        <h2>Services</h2>
                        <ul>
                            <?php 
							$defaults = array(
							'theme_location'  => '',
							'menu'            => 'services_menu',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '%3$s',
							'depth'           => 0,
							'walker'          => ''
							);
							wp_nav_menu( $defaults ); 
						   ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3">
                    <div class="block4">
                        <h2>Subscribe</h2>
                        <p>Please Enter your email to subscirbe for the Newsletter</p>
						<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<div id="mc_embed_signup">
<form action="//stagingdevsite.us13.list-manage.com/subscribe/post?u=50eec9359247dba9e7bd3aec6&amp;id=7c546fa812" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
<div class="mc-field-group">
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_50eec9359247dba9e7bd3aec6_7c546fa812" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="submit" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

                        <ul class="scl_lnks">
                            <li>
                                <a href="<?php the_field('facebook_link','option');?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="<?php the_field('twitter_link','option');?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="<?php the_field('googleplus_link','option');?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="<?php the_field('linkedin_link','option');?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="<?php the_field('pinterest_link','option');?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_nav">
            <div class="container">
                <ul>
                    <?php 
					$defaults = array(
					'theme_location'  => '',
					'menu'            => 'footer_menu',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '%3$s',
					'depth'           => 0,
					'walker'          => ''
					);
					wp_nav_menu( $defaults ); 
                   ?>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                &copy;
                <?php the_time('Y') ?> | All Rights Reserved / Designed by <a href="https://www.imarkinfotech.com/" target="_blank">imarkinfotech</a>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.expander.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>

        <script>
            jQuery('.carousel').carousel({
                pause: 'none'
                interval: 10000

            });
            /////////////////////////////////////////

            jQuery('.cs-btn').append("<span class='lines top'></span><span class='lines right'></span><span class='lines bottom'></span><span class='lines left'></span>");
            jQuery('.cs-btn').attr('pk', '');
        </script>

 
    
          <script>
            (function ($) {
                jQuery(window).on("load", function () {
                    jQuery(".module-scroll").mCustomScrollbar();
                });
            })(jQuery);
			
	
        </script>
<script>
jQuery(document).ready(function() {

 jQuery('div.expandDiv').expander({
    slicePoint: 0, //It is the number of characters at which the contents will be sliced into two parts.
    widow: 2,
    expandSpeed: 0, // It is the time in second to show and hide the content.
    userCollapseText: 'Read Less (-)' // Specify your desired word default is Less.
  });

  jQuery('div.expandDiv').expander();
});


</script>


        </body>

        </html>