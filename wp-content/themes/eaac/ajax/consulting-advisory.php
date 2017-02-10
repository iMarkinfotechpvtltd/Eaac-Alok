<?php
include('../../../../wp-config.php');
$post_id = $_GET['rmve_usr'];
$categoryinfo =  get_term_by('id', $post_id, 'consulting_category');
$cat_slug=$categoryinfo->slug;
?>
<section class="our_services emerging_consulting">
            <div class="container">
                <h2 class="main_title"><?php the_field('categorie_name', $categoryinfo); ?></h2>
                <div class="row">
<?php
$args = array('showposts'=>-1, 'consulting_category' => $cat_slug ,'post_type'=>'consulting_advisory');
$query = new WP_Query( $args ); 
 while ( $query->have_posts() ) : $query->the_post(); ?>

				
                    <div class="col-md-4 aa">
                        <div class="srvc_box">
                            <div class="icon">
                               <?php echo get_post_meta($post->ID,"svg_icon_upload",true); ?> 
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
