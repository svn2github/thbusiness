<?php
/**
 * The Template for displaying all single posts.
 *
 * @package thbusiness
 */

get_header(); ?>
<div class="col-xs-12 col-sm-12 col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php thbusiness_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .col-xs-12 col-sm-6 col-md-8 -->
<div class="col-xs-12 col-sm-6 col-md-4">
	<?php get_sidebar(); ?>
</div><!-- .col-xs-12 .col-sm-6 .col-md-4 -->
<?php get_footer(); ?>