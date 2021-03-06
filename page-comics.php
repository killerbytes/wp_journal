<?php
/*
	Template Name: Comics Template
*/

get_header(); ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8">
		<main id="main" class="site-main" role="main">


			<h1 class="widget-title"><?php _e( 'Comics', 'dazzling' ); ?></h1>
			<?php while ( have_posts() ) : the_post(); ?>

			<h4 class="widget-sub-title"><?php the_content(); ?></h4>

			<?php endwhile; // end of the loop. ?>


	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

