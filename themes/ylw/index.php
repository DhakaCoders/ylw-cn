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
              <input type="text" name id="datepicker" placeholder="Archive">
              <img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-calender.png">
            </div>
            <div class="ylw-blog-select-right">
              <select class="selectpicker">
                <option>sort by</option>
                <option>sort by 1</option>
                <option>sort by 2</option>
              </select>
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