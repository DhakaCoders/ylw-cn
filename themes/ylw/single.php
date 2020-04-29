<?php
/*
  Template Name: About
*/
get_header(); 
$thisID = get_option( 'page_for_posts' );
$intro = get_field('introsec', $thisID);
$standaardbanner = get_field('pagebanner', $thisID);
if( empty($standaardbanner) ) $standaardbanner = THEME_URI.'/assets/images/page-bnr.jpg';
?>
<section class="page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo $standaardbanner; ?>);">
    </div>
    <div class="page-banner-des">
        <div>
          <h1 class="page-banner-title"></h1>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->
<?php while( have_posts() ): the_post(); ?>
<section class="ylw-blog-article-cnt-sec">
  <div class="container-md">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-blog-article-cnt-sec-inr">
          <div class="ylw-blog-article-cnt-sec-backlink">
            <a href="<?php echo get_permalink( $thisID );?>">BLOG</a>
          </div>
          <div class="ylw-blog-article-cnt-sec-title">
            <h3 class="ylw-blog-article-cnt-sec-des-title"><?php the_title(); ?></h3>
          </div>
          <?php 
            while ( have_rows('content') ) : the_row();
              if( get_row_layout() == 'image' ){
                  $fc_image = get_sub_field('fc_image');
                  if( !empty( $fc_image ) ){
                    printf('<div class="ylw-blog-article-cnt-sec-img">%s</div>', cbv_get_image_tag($fc_image));
                  }  
              } elseif ( get_row_layout() == 'teksteditor' ){
                  $beschrijving = get_sub_field('fc_teksteditor');
                  echo '<div class="ylw-blog-article-cnt-sec-des">';
                    if( !empty( $beschrijving ) ) echo wpautop($beschrijving);
                  echo '</div>';    
              } elseif ( get_row_layout() == 'gallery' ){
              $gallery_cn = get_sub_field('image');
              $lightbox = get_sub_field('lightbox');
              $kolom = get_sub_field('column');
              if( $gallery_cn ):
              echo "<div class='ylw-blog-article-btm-cnt-sec-img'><ul class='reset-list clearfix gallery gallery-columns-{$kolom}'>";
                foreach( $gallery_cn as $image ):
                $imgsrc = cbv_get_image_src($image['ID'], 'gallerygrid');  
                echo '<li class="gallery-item"><div class="ylw-blog-article-btm-cnt-sec-img-grid" style="background: url('.$imgsrc.');">';
                if( $lightbox ) echo "<a data-fancybox='gallery' href='{$image['url']}'>";
                if( $lightbox ) echo "</a>";
                echo "</div></li>";
                endforeach;
              echo "</ul></div>";
              endif;      
            }
            endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ylw-blog-article-social-media-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-blog-article-social-media-sec-inr">
          <span>Share this Article</span>
          <ul class="reset-list">
            <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-article-facebook.png"></a></li>
            <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-article-instagram.png"></a></li>
            <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-article-twiter.png"></a></li>
            <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-article-envolve.png"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<section class="ylw-blog-article-grid-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-blog-article-grid-sec-inr">
          <h3 class="ylw-blog-article-grid-sec-title">Read also..</h3>
          <ul class="reset-list clearfix">
            <li>
              <div class="ylw-blog-grid-item">
                <div class="ylw-blog-grid-item-img-ctlr">
                  <a href="#" class="overlay-link"></a>
                  <div class="ylw-blog-grid-item-img" style="background: url('<?php echo THEME_URI; ?>/assets/images/ylw-blog-grid-item-img-1.png');">
                    
                    <!-- <img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-grid-item-img-1.png"> -->
                  </div>
                </div>
                <div class="ylw-blog-grid-item-des mHc">
                  <div class="ylw-blog-grid-item-des-inr">
                    <span>04 JAN 2019</span>
                    <h5 class="ylw-blog-grid-item-des-title"><a href="#">The best materials for a kid’s bedroom lorem ipsum.</a></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum erat et lacus fermentum pulvinar.</p>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="ylw-blog-grid-item">
                <div class="ylw-blog-grid-item-img-ctlr">
                  <a href="#" class="overlay-link"></a>
                  <div class="ylw-blog-grid-item-img" style="background: url('<?php echo THEME_URI; ?>/assets/images/ylw-blog-grid-item-img-2.png');">
                    
                    <!-- <img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-grid-item-img-2.png"> -->
                  </div>
                </div>
                <div class="ylw-blog-grid-item-des mHc">
                  <div class="ylw-blog-grid-item-des-inr">
                    <span>04 JAN 2019</span>
                    <h5 class="ylw-blog-grid-item-des-title"><a href="#">The natural rubber for your baby is lorem ipsum door sit amen.</a></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum erat et lacus fermentum pulvinar.</p>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="ylw-blog-grid-item">
                <div class="ylw-blog-grid-item-img-ctlr">
                  <a href="#" class="overlay-link"></a>
                  <div class="ylw-blog-grid-item-img" style="background: url('<?php echo THEME_URI; ?>/assets/images/ylw-blog-grid-item-img-3.png');">
                    
                    <!-- <img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-grid-item-img-3.png"> -->
                  </div>
                </div>
                <div class="ylw-blog-grid-item-des mHc">
                  <div class="ylw-blog-grid-item-des-inr">
                    <span>04 JAN 2019</span>
                    <h5 class="ylw-blog-grid-item-des-title"><a href="#">Yell-oh! team recommends organic cotton lorem ipsum.</a></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum erat et lacus fermentum pulvinar.</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <div class="ylw-blog-article-grid-sec-link">
            <a href="<?php echo get_permalink( $thisID );?>">discover YEll-OH! JOURNAL</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>