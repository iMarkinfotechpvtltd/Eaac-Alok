<?php
/*

 * Template Name: Training page
 
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
				   'terms' => 'Training'
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
			   'terms' => 'Training'
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
    <section class="training_modules">
        <div class="container">
            <h2 class="main_title">TRAINING MODULES</h2>
        </div>
		<?php 
		$i=1;
		$args = array('post_type' => 'training','posts_per_page' =>'4' ,'order' => 'DESC');
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();	
		?>
        <div class="module">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 <?php if($i%2!=0){ echo 'pull-right';}?>">
                        <div class="img_wrap">
                            <img class="img-responsive back_img" src="<?php echo get_template_directory_uri(); ?>/images/training_module_backimg1.jpg" alt="training_module_backimg1" />
                            <?php if ( has_post_thumbnail() ) {
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'traning_image' );
				            ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="img-responsive front_img"/>
                            <?php
                            } else { ?>
                           <img src="http://placehold.it/582x502&amp;text=No image found" alt="<?php the_title(); ?>"/>
                           <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 module-scroll mCustomScrollbar" data-mcs-theme="dark" <?php if($i%2!=0){ echo 'pull-left';}?>">
                        <h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	     $i++;
	     endwhile;
	     wp_reset_query();
        ?>
        
    </section>   
   
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>