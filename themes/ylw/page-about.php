<?php
/*
  Template Name: About
*/
get_header(); 
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
get_template_part('templates/page', 'banner');
?>
<section class="ylw-about-dsc-sec-wrp">
  <div class="container-md">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-about-dsc-wrp">
          <div class="ylw-about-dsc">
            <?php 
            if( !empty($intro['title']) ) printf('<span>%s</span>', $intro['title'] );
            if(!empty($intro['description'])) echo wpautop( $intro['description'], true );
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $showhide_figures = get_field('showhide_figures', $thisID);
      $cfigures = get_field('cfigures', $thisID);
      $figures = $cfigures['company_figures'];
    ?>
    <?php if( $showhide_figures ): ?>
    <div class="row">
      <div class="col-sm-12">
        
        <div class="ylw-about-counter-wrp">
          <?php if( !empty($cfigures['title']) ) printf('<h2 class="ylw-about-counter-title">%s</h2>', $cfigures['title'] ); ?>
          <?php if( $figures ): ?>
          <?php foreach( $figures as $figure ):  ?>
          <div class="ylw-about-counter-inr">
            <div class="ylw-about-counter-item">
            <?php 
              if( !empty($figure['value']) ) printf('<strong class="ylw-about-counter">%s</strong>', $figure['value'] ); 
              if( !empty($figure['symbol']) ) printf('<b>%s</b>', $figure['symbol'] ); 
              if( !empty($figure['title']) ) printf('<span>%s</span>', $figure['title'] ); 
            ?>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php 
  $showhide_intro2 = get_field('showhide_intro2', $thisID);
  $introsec2 = get_field('introsec2', $thisID);
  $introrepeat = $introsec2['introrepeat'];
  if( $showhide_figures ):
?>
<section class="ylw-about-brand-sec-wrp">
  <div class="container-md">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-about-brand-grid-wrp clearfix">
          <?php if( $introrepeat ): ?>
          <ul class="clearfix ulc">
            <?php foreach( $introrepeat as $irepeat ):  ?>
            <li>
              <div class="ylw-about-brand-grid-inr">
                <?php if(!empty($irepeat['image'])): ?>
                <div class="ylw-about-brand-grid-img" style="background:url(<?php echo cbv_get_image_src($irepeat['image'], 'aboutgrid'); ?>);">
                  <?php if(!empty($irepeat['logo'])): ?>
                  <a href="<?php echo esc_url( home_url() );?>">
                    <?php echo cbv_get_image_tag($irepeat['logo']); ?>
                  </a>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="ylw-about-brand-grid-dsc">
                  <?php 
                    if( !empty($irepeat['title']) ) printf('<h3 class="ylw-about-brand-grid-title">%s</h3>', $irepeat['title'] );
                    if(!empty($irepeat['description'])) echo wpautop( $irepeat['description'] ); 
                  ?>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>