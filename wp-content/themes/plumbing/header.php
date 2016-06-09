<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OneClick Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<?php 
			$customPhoneNumber = esc_attr(get_option('phone_number'));
			$customMoto = esc_attr(get_option('custom_moto'));
			$customFacebook = esc_attr(get_option('facebook_handler'));
			$customTwitter = esc_attr(get_option('twitter_handler'));
			$customGplus = esc_attr(get_option('gplus_handler'));
			$customPinterest = esc_attr(get_option('pinterest_handler'));
			$customYouTube = esc_attr(get_option('youtube_handler'));
		?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<!-- <div id="free-quote"><a href="<?php echo get_option('home');?>/free-quote/">Get a Free Quote!</a></div> -->
	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<div id="info-bar">
				<div class="main-page">
					<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php print $customMoto; ?></span>
					<span><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <a href="tel:<?php print $customPhoneNumber; ?>"><?php print $customPhoneNumber; ?></a></span>
					<div class="social-media-icons-header">
						<?php if (!empty($customFacebook)) { echo "<a href='$customFacebook' title='Facebook' target='_blank' class='social-icon fb'></a>";}?>
						<?php if (!empty($customTwitter)) { echo "<a href='$customTwitter' title='Twitter' target='_blank' class='social-icon tw'></a>";}?>
						<?php if (!empty($customGplus)) { echo "<a href='$customGplus' title='Google+' target='_blank' class='social-icon gp'></a>";}?>
						<?php if (!empty($customPinterest)) { echo "<a href='$customPinterest' title='Pinterest' target='_blank' class='social-icon pi'></a>";}?>
						<?php if (!empty($customYouTube)) { echo "<a href='$customYouTube' title='YouTube' target='_blank' class='social-icon yt'></a>";}?>
					</div>
				</div>
			</div>
			<div class="main-page">
				<!-- Header section with logo and menu-->
					<a href="<?php echo get_option('home');?>"><img id="header-logo" src="<?php bloginfo('template_url');?>/img/logo.png" title="<?php bloginfo('title'); ?>" /></a>			
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">