<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
    <section class="training_modulespage">
        <div class="container">
            <h2 class="main_title"><?php the_title(); ?></h2>
        </div>
        <div class="module">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="img_wrap">
                           <?php 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							?>
							<img src="<?php echo $image[0]; ?>"/>
							
                        </div>
                   
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
		
		</section>
<?php 
endwhile;
?>		
<?php get_footer(); ?>
