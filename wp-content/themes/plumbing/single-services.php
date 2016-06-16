<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Plumbing
 */
 
 	$customPhoneNumber = esc_attr(get_option('phone_number'));
	$customMoto = esc_attr(get_option('custom_moto'));
	$customButtonURL = esc_attr(get_option('button_url'));
	$customButtonText = esc_attr(get_option('button_text'));

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-services', get_post_format() );

			endwhile; // End of the loop.
			?>
			</section><!-- form -->
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
			</section><!-- bottom info bar -->
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
