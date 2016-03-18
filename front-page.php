<?php

    if ( get_option( 'show_on_front' ) == 'posts' ) {
        get_template_part( 'index' );
    } elseif ( 'page' == get_option( 'show_on_front' ) ) {

get_header(); ?>

<?php dazzling_featured_slider(); ?>
<?php dazzling_call_for_action(); ?>

<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8">
		<main id="main" class="site-main" role="main">

			<h1 class="widget-title"><?php _e( 'Headliners', 'dazzling' ); ?></h1>
			<?php while ( have_posts() ) : the_post(); ?>

			<h4 class="widget-sub-title"><?php the_content(); ?></h4>

			<?php endwhile; // end of the loop. ?>

			<?php 
				global $wp_query, $paged;
				// $query= null;
				// $wp_query->query('showposts=5'.'&paged='.$paged);
				if( get_query_var('paged') ) {
			        $paged = get_query_var('paged');
			    }else if ( get_query_var('page') ) {
			        $paged = get_query_var('page');
			    }else{
			        $paged = 1;
			    }

				$wp_query = null;

				$args = array(
					'post_type' => 'post',
			        'orderby' => 'date',
			        'order' => 	'DESC',
			        'paged' => $paged
				);

				$wp_query = new WP_Query( $args );

			?>
	
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

				<?php include(locate_template('partial-media.php')); ?>
				<?php get_sidebar( 'home' ); ?>
	
			<?php endwhile; // end of the loop. ?>


	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'dazzling' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"> <?php next_posts_link( __( '<i class="fa fa-chevron-left"></i> Older posts', 'dazzling' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <i class="fa fa-chevron-right"></i>', 'dazzling' ) ); ?> </div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->



		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php
	get_footer();
}
?>