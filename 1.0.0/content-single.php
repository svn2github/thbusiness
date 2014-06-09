<?php
/**
 * @package thbusiness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php thbusiness_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php thbusiness_featured_image(); ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'thbusiness' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer-insinglepost">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'thbusiness' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'thbusiness' ) );

			if ( ! thbusiness_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="tags-links"> %2$s </span><span class="th-post-permalink"><a href="%3$s" rel="bookmark">Permalink</a></span>', 'thbusiness' );
				} else {
					$meta_text = __( '<span class="th-post-permalink"><a href="%3$s" rel="bookmark">Permalink</a></span>', 'thbusiness' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="cat-links"> %1$s </span><span class="tags-links"> %2$s </span><span class="th-post-permalink"><a href="%3$s" rel="bookmark">Permalink</a></span>', 'thbusiness' );
				} else {
					$meta_text = __( '<span class="cat-links"> %1$s </span><span class="th-post-permalink"><a href="%3$s" rel="bookmark">Permalink</a></span>', 'thbusiness' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'thbusiness' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
