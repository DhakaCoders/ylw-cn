<?php 
  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $contact = get_field('ftcontact', 'options');
  $email = $contact['email_address'];
  $show_telefoon = $contact['telephone'];
  $plink = $contact['page_link'];
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));

  $logoObj = get_field('logo_footer', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $smedias = get_field('sociale_media', 'options');
?>
<footer class="footer-wrp">
  <div class="container-xlg">
    <div class="row">
      <div class="col-12">
        <div class="ftr-col-main clearfix">
          <div class="ftr-col ftr-col-1">
            <div class="ftr-logo">
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo $logo_tag; ?>
              </a>
            </div>
          </div>
          <div class="ftr-col ftr-col-2"> 
            <h6><span><?php _e( 'About Us', THEME_NAME ); ?></span></h6>
            <?php 
              $fmenuOptionsa = array( 
                  'theme_location' => 'cbv_fta_menu', 
                  'menu_class' => 'ulc',
                  'container' => 'nav',
                  'container_class' => 'nav'
                );
              wp_nav_menu( $fmenuOptionsa ); 
            ?>
          </div>
          <div class="ftr-col ftr-col-3"> 
            <h6><span><?php _e( 'Services', THEME_NAME ); ?></span></h6>
            <?php 
              $fmenuOptionsb = array( 
                  'theme_location' => 'cbv_ftb_menu', 
                  'menu_class' => 'ulc',
                  'container' => 'nav',
                  'container_class' => 'nav'
                );
              wp_nav_menu( $fmenuOptionsb ); 
            ?>             
          </div>
          <div class="ftr-col ftr-col-4">
            <h6><span><?php _e( 'May We Help?', THEME_NAME ); ?></span></h6>
            <ul class="ulc reset-list">
              <?php if( !empty($email) ) printf('<li><a href="mailto:%s">%s</a></li>', $email, $email); ?>
              <?php 
                if( is_array( $plink ) &&  !empty( $plink['url'] ) ){
                    printf('<li><a href="%s" target="%s">%s</a></li>', $plink['url'], $plink['target'], $plink['title']); 
                }
              ?>
              <?php if( !empty($show_telefoon) ) printf('<li><a href="tel:%s">%s</a></li>', $telefoon, $show_telefoon); ?>
            </ul> 
            <div class="ftr-socail-icon">
              <h6><?php _e( 'FOLLOW', THEME_NAME ); ?></h6>
              <?php if(!empty($smedias)):  ?>
                <ul class="ulc clearfix">
                  <?php foreach($smedias as $smedia): ?>
                    <li>
                      <a target="_blank" href="<?php echo $smedia['url']; ?>">
                        <?php echo $smedia['icon']; ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>             
          </div>
          <div class="ftr-col ftr-col-5">
            <h6 class="ftr-title"><span>Newsletter</span></h6>
            <span>Sign up to get the latest on new <br> releases and more.</span>  
            <a id="quickViewOpener" href="#" data-toggle="modal" data-target="#quickViewModal">Get Emailed Insider Exclusives</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="modal fade ylw-modal-con-wrap" id="quickViewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-content">
          <div class="modal-login-form">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span><img src="<?php echo THEME_URI; ?>/assets/images/modal-close-icon.png"></span>
            </button>
            <h3 class="modal-login-form-title">Sign Up to our newsletter</h3>
            <span>& get our latest special offers</span>
            <div class="login-form">
              <form>
                <div class="ylw-input-field-row">
                  <input type="text" name="" placeholder="Your Name">
                </div>
                <div class="ylw-input-field-row">
                  <input type="email" name="" placeholder="Your Email">
                </div>
                <div class="ylw-submit-btn">
                  <input type="submit" value="SUBSCRIBE">
                </div>
                <div class="ylw-modal-logo">
                  <a href="#">
                    <img src="<?php echo THEME_URI; ?>/assets/images/ylw-modal-logo.png">
                  </a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php wp_footer(); ?>
</body>
</html>