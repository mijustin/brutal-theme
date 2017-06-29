<?php get_header(); ?>

<article<?php if(is_single()) { ?> class="red"<?php } ?>>
		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( 'content', get_post_format() );

		endwhile; endif;
		?>
</article>

<?php get_footer(); ?>
