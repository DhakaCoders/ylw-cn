<?php
$thisID = get_the_ID();
$pageTitle = get_the_title($thisID);
$standaardbanner = get_field('pagebanner', $thisID);
if( empty($standaardbanner) ) $standaardbanner = THEME_URI.'/assets/images/page-bnr.jpg';
?>
<section class="page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo $standaardbanner; ?>);">
    </div>
    <div class="page-banner-des">
        <div>
          <h1 class="page-banner-title"><?php echo $pageTitle; ?></h1>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->