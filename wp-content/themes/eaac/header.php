<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="https://www.fontify.me/wf/d6083a9e34a17e0ab7df6458a393f96b" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.mCustomScrollbar.css" />
</head>

<body>
    <div class="preloader"> <span><img src="<?php echo get_template_directory_uri(); ?>/images/preloader.gif" alt="preloader"></span></div>
    <header>
        <div class="container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                <img src="<?php the_field('site_logo','option');?>" alt="logo" />
                <div class="rgt_logo">
                    <h3><?php the_field('logo_text_first','option');?></h3>
                    <span><?php the_field('logo_text_second','option');?></span>
                </div>
            </a>
            <div class="right_block">
                <div class="cntct">
                    <ul>
                        <li>
                            <a href="tel:<?php the_field('phone_number','option');?>"><i class="fa fa-mobile" aria-hidden="true"></i> <?php the_field('phone_number','option');?></a>
                        </li>
                        <li>
                            <a href="mailto:<?php the_field('email_adress','option');?> "><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php the_field('email_adress','option');?></a>
                        </li>
                    </ul>
                </div>
                <div class="lang">
                    <?php echo do_shortcode('[gtranslate]'); ?>
                </div>
                <div class="social_links">
                    <ul>
                        <li>
                            <a target="_blank" href="<?php the_field('facebook_link','option');?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php the_field('twitter_link','option');?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php the_field('googleplus_link','option');?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                         </li>
                        <li>
                            <a target="_blank" href="<?php the_field('linkedin_link','option');?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php the_field('pinterest_link','option');?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    <?php 
					$defaults = array(
					'theme_location'  => '',
					'menu'            => 'footer_menu',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '%3$s',
					'depth'           => 0,
					'walker'          => ''
					);
					wp_nav_menu( $defaults ); 
                   ?>
                    </ul>
                </div>
                <form role="search" method="get" id="searchform" class="srch_rslt" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                   <input placeholder="" name="s" id="s" value="<?php echo get_search_query(); ?>" type="text">
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>