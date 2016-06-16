<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Plumbing
 */
 
	$customFacebook = esc_attr(get_option('facebook_handler'));
	$customTwitter = esc_attr(get_option('twitter_handler'));
	$customGplus = esc_attr(get_option('gplus_handler'));
	$customPinterest = esc_attr(get_option('pinterest_handler'));
	$customYouTube = esc_attr(get_option('youtube_handler'));
	$customFooterCopyRight = esc_attr(get_option('footer_copyright'));
	$customFooterCopyRightSpan = esc_attr(get_option('footer_copyright_span'));
?>



	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="main-page wrench">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">					  
				  <?php
					wp_nav_menu( array( 'theme_location' => 'footer-menu-one' ) ); 
				  ?>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">					  
				  <?php
					wp_nav_menu( array( 'theme_location' => 'footer-menu-two' ) ); 
				  ?>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">					  
				  <?php
					wp_nav_menu( array( 'theme_location' => 'footer-menu-three' ) ); 
				  ?>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">					  
				  <?php
					wp_nav_menu( array( 'theme_location' => 'footer-menu-four' ) ); 
				  ?>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 footer-social">
					<img src="<?php bloginfo('template_url');?>/img/logo-footer.png" alt="Logo"/>
					<?php if (!empty($customFacebook)) { echo "<a href='$customFacebook' title='Facebook' target='_blank' class='social-icon fb'></a>";}?>
					<?php if (!empty($customTwitter)) { echo "<a href='$customTwitter' title='Twitter' target='_blank' class='social-icon tw'></a>";}?>
					<?php if (!empty($customGplus)) { echo "<a href='$customGplus' title='Google+' target='_blank' class='social-icon gp'></a>";}?>
					<?php if (!empty($customPinterest)) { echo "<a href='$customPinterest' title='Pinterest' target='_blank' class='social-icon pi'></a>";}?>
					<?php if (!empty($customYouTube)) { echo "<a href='$customYouTube' title='YouTube' target='_blank' class='social-icon yt'></a>";}?>
					<?php if (!empty($customFooterCopyRight)) { echo "<p>$customFooterCopyRight <span>$customFooterCopyRightSpan</span></p>";}?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
