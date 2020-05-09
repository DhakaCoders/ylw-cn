<?php get_header('home'); ?>
<?php
  $showhidintro = get_field('showhidintro', HOMEID);
  if( $showhidintro ):
    $introh = get_field('introsec', HOMEID);
    $categories =  $introh['categories'];
?>
<section class="hm-children-clothes-sec">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hm-children-clothes-sec-hdr">
            <?php 
              if( !empty($introh['title']) ) printf('<h3 class="hmccs-hdr-title">%s</h3>', $introh['title']);
            ?>
          </div>
        </div>
      </div>
  </div>
  <?php if($categories): ?>
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-children-clothes-sec-grds">
          <ul class="reset-list">
            <?php foreach( $categories as $cat ): ?>
            <li>
              <div class="hm-children-clothes-fea-box">
                <?php if(!empty($cat['image'])): ?>
                <div class="hm-children-clothes-fea-box-img bg-inline" style="background: url(<?php echo cbv_get_image_src($cat['image'], 'hcat'); ?>);"></div>
                <?php endif; ?>
                <div class="hm-children-clothes-fea-box-des">
                  <div class="hover-before">
                    <?php 
                      if( !empty($cat['title']) ) printf('<div><strong class="hccfbd-title">%s</strong></div>', $cat['title']);
                    ?>
                  </div>
                  <div class="hover-after">
                    <div>
                    <?php 
                      if( !empty($cat['title']) ) printf('<strong class="hccfbd-title">%s</strong>', $cat['title']);
                    ?>
                      <div class="children-option">
                      <?php 
                        $link1 = $cat['link_1'];
                        $link2 = $cat['link_2'];
                        if( is_array( $link1 ) &&  !empty( $link1['url'] ) ){
                          printf('<span><a href="%s" target="%s">%s</a></span>', $link1['url'], $link1['target'], $link1['title']); 
                        }
                        if( is_array( $link2 ) &&  !empty( $link2['url'] ) ){
                          printf('<span><a href="%s" target="%s">%s</a></span>', $link2['url'], $link2['target'], $link2['title']); 
                        }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php endif ;?>
</section>
<?php endif; ?>

<?php
  $showhidesec1 = get_field('showhidesec1', HOMEID);
  if( $showhidesec1 ):
    $sec1 = get_field('sec1', HOMEID);
?>
<section class="hm-about-us-section">
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-about-us-sec-inr">
          <div class="hm-about-us-sec-cntlr clearfix">
            <div class="hm-about-us-sec-col-1">
              <img src="<?php echo THEME_URI; ?>/assets/images/logo-black-2.png">
            </div>
            <div class="hm-about-us-sec-col-2">
              <?php 
                if( !empty($sec1['title']) ) printf('<h3 class="hausc-title">%s</h3>', $sec1['title']);
                if( !empty($sec1['subtitle']) ) printf('<strong class="hausc-title-2">%s</strong>', $sec1['subtitle']);
                if( !empty($sec1['description']) ) echo wpautop( $sec1['description'] );
              ?>
              <?php 
                $alink = $sec1['link'];
                if( is_array( $alink ) &&  !empty( $alink['url'] ) ){
                  printf('<a class="transparent-btn" href="%s" target="%s">%s</a>', $alink['url'], $alink['target'], $alink['title']); 
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>

<?php
  $showhidesec2 = get_field('showhidesec2', HOMEID);
  if( $showhidesec2 ):
    $sec2 = get_field('sec2', HOMEID);
    $productIDS = $sec2['select_products'];
?>
<section class="hm-new-arrivals-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-new-arrivals-sec-hdr">
          <?php if( !empty($sec2['title']) ) printf('<h3 class="hnash-title">%s</h3>', $sec2['title']); ?>
          <div class="fl-prv-nxt">
            <span class="fl-prev"></span>
            <span class="fl-next"></span>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <?php 
  if( !empty($productIDS) ){
    $count = count($productIDS);
    $pIDS = ( $count > 1 )? $productIDS: $productIDS;
    $pQuery = new WP_Query(array(
      'post_type' => 'product',
      'posts_per_page'=> $count,
      'post__in' => $pIDS,
      'orderby' => 'date',
      'order'=> 'desc',

    ));
        
  }else{
    $pQuery = new WP_Query(array(
      'post_type' => 'product',
      'posts_per_page'=> 8,
      'orderby' => 'date',
      'order'=> 'desc',

    ));
  }
  if( $pQuery->have_posts() ):
  ?>
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-new-arrivals-sec-cntlr hmNewAarrivalsSlider">
          <?php 
            while($pQuery->have_posts()): $pQuery->the_post(); 
            global $product, $woocommerce, $post;
              echo '<div class="hm-new-arrivals-item">';
              echo '<div class="fl-product-item">';
              wc_stock_manage();
              echo '<div class="fl-product-item-fea-img">';
              echo '<a href="'.get_permalink( $product->get_id() ).'">';
              echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' );
              echo '</a>';
              echo '<div class="product-overlay-icons">';
              get_wish_thumb();
              echo '<a href="#" class="product-overlay-icon-search yith-wcqv-button" data-product_id="'.$product->get_id().'"><i class="fas fa-search"></i></a>';
              echo '</div>';
              echo '</div>';
              echo '<div class="fl-product-item-des mHc">';
              echo '<strong class="fl-product-variable-title">NEW</strong>';
              echo '<h6 class="fl-product-title"><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h6>';
              echo '<div class="fl-product-box-prices">';
              echo '<div class="fl-product-regular-price">'.$product->get_price_html().'</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';  
           endwhile; 
          ?>

        </div>
      </div>
      <div class="col-md-12">
        <div class="gray-transparent-btn">
          <?php 
            $plink = $sec2['link'];
            if( is_array( $plink ) &&  !empty( $plink['url'] ) ){
              printf('<a href="%s" target="%s">%s</a>', $plink['url'], $plink['target'], $plink['title']); 
            }
          ?>
        </div>
      </div>
    </div>
  </div>   
  <?php endif; wp_reset_postdata(); ?> 
</section>
<?php endif; ?>
<?php
  $showhidintro3 = get_field('showhidintro3', HOMEID);
  if( $showhidintro3 ):
    $sec3 = get_field('sec3', HOMEID);
    $colleft = $sec3['colleft'];
    $tabs = $sec3['colright'];
?>
<section class="gift-ideas-sec bg-inline">
  <div class="container-md">
    <div class="row">
      <div class="col-md-12">
        <div class="clearfix gift-ideas-sec-cntlr">
           <div class="gift-ideas-sec-rgt">
            <?php if( !empty($tabs) ): ?>
            <?php $i = 1; foreach( $tabs as $tab ): ?>
            <div class="ylw-slide-tab-con" id="tab-<?php echo $i; ?>">
            <?php if( $tab['slides'] ): ?>
            <div class="gift-ideas-sec-fea-img-bx giftIdeasSecFeaImgSlider">
              <?php foreach( $tab['slides'] as $cslide ): ?>
              <div class="gift-ideas-sec-fea-img-bx-item">
                <?php if(!empty($cslide['link'])): ?>
                <a href="<?php echo $cslide['link']; ?>" class="overlay-link"></a>
                <?php endif; ?>
                <?php if(!empty($cslide['image'])): ?>
                <div class="bg-inline" style="background: url(<?php echo cbv_get_image_src($cslide['image']); ?>);"></div>
                <?php endif; ?>
              <?php if( !empty($cslide['title']) ) printf('<strong>%s</strong>', $cslide['title']); ?>
              </div>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
            </div>
            <?php $i++; endforeach; ?>
            <?php endif; ?>
          </div>
          <div class="gift-ideas-sec-lft clearfix">
            <div class="gift-ideas-sec-lft-top-con-cntlr">
              <div class="gift-ideas-sec-lft-top-con clearfix">
                <div>
                  <img src="<?php echo THEME_URI; ?>/assets/images/logo-black-3.png">
                </div>
                <?php if( !empty($colleft['title']) ) printf('<h4 class="gift-ideas-title">%s</h4>', $colleft['title']); ?>
              </div>
              <div class="gift-ideas-sec-lft-top-con-rgt">
                <?php if( !empty($colleft['description']) ) echo wpautop( $colleft['description'] ); ?>
              </div>
            </div>
            <?php 
              if( $tabs ):
            ?>
            <div class="ift-ideas-sec-lft-btns">
              <ul class="reset-list ylw-slide-tabs-menu">
                <?php foreach( $tabs as $tab ): ?>
                <?php 
                  if( !empty($tab['title']) ){
                    printf('<li class="fl-tab-item"><a href="#">%s</a></li>', $tab['title']);
                  }
                ?>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          </div>
         
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>
<?php
  $showhidesec4 = get_field('showhidesec4', HOMEID);
  if( $showhidesec4 ):
    $sec4 = get_field('sec4', HOMEID);
    $pproductIDS = $sec4['select_products'];
?>
<section class="hm-happy-easter-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-happy-easter-sec-hdr bg-inline">
          <?php if(!empty($sec4['image'])): ?>
          <span class="hm-happy-easter-sec-hdr-img">
            <?php echo cbv_get_image_tag($sec4['image']); ?>
            </span>
          <?php endif; ?>
          <div class="hm-happy-easter-sec-hdr-inr">
            <div class="hm-happy-easter-sec-hdr-cntlr">
              <?php 
                if( !empty($sec4['title']) ) printf('<h2 class="hhesh-title">%s</h2>', $sec4['title']);
                if( !empty($sec4['description']) ) echo wpautop( $sec4['description'] );
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <?php 
  if( !empty($pproductIDS) ){
    $pcount = count($pproductIDS);
    $ppIDS = ( $pcount > 1 )? $pproductIDS: $pproductIDS;
    $ppQuery = new WP_Query(array(
      'post_type' => 'product',
      'posts_per_page'=> $pcount,
      'post__in' => $ppIDS,
      'orderby' => 'date',
      'order'=> 'desc',

    ));
        
  }else{
    $ppQuery = new WP_Query(array(
      'post_type' => 'product',
      'posts_per_page'=> 4,
      'orderby' => 'date',
      'order'=> 'desc',

    ));
  }
  if( $ppQuery->have_posts() ):
  ?>
  <div class="hm-happy-easter-products">
    <div class="container-xlg">
      <div class="row">
        <div class="col-md-12">
          <div class="hm-happy-easter-products-cntlr">
            <ul class="reset-list">
            <?php  
              while($ppQuery->have_posts()): $ppQuery->the_post(); 
              global $product, $woocommerce, $post;
            ?>
              <li>
                <?php 
                  echo '<div class="fl-product-item">';
                  wc_stock_manage();
                  echo '<div class="fl-product-item-fea-img">';
                  echo '<a href="'.get_permalink( $product->get_id() ).'">';
                  echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' );
                  echo '</a>';
                  echo '<div class="product-overlay-icons">';
                  get_wish_thumb();
                  echo '<a href="#" class="product-overlay-icon-search yith-wcqv-button" data-product_id="'.$product->get_id().'"><i class="fas fa-search"></i></a>';
                  echo '</div>';
                  echo '</div>';
                  echo '<div class="fl-product-item-des mHc">';
                  echo '<strong class="fl-product-variable-title">NEW</strong>';
                  echo '<h6 class="fl-product-title"><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h6>';
                  echo '<div class="fl-product-box-prices">';
                  echo '<div class="fl-product-regular-price">'.$product->get_price_html().'</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                ?>
              </li>
            <?php endwhile; ?>
            </ul>
            <div class="hm-happy-easter-more-btn gray-transparent-btn">
              <?php 
                $pplink = $sec4['link'];
                if( is_array( $pplink ) &&  !empty( $pplink['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $pplink['url'], $pplink['target'], $pplink['title']); 
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>  
  <?php endif; wp_reset_postdata(); ?> 
</section>
<?php endif; ?>

<?php
  $showhidesec5 = get_field('showhidesec5', HOMEID);
  if( $showhidesec5 ):
    $sec5 = get_field('sec5', HOMEID);
?>
<section class="hm-press-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-press-sec-cntlr clearfix">
          <?php if(!empty($sec5['image'])): ?>
          <div class="press-sec-fea-img">
            <?php echo cbv_get_image_tag($sec5['image']); ?>
          </div>
          <?php endif; ?>
          <div class="press-sec-des">
            <div class="press-sec-des-inr">
              <?php 
                $sectitle = $sec5['titlesec'];
                if( !empty($sectitle['title']) ) printf('<h2 class="press-sec-des-title">%s</h2>', $sectitle['title']);
                if( !empty($sectitle['subtitle']) ) printf('<h4 class="press-sec-des-sub-title">%s</h4>', $sectitle['subtitle']);
                if( !empty($sec5['description']) ) echo wpautop( $sec5['description'] );
              ?>
              <?php 
                $prlink = $sec5['link'];
                if( is_array( $prlink ) &&  !empty( $prlink['url'] ) ){
                  printf('<a class="white-transparent-btn" href="%s" target="%s">%s</a>', $prlink['url'], $prlink['target'], $prlink['title']); 
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="logo-black-4">
    <img src="<?php echo THEME_URI; ?>/assets/images/logo-black-4.png">
  </div>   
</section>
<?php endif; ?>
<?php
  $showhidesec6 = get_field('showhidesec6', HOMEID);
  if( $showhidesec6 ):
    $sec6 = get_field('sec6', HOMEID);
?>
<section class="hm-our-journal-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-our-journal-sec-cntlr">
          <div class="hm-our-journal-sec-hdr">
            <?php if( !empty($sec6['title']) ) printf('<h3 class="hojs-tilte">%s</h3>', $sec6['title']); ?>
          </div>
          <?php 
          $query = new WP_Query(array( 
              'post_type'=> 'post',
              'post_status' => 'publish',
              'posts_per_page' => 3,
              'orderby' => 'rand',
              'order'=> 'desc',
              'date_query' => array(
                  array(
                      'after' => '2 week ago'
                  )
              )
            ) 
          );
          if($query->have_posts()):
          ?>
          <div class="hm-our-journal-sec-grd-cntlr">
            <ul class="reset-list clearfix">
              <?php 
                while($query->have_posts()): $query->the_post();
                  $attach_id = get_post_thumbnail_id(get_the_ID());
                  $feaimg_src = '';
                  if( !empty($attach_id) ){
                    $feaimg_src = cbv_get_image_src($attach_id, 'bloggrid');
                  }
                  else{
                    $feaimg_src = THEME_URI.'/assets/images/ylw-blog-grid-item-img-3.png';
                  }
              ?>
              <li>
                <div class="fl-blog-item">
                  <div class="fl-blog-item-fea-img-cntlr">
                    <div class="fl-blog-item-fea-img">
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $feaimg_src; ?>" alt="<?php the_title(); ?>">
                      </a>
                    </div>
                  </div>
                  <div class="fl-blog-item-des mHc">
                    <strong><?php echo get_the_date('d M Y'); ?></strong>
                    <h4 class="fl-blog-item-des-title mHc1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php the_excerpt(); ?>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
            </ul>
            <div class="hm-our-journal-more-btn gray-transparent-btn">
              <?php 
                $nlink = $sec6['link'];
                if( is_array( $nlink ) &&  !empty( $nlink['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $nlink['url'], $nlink['target'], $nlink['title']); 
                }
              ?>
            </div>
          </div>
          <?php endif; wp_reset_postdata(); ?> 
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>