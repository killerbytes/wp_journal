<?php
/*
	Template Name: Partial Result Template
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row">
	<?php if(has_post_thumbnail()) { ?>
	<div class="col-md-4 col-sm-4">
		<a href="<?php echo the_permalink(); ?>">
			<?php echo the_post_thumbnail('medium', array('class' => 'margin-bottom-20 img-responsive post-thumbnail')); ?>
		</a>
	</div>
	<?php } ?>
	<div class="<?php echo ( has_post_thumbnail() ? 'col-md-8 col-sm-8' : 'col-md-12 col-sm-12') ?>">
		<span><?php echo the_date(); ?></span>
		<h2 class="media-heading"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>

		<a class="btn pull-right" href="<?php the_permalink(); ?>">Read More</a>
	</div>
</div>


	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'dazzling' ),
			'after'  => '</div>',
		) );
	?>
	<?php edit_post_link( __( 'Edit', 'dazzling' ), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
<hr>
