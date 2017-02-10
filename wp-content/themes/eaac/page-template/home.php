<?php
/*

 * Template Name: Home Page
 
*/

get_header('home');

global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>
	<section class="homeslider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">
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
				   'terms' => 'Home'
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
			   'terms' => 'Home'
                   )
                )
           );
			$loop = new WP_Query( $args );
			$z = 0;
		    while ( $loop->have_posts() ) : $loop->the_post();
			  $z = $z + 1;
               ?>
			   <?php 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-image');
				if($image==""){
				?>
				<div class="<?php echo ($z==1) ? 'active ' : ''; ?>item" style="background:url(http://placehold.it/1920x400&amp;text=1920x772));">
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
    <div class="btm_header">
        <?php the_content(); ?>
    </div>
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="info_about">
                        <?php the_field('about_us',$post->ID) ?>
                        <a href="<?php the_field('about_us_link',$post->ID) ?>" class="view_btn"><span>View More </span></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about_img">
					<?php
					$image=get_post_meta($post->ID,"about_us_image",true);
					$thumb = wp_get_attachment_image_src($image, 'about_image' );?>
					<?php if($thumb==""){?>
                    <img src="http://placehold.it/850x711&amp;text=No image found" alt="Not found"/>
					<?php
					} else { ?>
					<img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>"><?php } ?>
              
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_services">
        <div class="container">
            <h2 class="main_title"><?php the_field('our_services',$post->ID) ?></h2>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a class="srvc_box" href="javascript:void(0)">
                        <div class="icon">
						<?php echo get_post_meta($post->ID,"icon_foradvanced_private_sector_development",true) ?>
                         
                        </div>
                        <h3><?php the_field('advanced_private_sector_development',$post->ID) ?></h3>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a class="srvc_box" href="#">
                        <div class="icon">
                           <?php echo get_post_meta($post->ID,"icon_for_entrepreneurship_and_sme_development",true) ?> 

                        </div>
                        <h3><?php the_field('entrepreneurship_and_sme_development',$post->ID) ?></h3>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a class="srvc_box" href="#">
                        <div class="icon">
                         <?php echo get_post_meta($post->ID,"icon_for_oil_gas_mining_and_infrastructures",true) ?>   

                        </div>
                        <h3><?php the_field('oil_gas_mining_and_infrastructures',$post->ID) ?></h3>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a class="srvc_box" href="#">
                        <div class="icon">
                            <?php echo get_post_meta($post->ID,"icon_for_banking_finance_and_financial_market",true) ?> 

                        </div>
                        <h3><?php the_field('banking_finance_and_financial_market',$post->ID) ?></h3>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a class="srvc_box" href="#">
                        <div class="icon">
                            
                       <?php echo get_post_meta($post->ID,"icon_for_corporate_and_investor_advisory_services",true) ?> 

                        </div>
                        <h3><?php the_field('corporate_and_investor_advisory_services',$post->ID) ?></h3>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a class="srvc_box" href="#">
                        <div class="icon">
                           <?php echo get_post_meta($post->ID,"icon_for_governments_public_administration",true) ?>
                        </div>
                        <h3><?php the_field('governments_public_administration',$post->ID) ?></h3>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="our_projects">
        <div class="container">
            <h2 class="main_title">Our Projects</h2>
            <div class="row">
			<?php 
			$args = array('post_type' => 'project','posts_per_page' =>'4' ,'order' => 'DESC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="project_box">
                        <?php if ( has_post_thumbnail() ) {
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'projecthome_image' );
				            ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                            <?php
                            } else { ?>
                           <img src="http://placehold.it/338x390&amp;text=No image found" alt="<?php the_title(); ?>"/>
                           <?php } ?>
                        <div class="view_effect">
                            <div class="table">
                                <h3><?php the_field('home_page_title',$post->ID) ?></h3>
                                <a href="<?php the_permalink(); ?>">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                
               <?php
                  endwhile;
                  wp_reset_query();
                 ?>
            </div>
        </div>
    </section>
    <section class="cnslting_and_advisory">
        <div class="container">
            <h2 class="main_title"><?php the_field('consulting_and_advisory_',$post->ID) ?> </h2>
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <?php the_field('emerging_africa_consulting',$post->ID) ?>
                </div>
                <div class="col-md-7 col-sm-7">
				<?php
					$image=get_post_meta($post->ID,"image_for_emerging_africa_consulting",true);
					$thumb = wp_get_attachment_image_src($image, 'home1_image' );?>
					<?php if($thumb==""){?>
                    <img src="http://placehold.it/809x355&amp;text=No image found" alt="Not found"/>
					<?php
					} else { ?>
					<img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>"><?php } ?>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="training_section">
        <div class="container">
            <h2><?php the_field('training_&_capacity_building',$post->ID) ?></h2>
            <div class="row">
                <div class="col-md-7 col-sm-7">
				<?php the_field('training_modules_in_banking',$post->ID) ?>
                    
                    <a href="<?php the_field('link_for_training_modules_in_banking',$post->ID) ?>" class="view_btn"><span>See More </span></a>
                </div>
                <div class="col-md-5 col-sm-5">
				
                    <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
						<?php if( have_rows('training_modules_in_banking_slider_images') ): ?>
			            <?php $z = 0; while( have_rows('training_modules_in_banking_slider_images') ): the_row(); 
						// vars
						$z = $z + 1;
						$image = get_sub_field('image');
						?>
                            <div class="<?php echo ($z==1) ? 'active ' : ''; ?>item">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                            </div>
                            <?php endwhile; ?>
				            <?php endif; ?>
                        </div>

                    </div>
                    <div class="controls_div">
                        <!-- Controls -->
                        <a class="" href="#carousel-example-generic1" role="button" data-slide="prev">

                            <span class=""><i class="fa fa-arrow-left" aria-hidden="true"></i> Prev</span>
                        </a>
                        <a class="" href="#carousel-example-generic1" role="button" data-slide="next">

                            <span class="">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>