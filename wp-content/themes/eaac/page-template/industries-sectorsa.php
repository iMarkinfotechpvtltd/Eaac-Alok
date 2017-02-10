<?php
/*

 * Template Name: Industries & Sectorsa
 
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
				   'terms' => 'Industries & Sectors'
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
			   'terms' => 'Industries & Sectors'
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
    <section class="industry_sector">
        <div class="container">
		
            <h2 class="main_title"><?php the_title(); ?></h2>
			<div class="indus"><?php the_content(); ?></div>
            <ul>
			<?php
				$args = array('post_type' => 'industriest','posts_per_page'=>-1,'order'=>'DESC');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <li>
                    <div class="top_icon">
                        <?php echo get_post_meta($post->ID,"icon_for_industries_&_sectors",true) ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php  $content = get_the_content(); echo wp_trim_words( $content , '15' ); ?></p>
                    <a class="rd_more" href="<?php the_permalink(); ?>">Read More...</a>
                </li>
               <?php	
				endwhile;
				wp_reset_query();
				?> 
			   
            </ul>
        </div>
    </section>
    <section class="trading_pltform">
        <div class="container">
            <?php the_field('among_other_content',$post->ID) ?>
            <a href="<?php the_field('link_for_among_other',$post->ID) ?>">read more</a>
        </div>
    </section>
    <section class="business_level_info">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                  <?php the_field('we_can_take_your_business_to_the_next_level',$post->ID) ?>  
                </div>
                <div class="col-md-5 col-sm-5">
				<?php
					$image=get_post_meta($post->ID,"image_for_we_can_take_your_business_to_the_next_level",true);
					$thumb = wp_get_attachment_image_src($image, 'industries' );?>
					<?php if($thumb==""){?>
                    <img src="http://placehold.it/582x297&amp;text=No image found" alt="Not found"/>
					<?php
					} else { ?>
					<img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>"><?php } ?>
				
                </div>
            </div>
        </div>
    </section>
   
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>