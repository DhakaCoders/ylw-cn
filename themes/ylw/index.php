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
          <h1 class="page-banner-title"><?php echo get_the_title($thisID); ?></h1>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->

<section class="ylw-blog-grid-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-blog-grid-sec-inr">
          <div class="ylw-blog-select clearfix">
            <div class="blog-archive-date">
              <form action="" method="get">
              <input type="text" name="archive" id="datepicker" class="arvhieForm" autocomplete="off" placeholder="Archive">
              <img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-calender.png">
              </form>
            </div>
            <div class="ylw-blog-select-right">
              <form  action="" method="get">
              <select class="selectpicker" id="sortForm" name="sort">
                <option value="">sort by</option>
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
              </select>
              <input type="hidden" name="archive" value="4">
              </form>
            </div>
          </div>
            <?php echo do_shortcode('[ajax_posts]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>