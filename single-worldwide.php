<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dazzling
 */

get_header(); ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8 dfgfdgd <?php echo of_get_option( 'site_layout', 'no entry' ); ?>">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<p><?php the_post_thumbnail('full'); ?></p>
			<?php the_content(); ?>
		    <?php $child_posts = types_child_posts("photo"); ?>
			<?php if( $child_posts ) : ?>		    

				<div class="jssor-slider">
				    <!-- Slides Container -->
				    <div u="slides" data-count="<?php echo count($child_posts); ?>">
						<?php
							
							foreach ($child_posts as $child_post) {
						?>

							<div>
								<img u="image" src="<?php echo $child_post->fields['image']; ?>" alt="">
		                		<div class="caption"><?php echo $child_post->fields['caption']; ?></div>
		
							</div>

						<?php } ?>
				    </div>

					<!--#region Bullet Navigator Skin Begin -->
					<!-- bullet navigator container -->
					<div u="navigator" class="jssorb06" style="bottom: 16px; right: 6px;">
					    <!-- bullet navigator item prototype -->
					    <div u="prototype"></div>
					</div>
					<!--#endregion Bullet Navigator Skin End -->
				    
			        <!-- Arrow Left -->
			        <span u="arrowleft" class="jssora09l" style="top: 123px; left: 8px;">
			        </span>
			        <!-- Arrow Right -->
			        <span u="arrowright" class="jssora09r" style="top: 123px; right: 8px;">
			        </span>


				</div>
				<p class="slider-caption">				
				</p>

			<?php endif; ?>
			
		    <?php echo types_render_field("credits"); ?>


			<?php journal_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>