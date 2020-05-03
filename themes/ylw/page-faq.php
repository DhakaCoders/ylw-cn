<?php 
/*
Template Name: FAQ
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
              <?php 
                $srooms_query = new WP_Query(array( 
                  'post_type'=> 'faqs',
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'orderby' => 'date',
                  'order'=> 'desc'
                  ) 
                );
              ?>
              <?php if($srooms_query->have_posts()): ?>
                <?php while($srooms_query->have_posts()): $srooms_query->the_post(); ?>
                <div class="faq-accordion-tab-row">
                  <h6 class="faq-accordion-title"><?php the_title(); ?></h6>
                  <div class="faq-accordion-des">
                    <div>
                    <?php 
                    if(have_rows('content')){ 
                    while ( have_rows('content') ) : the_row(); 
                      if( get_row_layout() == 'teksteditor' ){
                          $beschrijving = get_sub_field('fc_teksteditor');
                          echo '<div class="faq-text clearfix">';
                            if( !empty( $beschrijving ) ) echo wpautop($beschrijving);
                          echo '</div>';    
                        }elseif( get_row_layout() == 'image_teksteditor' ){
                          $fc_iamge = get_sub_field('fc_image');
                          $fc_tekst = get_sub_field('tekst');
                          echo '<div class="faq-product-details-wrp clearfix">';
                          if( !empty($fc_iamge) ):
                            echo '<div class="faq-product-dts-img">';
                            echo cbv_get_image_tag($fc_iamge, 'dfpageg1');
                            echo '</div>';
                          endif;
                          echo '<div class="faq-product-dsc">';
                          echo wpautop($fc_tekst);
                          echo '</div>';
                          echo '</div>';      
                      }
                    endwhile;
                    ?>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <?php endwhile; ?>
                <?php 
                  endif;  
                  wp_reset_postdata();
                ?>
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