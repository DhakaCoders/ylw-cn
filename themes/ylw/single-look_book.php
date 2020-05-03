<?php 
get_header(); 
$thisID = 391;
$currentID = get_the_ID();
$desc = get_field('description', $currentID);
?>
<section class="ylw-gallery-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-lb-tabs-wrp">
          <div class="ylw-lb-tabs-head">
            <h1 class="ylw-lb-tabs-head-title"><?php echo get_the_title($thisID); ?></h1>
          </div>
          <div class="ylw-lb-tabs">
            <?php 
              $query = new WP_Query(array( 
                'post_type'=> 'look_book',
                'post_status' => 'publish',
                'posts_per_page' => -1
                ) 
              );
            ?>
            <?php if($query->have_posts()): ?>
            <ul class="ulc ylw-lb-tabs-menu clearfix">
              <?php while($query->have_posts()): $query->the_post(); ?>
              <li <?php echo ( $currentID == get_the_ID() )? 'class="active"': ''; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
              <?php endwhile; ?>
            </ul>
            <?php 
              endif;  
              wp_reset_postdata();
            ?>
            <?php if( !empty($desc) ): ?>
            <div class="ylw-lb-tabs-dsc">

              <div class="ylw-tabs-cont">
                <?php echo wpautop($desc); ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
while( have_posts() ): the_post();
  if(have_rows('images_grid')){ 
?>
  <div class="container-xlg">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-gallery-grid-wrp">
        <?php 
          while ( have_rows('images_grid') ) : the_row(); 
          if ( get_row_layout() == 'grid_one_image' ){
              $fc_iamge1 = get_sub_field('fc_image');
              if( !empty($fc_iamge1) ):
              ?>
                <div class="ylw-gallery-grid-one">
                  <div class="ylw-gallery-grid-one-img">
                    <a href="#">
                      <?php echo cbv_get_image_tag($fc_iamge1);?>
                    </a>
                  </div>
                </div>
              <?php
              endif;
          }elseif ( get_row_layout() == 'grid_two_image' ){
              $grid = get_sub_field('grid');
              $fc_iamge2 = get_sub_field('fc_image1');
              $fc_iamge3 = get_sub_field('fc_image2');
              ?>
              <?php if( $grid == 2 ){ ?>
              <div class="ylw-gallery-grid-two clearfix">
                <?php if( !empty($fc_iamge2) ): ?>
                <div class="ylw-gallery-grid-two-lft-img">
                  <a href="#">
                    <?php echo cbv_get_image_tag($fc_iamge2);?>
                  </a>
                </div>
                <?php 
                  endif;
                  if( !empty($fc_iamge3) ): 
                ?>
                <div class="ylw-gallery-grid-two-rgt-img">
                  <a href="#">
                    <?php echo cbv_get_image_tag($fc_iamge3);?>
                  </a>
                </div>
                <?php endif; ?>
              </div>
            <?php }else{ ?>
                <div class="ylw-gallery-grid-two-btm clearfix">
                  <?php if( !empty($fc_iamge2) ): ?>
                  <div class="ylw-gallery-grid-two-btm-lft">
                    <div class="ylw-gallery-grid-two-btm-lft-img">
                      <a href="#">
                        <?php echo cbv_get_image_tag($fc_iamge2);?>
                      </a>
                    </div>
                  </div>
                  <?php 
                    endif;
                    if( !empty($fc_iamge3) ): 
                  ?>
                  <div class="ylw-gallery-grid-two-btm-rgt">
                    <div class="ylw-gallery-grid-two-btm-rgt-img">
                      <a href="#">
                        <?php echo cbv_get_image_tag($fc_iamge3);?>
                      </a>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
            <?php } ?>
            <?php
          }elseif ( get_row_layout() == 'grid_three_image' ){
              $fc_iamge4 = get_sub_field('fc_image3');
              $fc_iamge5 = get_sub_field('fc_image4');
              $fc_iamge6 = get_sub_field('fc_image5');
              
              ?>
              <div class="ylw-gallery-grid-three clearfix">
                <?php if( !empty($fc_iamge4) ): ?>
                <div class="ylw-gallery-grid-three-lft">
                  <div class="ylw-gallery-grid-three-lft-img">
                    <a href="#">
                      <?php echo cbv_get_image_tag($fc_iamge4);?>
                    </a>
                  </div>
                </div>
                <?php endif; if( !empty($fc_iamge5) ): ?>
                <div class="ylw-gallery-grid-three-rgt clearfix">
                  <div class="ylw-gallery-grid-three-rgt-l-img">
                    <a href="#">
                      <?php echo cbv_get_image_tag($fc_iamge5);?>
                    </a>
                  </div>
                  <?php endif; if( !empty($fc_iamge6) ): ?>
                  <div class="ylw-gallery-grid-three-rgt-r-img">
                    <a href="#">
                      <?php echo cbv_get_image_tag($fc_iamge6);?>
                    </a>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php
          }
        endwhile;
        ?>

        </div>
      </div>
    </div>
  </div>
<?php } endwhile; ?>
</section>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>