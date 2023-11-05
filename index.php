<?php get_header(); ?>

<div id="page" class="site grid-container container hfeed grid-parent">
   <div id="content" class="site-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <?php colimatic_pagination(); ?>
        <?php else : ?>
        <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
   </div>
</div>

<?php get_footer(); ?>
