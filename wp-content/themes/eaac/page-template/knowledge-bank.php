<?php
/*

 * Template Name: Knowledge Bank page
 
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
				   'terms' => 'Knowledge Bank'
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
			   'terms' => 'Knowledge Bank'
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
    <section class="knowladge_bnk">
        <div class="container">
            <h2 class="main_title"><?php the_title(); ?></h2>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="knowlede_box">
                        <div class="knowlwdge_icon">
                            <?php echo get_post_meta($post->ID,"icon_free_fast_setup",true) ?>
                        </div>
                        <div class="knowledge_info">
                            <?php the_field('free_fast_setup',$post->ID) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="knowlede_box">
                        <div class="knowlwdge_icon">
                           <?php echo get_post_meta($post->ID,"icon_for_free_online_check_software",true) ?>
                        </div>
                        <div class="knowledge_info">
                            <?php the_field('free_online_check_software',$post->ID) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="knowlede_box">
                        <div class="knowlwdge_icon">
                          <?php echo get_post_meta($post->ID,"icon_for_free_web_shopping_cart",true) ?>  
                        </div>
                        <div class="knowledge_info">
                           <?php the_field('free_web_shopping_cart',$post->ID) ?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="knowlede_box">
                        <div class="knowlwdge_icon">
                           <?php echo get_post_meta($post->ID,"icon_for_free_search_engine_service",true) ?>   
                        </div>
                        <div class="knowledge_info">
                            <?php the_field('free_search_engine_service',$post->ID) ?> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="knowlede_box">
                        <div class="knowlwdge_icon">
                            <?php echo get_post_meta($post->ID,"icon_for_accept_all_major_credit_cards",true) ?> 
                        </div>
                        <div class="knowledge_info">
                             <?php the_field('accept_all_major_credit_cards',$post->ID) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="knowlede_box">
                        <div class="knowlwdge_icon">
                            <?php echo get_post_meta($post->ID,"icon_for_virtual_terminal_included",true) ?>  
                        </div>
                        <div class="knowledge_info">
                           <?php the_field('virtual_terminal_included',$post->ID) ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="consultancy_skill">
        <div class="container">
            <h2><?php the_field('consultancy_skills_training',$post->ID) ?></h2>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="skill">
                      <?php the_field('consultancy_skills_training_list',$post->ID) ?>  
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="skill">
                      <?php the_field('sme_consulting',$post->ID) ?>   
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="skill">
                        <?php the_field('securing_business_maximizing_revenus',$post->ID) ?>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <section class="attend_duration">
        <div class="container">
            <div class="row"> 
                <div class="col-md-8 col-sm-8">
                    <div class="attend_div">
                        <div class="usr_icon">
                           <?php echo get_post_meta($post->ID,"icon_for_who_should_attend",true) ?>  
                        </div>
                        <div class="detail">
                            <?php the_field('who_should_attend',$post->ID) ?>  
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="duration_div">
                        <div class="usr_icon">
                            <?php echo get_post_meta($post->ID,"icon_for_duration_format",true) ?> 
                        </div>
                        <div class="detail">
                            <?php the_field('duration_format',$post->ID) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>