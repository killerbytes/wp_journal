<?php
/*
	Template Name: Worldwide Template
*/

get_header(); ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8">
		<main id="main" class="site-main" role="main">


			<h1 class="widget-title"><?php _e( 'Nueva Ecija Worldwide', 'dazzling' ); ?></h1>
			<?php while ( have_posts() ) : the_post(); ?>

			<h4 class="widget-sub-title"><?php the_content(); ?></h4>

			<?php endwhile; // end of the loop. ?>

			<?php 


				$args = array(
					'post_type' => 'worldwide',
			        'posts_per_page' => -1,
			        'orderby' => 'date',
			        'order' => 	'DESC',
				);

				$query = new WP_Query( $args );

			?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>


				<hr>
				<?php get_sidebar( 'home' ); ?>
	
			<?php endwhile; // end of the loop. ?>

	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

