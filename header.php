<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js"  xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo get_locale(); ?>" <?php language_attributes(); ?>>
<!--<![endif]-->
<head id="<?php echo of_get_option('meta_headid'); ?>">
<!-- the "no-js" class is for Modernizr. -->
<!-- Mobile viewport optimisation -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no , viewport-fit=cover">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="theme-color" content="#ffeb65">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="width">
<meta name="mobile-web-app-capable" content="yes">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
	<link rel="icon" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/images/logo.png">
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- Always force latest IE rendering engine (even in intranet) -->
    <!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<?php
if (is_search())
	echo '<meta name="robots" content="index, follow" />';
?>
<title>
	<?php wp_title( '|', true, 'right' ); ?>
</title>
<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
<!--Google will often use this as its description of your page/site. Make it good.-->
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php
if (true == of_get_option('meta_author'))
	echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';
if (true == of_get_option('meta_google'))
	echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
?>
<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
<?php

if (true == of_get_option('meta_viewport'))
	echo '<meta name="viewport" content="' . of_get_option("meta_viewport") . ' minimal-ui" />';

if (true == of_get_option('head_favicon')) {
	echo '<meta name=”mobile-web-app-capable” content=”yes”>';
	echo '<link rel="shortcut icon" sizes=”1024x1024” href="' . of_get_option("head_favicon") . '" />';
}

if (true == of_get_option('head_apple_touch_icon'))
	echo '<link rel="apple-touch-icon" href="' . of_get_option("head_apple_touch_icon") . '">';
?>
                          <!--[if lte IE 7]>
          	<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie.css" rel="stylesheet" type="text/css" />
          <![endif]-->
          <!-- <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" /> -->
          <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
        <!-- Lea Verou's Prefix Free, lets you use only un-prefixed properties in yuor CSS files -->
          <!--<script src="<?php //echo get_template_directory_uri(); ?>/_/js/prefixfree.min.js"></script>-->
          <!--shiv-->
                <!--[if lt IE 9]>
	<script src=".<?php echo get_template_directory_uri(); ?>/_/js/html5shiv.js"></script>
<![endif]-->
                <!-- This is an un-minified, complete version of Modernizr.
                	Before you move to production, you should generate a custom build that only has the detects you need. -->
                	<script src="<?php echo get_template_directory_uri(); ?>/_/js/modernizr-2.8.0.dev.js"></script>
                	<?php
		// Windows 8
                	if (true == of_get_option('meta_app_win_name')) {
                		echo '<meta name="application-name" content="' . of_get_option("meta_app_win_name") . '" /> ';
                		echo '<meta name="msapplication-TileColor" content="' . of_get_option("meta_app_win_color") . '" /> ';
                		echo '<meta name="msapplication-TileImage" content="' . of_get_option("meta_app_win_image") . '" />';
                	}

		// Twitter
                	if (true == of_get_option('meta_app_twt_card')) {
                		echo '<meta name="twitter:card" content="' . of_get_option("meta_app_twt_card") . '" />';
                		echo '<meta name="twitter:site" content="' . of_get_option("meta_app_twt_site") . '" />';
                		echo '<meta name="twitter:title" content="' . of_get_option("meta_app_twt_title") . '">';
                		echo '<meta name="twitter:description" content="' . of_get_option("meta_app_twt_description") . '" />';
                		echo '<meta name="twitter:url" content="' . of_get_option("meta_app_twt_url") . '" />';
                	}

		// Facebook
                	if (true == of_get_option('meta_app_fb_title')) {
                		echo '<meta property="og:title" content="' . of_get_option("meta_app_fb_title") . '" />';
                		echo '<meta property="og:description" content="' . of_get_option("meta_app_fb_description") . '" />';
                		echo '<meta property="og:url" content="' . of_get_option("meta_app_fb_url") . '" />';
                		echo '<meta property="og:image" content="' . of_get_option("meta_app_fb_image") . '" />';
                	}
                	?>
                	<link rel="profile" href="http://gmpg.org/xfn/11" />
                	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
                    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

                	<?php wp_head(); ?>
                </head>

                <body <?php body_class(); ?>>
 
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
                    	<div id="wrapper">
                		<header id="header" role="banner">
                			<!-- <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                			<div class="description">
                				<?php bloginfo( 'description' ); ?>
                			</div> -->
                                            <?php if ( get_theme_mod( 'm1_logo' ) ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    </a>
    <?php else : ?>  
    <hgroup>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </hgroup>
<?php endif; ?>
                		</header>
                	<nav>
                            <div class="nav-wrapper">
                                 <?php
                                    wp_nav_menu( array(
                                        'menu' => 'Primary',
                                        'theme_location'=>'Primary',
                                        'menu_class' => 'hide-on-med-and-down ',
                                        'walker' => new wp_materialize_navwalker()
                                    ));
                                ?>
                            </div>
                        </nav>
