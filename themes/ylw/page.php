<?php
get_header('banner'); 
while( have_posts() ): the_post();
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
get_template_part('templates/page', 'banner');
?>
<?php the_content(); ?>
<?php get_template_part('templates/footer', 'top'); ?>
<?php endwhile; ?>
<?php get_footer(); ?>