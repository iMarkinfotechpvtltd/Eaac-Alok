<?php
/*

 * Template Name: Consulting & Advisory page
 
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
				   'terms' => 'Consulting & Advisory'
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
			   'terms' => 'Consulting & Advisory'
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
        <section class="cnslting_and_advisory">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h2 class="main_title"><?php the_title(); ?> </h2>
                        
                        <ul>
						<?php $taxonomyName = "consulting_category";
						 //This gets top layer terms only.  This is done by setting parent to 0.  
						$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false,));
						foreach ($parent_terms as $pterm) 
						
						{ ?>
						<?php 
						// echo "<pre>";
						// print_r($pterm);
						// echo "</pre>"; ?>
                        <li>
                        <a href="javascript:void(0);" id="<?php echo $pterm->term_id; ?>" onclick="getid(this.id);"><?php the_field('categorie_name', $pterm); ?></a></li>
						<?php          			
			            }
						
		              ?>
                    </ul>
					
                    </div>
                    <div class="col-md-6 col-sm-6">
					<?php
					$image=get_post_meta($post->ID,"image_for_consulting_and_advisory",true);
					$thumb = wp_get_attachment_image_src($image, 'consult_image' );?>
					<?php if($thumb==""){?>
                    <img src="http://placehold.it/702x375&amp;text=No image found" alt="Not found"/>
					<?php
					} else { ?>
					<img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>"><?php } ?>
					 
                    </div>
                </div>
            </div>
        </section>
		<div id="load" style="display:none">
		 <img src="<?php echo  get_template_directory_uri(); ?>/images/kloader.gif" id="loadingblog">
		</div>
        <section class="our_services emerging_consulting" id="load1">
            <div class="container">
			
                <h2 class="main_title"><?php the_field('advanced_private_sector_development_tools',$post->ID) ?></h2>
                <div class="row">
				<?php
				  $args = array(
				 'post_type' => 'consulting_advisory',
				 'showposts' => -1,
				 'order' => 'DESC',
				 'tax_query' => array(
				  array(
				   'taxonomy' => 'consulting_category',
				   'field' => 'slug',
				   'terms' => 'Advanced Private Sector Development Tools'
                   )
                )
              );
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
               ?>
                    <div class="col-md-4 col-sm-4 aa">
                        <div class="srvc_box">
                            <div class="icon">
                               <?php echo get_post_meta($post->ID,"svg_icon_upload",true) ?> 
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </div>
               <?php				
				endwhile;
				wp_reset_query();
				?> 
					
                </div>
            </div>
        </section>
		
	<script>
 function getid(event)
{
	//alert("aaaaaaaaaaaaaaaaaaaaaa");
	var rmve_usr = event;
	//alert(rmve_usr);
	//var id_post = $(this).attr('post_id');
	jQuery('#load').show();
	jQuery('#load1').hide();
	jQuery.ajax({
		
			type: "GET",
			url: "<?php echo get_stylesheet_directory_uri();?>/ajax/consulting-advisory.php",
			data:{rmve_usr:rmve_usr,format:'raw'},
			
			success:function(resp){
				//alert(resp);
				jQuery("#load").hide();
				jQuery('.emerging_consulting').html(resp);
				jQuery('#load1').show();
			}
		});
}

</script>

<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>