<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();
global $post;
 ?>
 <?php while ( have_posts() ) : the_post(); ?>
<section class="prjct_bnk">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <?php if ( has_post_thumbnail() ) {
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'teaminner_image' );
				            ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                            <?php
                            } else { ?>
                           <img src="http://placehold.it/580x298&amp;text=No image found" alt="Not found"/>
                           <?php } ?>
                </div>
                <div class="col-md-7">
                    <h2><?php the_title(); ?></h2>
                    <h3><?php the_field('extra_field',$post->ID) ?></h3>
                    <?php the_content(); ?> 
                </div>
            </div>
        </div>
    </section>
<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>
