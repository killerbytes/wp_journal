<?php
/*
	Template Name: Gallery Template
*/

get_header(); ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8">
		<main id="main" class="site-main" role="main">


			<h1 class="widget-title"><?php _e( 'Gallery', 'dazzling' ); ?></h1>
			<?php while ( have_posts() ) : the_post(); ?>

				<h4 class="widget-sub-title"><?php the_content(); ?></h4>

			<?php endwhile; // end of the loop. ?>

			<?php 


				$args = array(
					'post_type' => 'gallery',
			        'posts_per_page' => -1,
			        'orderby' => 'date',
			        'order' => 	'DESC',
				);

				$query = new WP_Query( $args );

			?>
			<div class="row">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
						
						<div class="gallery-card">
							<a href="<?php the_permalink(); ?>">
							<h3 class="title-background"><?php echo the_title(); ?></h3>
							<h3><?php echo the_title(); ?></h3>
								<?php echo the_post_thumbnail(); ?>
							</a>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'dazzling' ),
									'after'  => '</div>',
								) );
							?>
							<?php edit_post_link( __( 'Edit', 'dazzling' ), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>						
						</div>
					</div><!-- #post-## -->
		
				<?php endwhile; // end of the loop. ?>
			</div>
	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

