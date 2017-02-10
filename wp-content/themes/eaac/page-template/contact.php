<?php
/*

 * Template Name: Contact Us page
 
*/

get_header();

global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>
	<section class="pageslider">
        <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel" data-interval="10000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
			<?php
			  $args = array(
			 'post_type' => 'slider',
			 'showposts' => -1,
			 'order' => 'DESC',
			 'tax_query' => array(
			  array(
				   'taxonomy' => 'slider_category',
				   'field' => 'slug',
				   'terms' => 'Contact'
                   )
                )
              );
		      $i=0;
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
               ?>
				
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class=""></li>
                
				<?php
                $i++;				
				endwhile;
				wp_reset_query();
				?> 
            </ol>
            <div class="carousel-inner" role="listbox">
			<?php
			  $args = array(
			 'post_type' => 'slider',
			 'showposts' => -1,
			 'order' => 'DESC',
	
			 'tax_query' => array(
		     array(
			   'taxonomy' => 'slider_category',
			   'field' => 'slug',
			   'terms' => 'Contact'
                   )
                )
           );
			$loop = new WP_Query( $args );
			$z = 0;
		    while ( $loop->have_posts() ) : $loop->the_post();
			  $z = $z + 1;
               ?>
			   <?php 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'otherpageslider_image');
				if($image==""){
				?>
				<div class="<?php echo ($z==1) ? 'active ' : ''; ?>item" style="background:url(http://placehold.it/1920x482&amp;text=1920x482));">
				<?php }	else{  ?>
				<div class="<?php echo ($z==1) ? 'active ' : ''; ?>item" style="background:url(<?php echo $image[0]; ?>);">
				<?php } ?>
                    <div class="info_caption">
                        <div class="container">
                            <h2 class="wow slideInLeft"><?php the_title(); ?></h2>
                            <h1 class="wow slideInRight"><?php the_field('better_than_other',$post->ID) ?></h1>
                        </div>
                    </div>
                </div>
				<?php			
				endwhile;
				wp_reset_query();
				?>
            </div>
        </div>
        </div>
    </section>
    <section class="get_in_touch">
        <div class="container">
            <h2 class="main_title"><?php the_field('get_in_touch',$post->ID) ?></h2>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="contact_info">
                        <h3><?php the_field('southern_&_eastern',$post->ID) ?></h3>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="info">
                                <p><?php the_field('23_a_school_road',$post->ID) ?></p>
                            </div>
                        </div>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="tel:<?php the_field('phone_first',$post->ID) ?>">+<?php the_field('phone_first',$post->ID) ?></a>, <a href="tel:<?php the_field('phone_second',$post->ID) ?>">+<?php the_field('phone_second',$post->ID) ?></a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h3><?php the_field('nigeria_&_anglophone_west',$post->ID) ?></h3>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="tel:<?php the_field('nigeria_phone_first',$post->ID) ?>">+<?php the_field('nigeria_phone_first',$post->ID) ?></a>, <a href="tel:<?php the_field('nigeria_phone_secondt',$post->ID) ?>">+<?php the_field('nigeria_phone_second',$post->ID) ?></a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h3><?php the_field('drc_&_central_africa',$post->ID) ?></h3>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="info">
                                <p><?php the_field('6_avenue_le_marinel',$post->ID) ?></p>
                            </div>
                        </div>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="tel:<?php the_field('drc_&_central_phone_first',$post->ID) ?>">+<?php the_field('drc_&_central_phone_first',$post->ID) ?></a>, <a href="tel:<?php the_field('drc_&_central_phone_second',$post->ID) ?>">+<?php the_field('drc_&_central_phone_second',$post->ID) ?></a>
                            </div>
                        </div>
                        <div class="bx">
                            <div class="icn"><img src="<?php echo get_template_directory_uri(); ?>/images/web_icon.png" alt="web_icon" /></div>
                            <div class="info">
                                <a href="<?php the_field('website',$post->ID) ?>"><?php the_field('website',$post->ID) ?></a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h3><?php the_field('for_inquiries_first',$post->ID) ?></h3>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="info">
                                <p><?php the_field('6_avenue_le_marinel_gombe',$post->ID) ?></p>
                            </div>
                        </div>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="tel:<?php the_field('6_avenue_le_marinel_gombe_phone_number',$post->ID) ?>">+<?php the_field('6_avenue_le_marinel_gombe_phone_number',$post->ID) ?></a>
                            </div>
                        </div>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="info">
                                <a href="mailto:<?php the_field('first_email',$post->ID) ?>"><?php the_field('first_email',$post->ID) ?></a>, <a href="mailto:<?php the_field('second_email',$post->ID) ?>"><?php the_field('second_email',$post->ID) ?></a>
                            </div>
                        </div>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
                            <div class="info">
                                <p><?php the_field('viber_and_whatsapp',$post->ID) ?></p>
                            </div>
                        </div>
                        <div class="bx">
                            <div class="icn"><i class="fa fa-skype" aria-hidden="true"></i></div>
                            <div class="info">
                                <p><?php the_field('skype',$post->ID) ?></p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-md-6 col-sm-6">
                    <div class="contact_form">
                        <h3>Contact</h3>
                       <?php echo do_shortcode( '[contact-form-7 id="97" title="Contact form"]' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>