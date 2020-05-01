<?php
/*
  Template Name: About
*/
get_header('banner'); 
$thisID = get_option( 'page_for_posts' );
$intro = get_field('introsec', $thisID);
$standaardbanner = get_field('pagebanner', $thisID);
if( empty($standaardbanner) ) $standaardbanner = THEME_URI.'/assets/images/page-bnr.jpg';
$sort = $archive = '';
if( isset($_GET['sort']) && !empty($_GET['sort']) ){
  $sort = $_GET['sort'];
  echo '<span id="sorting" data-sort="'.$sort.'"></span>';
}
if( isset($_GET['archive']) && !empty($_GET['archive']) ){
  $archive = $_GET['archive'];
  echo '<span id="archive" data-archive="'.$archive.'"></span>';
}
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
              <?php if( isset($_GET['sort']) && !empty($_GET['sort']) ): ?>
              <input type="hidden" name="sort" value="<?php echo $_GET['sort']; ?>">
              <?php endif; ?>
              <input type="text" name="archive" id="datepicker" class="arvhieForm" placeholder="Archive" value="<?php echo ( isset($_GET['archive']) && !empty($_GET['archive']) )? $_GET['archive']: ''; ?>" autocomplete="off">
              <img src="<?php echo THEME_URI; ?>/assets/images/ylw-blog-calender.png">
              </form>
            </div>
            <div class="ylw-blog-select-right">
              <form  action="" method="get">
              <select class="selectpicker" id="sortForm" name="sort">
                <option value="">sort by</option>
                <option value="asc" <?php echo ($sort == 'asc')? 'selected': '';?>>Ascending</option>
                <option value="desc" <?php echo ($sort == 'desc')? 'selected': '';?>>Descending</option>
              </select>
              <?php if( isset($_GET['archive']) && !empty($_GET['archive']) ): ?>
              <input type="hidden" name="archive" value="<?php echo $_GET['archive']; ?>">
              <?php endif; ?>
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