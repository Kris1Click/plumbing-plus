<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OneClick Theme
 */

	get_header();
	$customSectionTitle = esc_attr(get_option('specialists_section_title'));
	$customVideoTitle = esc_attr(get_option('specialists_video_title'));
	$customVideoURL = esc_attr(get_option('specialists_video_url'));
	$customHeadingFirst = esc_attr(get_option('specialists_specialist_h1'));
	$customSpecialistContent1 = esc_attr(get_option('specialists_specialist_custom_content1'));
	$customHeadingSecond = esc_attr(get_option('specialists_specialist_h2'));
	$customSpecialistContent2 = esc_attr(get_option('specialists_specialist_custom_content2'));
	$customServicesTitle = esc_attr(get_option('services_section_title'));
	$customServicesContent = esc_attr(get_option('services_section_content'));
	$customLocationSectionTitle = esc_attr(get_option('location_section_title'));
	$customLocationSectionMoto = esc_attr(get_option('location_section_moto'));	
	$customLocationSectionAddress = esc_attr(get_option('location_section_address'));
	$customPhoneNumber = esc_attr(get_option('phone_number'));
	$customMoto = esc_attr(get_option('custom_moto'));
	$customButtonURL = esc_attr(get_option('button_url'));
	$customButtonText = esc_attr(get_option('button_text'));
	$customAboutTitle = esc_attr(get_option('about_section_title'));
	$customAboutSubtitleOne = get_option('about_section_subtitle_one');
	$customAboutContentOne = esc_attr(get_option('about_section_content_one'));
	$customAboutSubtitleTwo = get_option('about_section_subtitle_two');
	$customAboutContentTwo = esc_attr(get_option('about_section_content_two'));
	$customAboutSubtitleThree = get_option('about_section_subtitle_three');
	$customAboutContentThree = esc_attr(get_option('about_section_content_three'));
	$customAboutBtnText = esc_attr(get_option('about_section_btn_text'));
	$customAboutBtnURL = esc_attr(get_option('about_section_btn_url'));
	$customServicesBtnText = esc_attr(get_option('about_section_btn_text'));
	$customServicesBtnURL = esc_attr(get_option('about_section_btn_url'));
?>
			<section class="slider-section">
				<div class="main-page">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<?php 
								$args = array(
									'post_type' =>'slider',
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'posts_per_page' => -1,
									'custom_field'
								);
								$slides = new WP_Query($args);
							if ($slides->have_posts()) : 
							?>
							<div id="home-slider" class="flexslider">
								<ul class="slides">
									<?php while ($slides->have_posts()):$slides->the_post(); ?>
									<li>
										<?php the_post_thumbnail('slider-thumbnail'); ?>		
										<div id="banner-content"> 							
											<div class="banner-text">
												<?php the_meta(); ?>
											</div>					
										</div>
									</li>
										<?php endwhile; ?>
								</ul>	
							</div>			
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="banner-form">
								<?php echo do_shortcode( '[contact-form-7 id="28" title="Contact Form" html_class="contact-form-page"]' ); ?>
							</div>
						</div>
						<?php endif;?>
					</div>	
				</div>
			</section><!-- slider -->
			<section class="about-us">
				<div class="main-page">
					<h1><?php print $customAboutTitle; ?></h1>
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12">
							<img src="<?php bloginfo('template_url');?>/img/team.jpg" alt="Team">
							<h2><?php print $customAboutSubtitleOne; ?></h2>
							<p><?php print $customAboutContentOne; ?></p>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<img src="<?php bloginfo('template_url');?>/img/angies-list-2015.png" alt="Angie's List 2015">
							<h2><?php print $customAboutSubtitleTwo; ?></h2>
							<p><?php print $customAboutContentTwo; ?></p>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<img src="<?php bloginfo('template_url');?>/img/coupon.png" alt="Coupon">
							<h2><?php print $customAboutSubtitleThree; ?></h2>
							<p><?php print $customAboutContentThree; ?></p>
						</div>
					</div>
					<a class="read-more-button" href="<?php print $customAboutBtnURL ?>"><span><?php print $customAboutBtnText ?></span></a>
				</div>
			</section><!-- about us -->
			<section class="our-services">
				<div class="main-page">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h1><?php print $customServicesTitle; ?></h1>
							<p><?php print $customServicesContent; ?></p>
						</div>
					</div>
					<div id="section-home" class="section-services-holder">		
						<div class="row">
							<?php 
								$args = array( 'post_type' => 'services', 'posts_per_page' => 9, 'order' => 'ASC' );
								$query = new WP_Query( $args ); 
							?>
							<?php if ( $query->have_posts() ) : ?>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>					
								<article class="col-md-4 col-sm-6 col-xs-12">							
									<div class="row">
										<div class="col-md-5 col-xs-12">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="col-md-7 col-xs-12">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<?php the_excerpt(); ?>
										</div>
									</div>
								</article>				
							<?php wp_reset_postdata(); ?>				
							<?php endwhile;?>
							<?php else:  ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
							<?php endif; ?>	
						</div>
					</div>
					<a class="read-more-button" href="<?php print $customAboutBtnURL ?>"><span><?php print $customAboutBtnText ?></span></a>
				</div>
			</section><!-- services -->
			<section class="specialists">
				<div class="main-page">
					<h1><?php print $customSectionTitle; ?></h1>				
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">						
							<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php print $customVideoURL; ?>" frameborder="0" allowfullscreen></iframe>
							<h2><?php print $customVideoTitle; ?></h2>
						</div>						
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-md-5 col-sm-12 col-xs-12">
									<img src="<?php bloginfo('template_url');?>/img/plumber.png" alt="Plumber">
								</div>
								<div class="col-md-7 col-sm-12 col-xs-12">
									<h3><?php print $customHeadingFirst; ?></h3>
									<p><?php print $customSpecialistContent1; ?></p>
									<h3><?php print $customHeadingSecond; ?></h3>
									<p><?php print $customSpecialistContent2; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- specialists -->
			<section class="location">
				<div class="main-page">
					<h1><?php print $customLocationSectionTitle; ?></h1>
					<h3><?php print $customLocationSectionMoto; ?></h3>
					<h3 id="address"><?php print $customLocationSectionAddress; ?></h3>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d180359.33902885753!2d-117.04982987349801!3d32.86319836298166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dbfbbbcc48e323%3A0x6eca4738cd54b15c!2s12147+Kirkham+Rd%2C+Poway%2C+CA+92064!5e0!3m2!1sen!2s!4v1465565385053" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</section>
			<section class="carousel">
				<div class="main-page">
					<?php 
						$args = array(
							'post_type' =>'carousel',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'posts_per_page' => -1
						);
						$slides = new WP_Query($args);
					if ($slides->have_posts()) : ?>
					<div id="carousel-homepage" class="flexslider">					
						 <ul class="slides">
							<?php while ($slides->have_posts()):$slides->the_post(); ?>
						   <li>
							 <?php the_post_thumbnail('full'); ?>
						   </li>
						   <?php endwhile; ?>
						</ul>
					</div>	
					<?php endif;?>	
				</div>
			</section><!-- carousel -->
			<section class="bottom-info-bar">
				<div class="main-page">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php print $customMoto; ?></span>
							<span><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <a href="tel:<?php print $customPhoneNumber; ?>"><?php print $customPhoneNumber; ?></a></span>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<a class="blue-btn" href="<?php print $customButtonURL; ?>"><?php print $customButtonText ?></a>
						</div>
					</div>
				</div>
			</section><!-- bottom info bar -->
		</main>
	</div>
</div>
<?php

get_footer(); 