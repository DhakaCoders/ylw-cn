<?php
/*
  Template Name: Contact
*/
get_header('two'); 
$thisID = get_the_ID();
$spacialArry = array( ".", "/", "+", " ", ")", "(" );$replaceArray = '';
$emailspacialArry = array( "/" );
$intro = get_field('introsec', $thisID);
?>
<section class="contact-form-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ylw-contact-frm-block">
          <div class="ylw-contact-head">
            <?php if( !empty(get_the_title($thisID)) ) printf('<h1 class="ylw-contact-title">%s</h1>', get_the_title($thisID) ); ?>
          </div>
          <div class="ylw-contact-tp-wrp">
            <?php if(!empty($intro['image'])): ?>
            <div class="ylw-contact-tp-img" style="background:url(<?php echo cbv_get_image_src($intro['image'], 'contactimg'); ?>);">
              <?php echo cbv_get_image_tag($intro['image'], 'contactimg'); ?>
            </div>
            <?php endif; ?>
            <div class="ylw-contact-tp-dsc-lft">
              <div class="ylw-contact-tp-dsc">
                <i><img src="<?php echo THEME_URI; ?>/assets/images/ftr-logo.png"></i>
                <?php 
                  if(!empty($intro['description'])) echo wpautop( $intro['description'] );
                ?>
              </div>
            </div>
          </div>
          <?php 
          $contactsec = get_field('contactsec', $thisID);
          $continfos = $contactsec['contacts'];
          
          ?>
          <div class="ylw-contact-form-btm-block clearfix">
            <?php if( $continfos ): ?>
            <div class="ylw-contact-info-lft">
              <?php 
                foreach( $continfos as $continfo ): 
                $gmaplink = !empty($continfo['googlemap_url'])?$continfo['googlemap_url']: 'javascript:void()';
                $show_telefoon = $continfo['telephone'];
                $show_email = $continfo['email_address'];
                $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
                $email = trim(str_replace($emailspacialArry, $replaceArray, $show_email));
              ?>
              <div class="ylw-contact-info">
                <?php 
                if(!empty($continfo['title'])) printf('<h2 class="ylw-contact-info-title">%s</h2>', $continfo['title']);
                if(!empty($continfo['address'])) printf('<a href="%s">%s</a>', $gmaplink, $continfo['address']);
                if(!empty($telefoon)) printf('<a href="tel:%s">%s</a>', $telefoon, $show_telefoon);
                if(!empty($continfo['email_address'])) printf('<a href="mailto:%s">%s</a>', $email, $show_email);
                ?>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php 
              $formcode = get_field('formshortcode', $thisID);
              
            ?>
            <div class="ylw-contact-form-rgt">
              <div class="ylw-contact-form-wrp">
                <?php 
                if(!empty($formcode['title'])) printf('<h2 class="ylw-contact-form-title">%s</h2>', $formcode['title']); 
                if(!empty($formcode['form_shortcode'])) echo do_shortcode( $formcode['form_shortcode'] );
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('templates/footer', 'top'); ?>
<?php get_footer(); ?>