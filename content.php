<h2>
  <?php the_title(); ?>
</h2>
<p>
  <?php
          if ( has_post_thumbnail() )
          the_post_thumbnail( 'large' );
        ?>
</p>

<?php the_content(); ?>

<small>Published on
<?php the_time('F j, Y'); ?>
</small>
