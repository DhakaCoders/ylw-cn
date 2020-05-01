<?php
/*
  Template Name: Customer Care
*/
get_header(); 
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
$terms = $intro['terms'];

?>
<section class="ylw-customer-care-sec-wrp">  
   <div class="container">
     <div class="row">
       <div class="col-sm-12">
         <div id="items-content">
            <div class="ylw-customer-head">
              <?php if(!empty($intro['title'])) printf('<h1 class="ylw-customer-title">%s</h1>', $intro['title']); ?>
            </div>
            <?php if($terms): ?>
            <div class="policy-inner clearfix">
              <div id="sidebar">
                <div class="tcheadings sidebar__innner clearfix">
                   <div class="ylw-customer-menu">
                     <h2 class="ylw-customer-menu-title"><?php echo get_the_title( $thisID ); ?></h2>
                     <ul id="scrollToAarea">
                      <?php 
                        foreach($terms as $term):
                        $slug = str_replace(' ', '', $term['title']);
                        $slug = preg_replace('/[^A-Za-z0-9]/', '', $slug);
                      ?>
                       <li>
                         <a href="#<?php echo $slug;?>"><?php if( !empty( $term['title'] ) ) printf( '%s', $term['title']); ?></a>
                       </li>
                       <?php endforeach; ?>
                     </ul>
                   </div>
                 </div>
              </div>
              <div class="itemsipcontent">
               <div class="item-dsce">
                <?php 
                  foreach($terms as $term):
                  $slug = str_replace(' ', '', $term['title']);
                  $slug = preg_replace('/[^A-Za-z0-9]/', '', $slug);
                ?>
                 <div id="<?php echo $slug;?>" class="item-cont">
                  <?php  
                    if( !empty( $term['description'] ) ) echo wpautop($term['description']);
                  ?>
                 </div>
                 <?php endforeach; ?>
              </div>
            </div>
         </div>
         <?php endif; ?>
        </div>
       </div>
     </div> 
   </div>
</section><!-- end of .policy-page-sec-->
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>