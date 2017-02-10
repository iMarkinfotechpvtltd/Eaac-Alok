<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="prjct_bnk ser">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_title(); ?></h2>
                    <h3><?php the_field('extra_field',$post->ID) ?></h3>
                    <?php the_content(); ?> 
                </div>
            </div>
        </div>
    </section>
<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>
