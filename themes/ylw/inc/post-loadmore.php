<?php
/*
 * initial posts dispaly
 */

function post_script_load_more($args = array()) {
  $keyword = $sorting = '';

  if( isset($_GET['search']) && !empty($_GET['search'])) $keyword = $_GET['search'];
  if( isset($_GET['sorting']) && !empty($_GET['sorting'])) $sorting = $_GET['sorting'];
  echo '<ul class="reset-list clearfix" id="ajax-content">';
      ajax_post_script_load_more($args,$keyword, $sorting);
  echo '</ul>';
  echo '<div class="loadmorewrapp"><div class="ylw-blog-grid-load">
  <div class="ajaxloading" id="ajxaloader" style="display:none"><img src="'.THEME_URI.'/assets/images/loading.gif" alt="loader"></div>
   <a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >
   <img src="'.THEME_URI.'/assets/images/ylw-blog-grid-load-img.png">
   </a><span>LOAD MORE</span>';
   echo '</div></div>';

}
/*
 * create short code.
 */
add_shortcode('ajax_posts', 'post_script_load_more');


/*
 * load more script call back
 */
function ajax_post_script_load_more($args, $keyword = '', $sort = 'DESC') {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num = 3;
    //page number
    $paged = 1;

    if(isset($_POST['key_word']) && !empty($_POST['key_word'])){
        $keyword = $_POST['key_word'];
    }
    if(isset($_POST['sorting']) && !empty($_POST['sorting'])){
        $sort = $_POST['sorting'];
    }
    if(isset($_POST['page']) && !empty($_POST['page'])){
        $paged = $_POST['page'] + $paged;
    }

    $query = new WP_Query(array( 
        'post_type'=> 'post',
        'post_status' => 'publish',
        's' => $keyword,
        'posts_per_page' =>$num,
        'paged'=>$paged,
        'orderby' => 'date',
        'order'=> $sort,
      ) 
    );
    if($query->have_posts()){
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
      <div class="ylw-blog-grid-item">
        <div class="ylw-blog-grid-item-img-ctlr">
          <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
          <div class="ylw-blog-grid-item-img" style="background: url('<?php echo $feaimg_src; ?>');">
          </div>
        </div>
        <div class="ylw-blog-grid-item-des mHc">
          <div class="ylw-blog-grid-item-des-inr">
            <span><?php echo get_the_date('d M Y'); ?></span>
            <h5 class="ylw-blog-grid-item-des-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <?php the_excerpt(); ?>
          </div>
        </div>
      </div>
    </li>
    <?php
    endwhile;
     
    }else{
      //echo '<div class="postnot-found" style="text-align:center; padding:20px 0;">No results!</div>';
      echo '<style>.ylw-blog-grid-load{display:none;}</style>';
    }  
    
    wp_reset_postdata();
    
    //check ajax call
    if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_post_script_load_more', 'ajax_post_script_load_more');
add_action('wp_ajax_ajax_post_script_load_more', 'ajax_post_script_load_more');