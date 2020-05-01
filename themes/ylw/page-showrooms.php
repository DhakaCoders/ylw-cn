<?php 
/*
Template Name: Showrooms
*/
get_header(); 
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
?>
<section class="ylw-location-sec-wrp ylw-location-show-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-location-head">
          <?php 
            if( !empty($intro['title']) ) printf('<h1 class="ylw-location-head-title">%s</h1>', $intro['title'] );
            if(!empty($intro['description'])) echo wpautop( $intro['description'], true );
          ?>
        </div>
      </div>
    </div>
<?php 
  $srooms_query = new WP_Query(array( 
    'post_type'=> 'showrooms',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order'=> 'desc'
    ) 
  );
?>
<?php if($srooms_query->have_posts()): ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-location-grid-wrp clearfix">
          <ul class="clearfix ulc" id="maplocation" data-homeurl="<?php echo THEME_URI; ?>">
            <?php 
              $spacialArry = array( ".", "/", "+", " ", ")", "(" );$replaceArray = '';
              $emailspacialArry = array( "/" );
              $i = 1;
              while($srooms_query->have_posts()): $srooms_query->the_post();
                $showsec = get_field('introsec', get_the_ID());
                $gmaplink = !empty($showsec['googlemap_url'])?$showsec['googlemap_url']: 'javascript:void()';
                $show_telefoon = $showsec['telephone'];
                $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
            ?>
            <li>
              <div class="ylw-location-grid-inr clearfix">
                <div class="ylw-location-grid-lft">
                  <div class="ylw-location-grid-img">
                    <?php if( !empty($showsec['image']) ): ?>
                    <span data-fancybox="images" href="<?php echo cbv_get_image_src($showsec['image'],'bloggrid'); ?>">
                      <?php echo cbv_get_image_tag($showsec['image'],'bloggrid'); ?>
                    </span>
                    <?php endif; ?>
                    <a href="#">MORE PHOTOS</a>
                  </div>
                </div>
                <div class="ylw-location-grid-rgt">
                  <div class="ylw-location-grid-dsc">
                    <h2 class="ylw-location-grid-title"><?php the_title(); ?></h2>
                    <?php 
                    if(!empty($showsec['address'])) printf('<a href="%s"><i class="fas fa-map-marker-alt"></i>%s</a>', $gmaplink, $showsec['address']);
                    if(!empty($telefoon)) printf('<a href="tel:%s"><i class="fas fa-phone"></i>%s</a>', $telefoon, $show_telefoon);
                    ?>
                  </div>
                  <?php if( !empty($showsec['google_map']) ): $google_map = $showsec['google_map']; ?>
                  <div class="ylw-location-grid-map">
                    <div id="googlemap<?php echo $i; ?>" data-latitude="<?php echo $google_map['lat']; ?>" data-longitude="<?php echo $google_map['lng']; ?>"></div>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </li>
            <?php $i++; endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php 
      endif;  
      wp_reset_postdata();
    ?>
  </div>
</section>

<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>