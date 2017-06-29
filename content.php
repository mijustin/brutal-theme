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

<small>Written by <a href="/?page_id=<?php echo $abt; ?>">
<?php the_author(); ?>
</a> on
<?php the_time('F j, Y'); ?>
</small>
