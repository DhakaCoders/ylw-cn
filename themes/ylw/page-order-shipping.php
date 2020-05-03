<?php 
/*
Template Name: Order & Shipping
*/
get_header(); 
$thisID = get_the_ID();
while( have_posts() ): the_post();
?>
<section class="ylw-customer-care-sec-wrp">  
   <div class="container">
     <div class="row">
       <div class="col-sm-12">
         <div id="items-content">
            <div class="ylw-customer-head">
              <h1 class="ylw-customer-title"><?php the_title(); ?></h1>
            </div>
            <div class="policy-inner clearfix">
              <div id="sidebar">
                <div class="tcheadings sidebar__innner clearfix">
                   <div class="ylw-customer-menu">
                    <?php 
                    _e('<h2 class="ylw-customer-menu-title">Customer Care</h2>', THEME_NAME);
                    $sidebarOptions = array( 
                        'theme_location' => 'cbv_sidebar_menu', 
                        'menu_class' => 'clearfix',
                        'menu_id' => 'scrollToAarea',
                        'container' => 'nav',
                        'container_class' => 'nav'
                      );
                    wp_nav_menu( $sidebarOptions );
                    ?>
                   </div>
                 </div>
              </div>
              <div class="itemsipcontent">
               <div class="item-dsce">
                 <?php the_content(); ?>
              </div>
            </div>
         </div>
        </div>
       </div>
     </div> 
   </div>
</section><!-- end of .policy-page-sec-->
<?php endwhile; ?>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>