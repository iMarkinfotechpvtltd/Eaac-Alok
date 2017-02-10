<?php
/*

 * Template Name: Who We Are
 
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
				   'terms' => 'Who We Are'
                   )
                )
              );
		      $z=0;
              $loop = new WP_Query( $args );
			  
              while ( $loop->have_posts() ) : $loop->the_post();
               ?>
				
                <li data-target="carousel-example-generic2" data-slide-to="<?php echo $z; ?>" class=""></li>
                
				<?php
                $z++;				
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
			   'terms' => 'Who We Are'
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
				<div class="item<?php echo ($z==1) ? 'active ' : ''; ?>" style="background:url(http://placehold.it/1920x482&amp;text=1920x482);)">
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
    <section class="what_do_section">
        <div class="container">
            <h2 class="main_title"><?php the_title(); ?></h2>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="img_section">
					<?php if ( has_post_thumbnail() ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'whowe_image' );
					?>
					<img src="<?php echo $image[0]; ?>" alt="" />
					<?php
					} else { ?>
					<img src="http://placehold.it/680x624&amp;text=No image found" alt="No found"/>
					<?php } ?> 
					
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php the_field('we_can_take_your_business',$post->ID) ?>
                </div>
            </div>
        </div>
    </section>
    <section class="about_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="inner_information_section">
                         <?php the_field('about_us',$post->ID) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image_about">
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
    <section class="staff">
        <div class="container">
            <h2 class="main_title">OUR STAFF</h2>
            <div class="row">
			<?php 
			$args = array('post_type' => 'staff','posts_per_page' =>'3' ,'order' => 'DESC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			
                <div class="col-md-4 col-sm-4">
                    <a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { 
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'staff_image' );
				            ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                            <?php
                            } else { ?>
                           <img src="http://placehold.it/460x365&amp;text=No image found" alt="Not found"/>
                           <?php } ?></a>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <h6><?php the_field('extra_field',$post->ID) ?></h6>
                </div>
				
                <?php
                  endwhile;
                  wp_reset_query();
                 ?>
				
				
            </div>
        </div>
    </section>
   
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>