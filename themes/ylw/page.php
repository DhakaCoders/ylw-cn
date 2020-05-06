<?php
get_header(); 
while( have_posts() ): the_post();
$thisID = get_the_ID();
?>
<section class="ylw-customer-faq-sec-wrp page-wrapp">  
<div class="container">
 <div class="row">
   <div class="col-sm-12">
     <div id="items-content">
        <div class="ylw-customer-head">
          <h1 class="ylw-customer-title"><?php the_title(); ?></h1>
        </div>
        <div class="policy-inner page-inner clearfix">
			<?php the_content(); ?>
     	</div>
    </div>
   </div>
 </div> 
</div>
</section>
<?php get_template_part('templates/footer', 'top'); ?>
<?php endwhile; ?>
<?php get_footer(); ?>