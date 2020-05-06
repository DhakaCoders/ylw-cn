<?php 
get_header(); 
$thisID = 312;
$intro = get_field('introsec', $thisID);
?>
<section class="ylw-press-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-press-content-sec-inr">
          <?php 
            if( !empty($intro['title']) ) printf('<h2 class="ylw-press-cnt-title">%s</h2>', $intro['title'] );
            if(!empty($intro['description'])) echo wpautop( $intro['description'], true );
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $sort = 'desc';
  if( isset($_GET['sort']) && !empty($_GET['sort']) ){
    $sort = $_GET['sort'];
  }
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $query = new WP_Query(array( 
    'post_type'=> 'press',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'paged' => $paged,
    'orderby' => 'date',
    'order'=> $sort
    ) 
  );
?>
<?php 
if($query->have_posts()): 
?>
<section class="ylw-press-grid-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-press-grid-sec-inr">
          <div class="ylw-press-select">
            <form  action="" method="get">
              <select class="selectpicker" id="sortForm" name="sort">
                <option value="">sort by</option>
                <option value="asc" <?php echo ($sort == 'asc')? 'selected': '';?>>Ascending</option>
                <option value="desc" <?php echo ($sort == 'desc')? 'selected': '';?>>Descending</option>
              </select>
              </form>
          </div>
          <ul class="reset-list clearfix">
            <?php 
              while($query->have_posts()): $query->the_post();
                $profesec = get_field('profilesec', get_the_ID());
            ?>
            <li>
              <div class="ylw-press-grid-item">
                <?php if( !empty($profesec['image']) ): ?>
                <div class="ylw-press-grid-item-img-ctlr" data-fancybox="images" href="<?php echo cbv_get_image_src($profesec['image']); ?>">
                  <?php if( !empty($profesec['link']) ): ?>
                    <a href="<?php echo $profesec['link']; ?>" class="overlay-link"></a>
                  <?php endif; ?>
                  <div class="ylw-press-grid-item-img" style="background: url('<?php echo cbv_get_image_src($profesec['image'],'bloggrid'); ?>');">
                  </div>
                </div>
                <?php endif; ?>
                <div class="ylw-press-grid-item-des mHc">
                  <h5 class="ylw-press-grid-item-des-title">
                    <?php if( !empty($profesec['link']) ): ?>
                    <a href="<?php echo $profesec['link']; ?>"><?php the_title(); ?></a>
                    <?php else: ?>
                      <a><?php the_title(); ?></a>
                    <?php endif; ?>
                  </h5>
                  <span><?php echo get_the_date('F Y'); ?></span>
                </div>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ylw-press-pagination">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="fl-pagi-ctlr">
          <?php
            if( $query->max_num_pages > 1 ):
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $query->max_num_pages,
              'type'  => 'list',
              'show_all' => true,
              'prev_next' => false
            ) );
            endif; 
            ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  else:
    echo '<div class="hasgap"></div>';
  endif;  
  wp_reset_postdata();
?>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>