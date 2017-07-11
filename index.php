<?php get_header(); ?>

<article>

		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'content', 'none' );
		endif; ?>

	</article><!-- #primary -->

<?php get_footer(); ?>
