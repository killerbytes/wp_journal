<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dazzling
 */


if ( ! function_exists( 'journal_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function journal_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'dazzling' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<i class="fa fa-chevron-left"></i> Older posts', 'Previous post link', 'dazzling' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( 'Newer posts <i class="fa fa-chevron-right"></i>', 'Next post link',     'dazzling' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->



	<?php
}
endif;

