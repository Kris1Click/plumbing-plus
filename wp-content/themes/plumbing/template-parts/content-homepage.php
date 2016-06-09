<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OneClick Theme
 */

get_header(); ?>

<?php
	$customSectionTitle = esc_attr(get_option('section_title'));
	$customSectionPicOneTitle = esc_attr(get_option('section_pic_one_title'));
	$customSectionPicOneText = esc_attr(get_option('section_pic_one_text'));
	$customSectionPicTwoTitle = esc_attr(get_option('section_pic_two_title'));
	$customSectionPicTwoText = esc_attr(get_option('section_pic_two_text'));
	$customSectionPicThreeTitle = esc_attr(get_option('section_pic_three_title'));
	$customSectionPicThreeText = esc_attr(get_option('section_pic_three_text'));
	$customServicesTitle = esc_attr(get_option('services_section_title'));
	$customServicesContent = esc_attr(get_option('services_section_content'));
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
			<section class="our-services main-page">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h1><?php print $customServicesTitle; ?></h1>
						<p><?php print $customServicesContent; ?></p>
					</div>
				</div>
				<div id="section-home" class="section-services-holder">		
					<div class="row">
					<?php 
						$args = array( 'post_type' => 'services', 'posts_per_page' => 4, 'order' => 'ASC' );
						$query = new WP_Query( $args ); 
					?>
					<?php if ( $query->have_posts() ) : ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					
						<article class="col-md-6 col-sm-6 col-xs-12">
							<h2><?php the_title(); ?></h2>
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="col-md-6 col-xs-12">
									<?php the_content('Read more '); ?> 
								</div>
							</div>
						</article>
				
					<?php wp_reset_postdata(); ?>				
					<?php endwhile;?>
					<?php else:  ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>	</div>
				</div>
			</section><!-- services -->
			<section class="about main-page">
				<h1><?php print $customSectionTitle; ?></h1>
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12 about-section">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<a href="<?php echo get_option('home');?>" class="inactive-link"><img src="<?php bloginfo('template_url');?>/img/Professionals.png"></a>
								</div>
								<div class="col-md-7 col-xs-12">
									<h2><?php print $customSectionPicOneTitle; ?></h2>
									<p><?php print $customSectionPicOneText ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12 about-section">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<a href="<?php echo get_option('home');?>" class="inactive-link"><img src="<?php bloginfo('template_url');?>/img/Trusted.png"></a>
								</div>
								<div class="col-md-7 col-xs-12">
									<h2><?php print $customSectionPicTwoTitle; ?></h2>
									<p><?php print $customSectionPicTwoText; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<a href="<?php echo get_option('home');?>" class="inactive-link"><img src="<?php bloginfo('template_url');?>/img/Expert-Designers.png"></a>
								</div>
								<div class="col-md-7 col-xs-12">
									<h2><?php print $customSectionPicThreeTitle; ?></h2>
									<p><?php print $customSectionPicThreeText; ?></p>
								</div>
							</div>
						</div>	
					</div>
			</section><!-- about -->
			<section class="testimonials-carousel main-page">
				<?php 
					$args = array(
						'post_type' =>'carousel',
						'orderby' => 'menu_order',
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
			</section>
		</main>
	</div>
	
<?php

get_footer(); 