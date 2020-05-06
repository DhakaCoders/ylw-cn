<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head> 
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->  

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Preloader -->
<!-- <div id="preloader">
    <div id="status1">
      <img src="<?php echo THEME_URI; ?>/assets/images/looding-img.png">
    </div>
</div> -->
<header class="header has-banner home-hdr">
  <div class="header-inr">
    <div class="header-cntlr clearfix">
      <div class="hdr-lft">
        <div class="hdr-humbergur-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <!-- <div class="logo">
          <a class="no-bnr-logo" href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo-black.png"></a>
          <a class="has-bnr-logo" href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo-white.png"></a>
        </div> -->
      </div>
      <div class="hdr-mid">
        <nav class="main-nav">
          <?php 
            $menuOptionsb = array( 
                'theme_location' => 'cbv_main_menu', 
                'menu_class' => 'clearfix reset-list',
                'container' => '',
                'container_class' => ''
              );
            wp_nav_menu( $menuOptionsb ); 
          ?>  
        </nav>
      </div>
      <div class="hdr-rgt">
        <div class="hdr-rgt-items">
          <div class="hdr-search-btn">
            <i><img src="<?php echo THEME_URI; ?>/assets/images/search-icon-white.png"></i>
          </div>
          <div class="hdr-mini-cart-btn">
            <a href="<?php echo wc_get_cart_url(); ?>">
              <i><img src="<?php echo THEME_URI; ?>/assets/images/cart-icon-white.png"></i>
              <?php if(WC()->cart->get_cart_contents_count() > 0) {
                echo sprintf ( '<span>%d</span>', WC()->cart->get_cart_contents_count() );
              } else {
                echo sprintf ( '<span>%d</span>', 0 );
              }
              ?>
            </a>
          </div>
          <div class="hdr-account">
            <span><?php _e('Account', THEME_NAME); ?></span>
            <ul class="reset-list clearfix">
              <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">My Profile</a></li>
              <?php 
              if( is_user_logged_in() ){
                foreach ( wc_get_account_menu_items() as $endpoint => $label ) : 
                  if($endpoint == 'customer-logout'):
              ?>
              <li>
                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><i class="fas fa-sign-out-alt"></i> <span>Log out</span></a>
              </li>
              <?php endif; endforeach; 
              } else {
              ?>
              <li>
                <i class="fas fa-sign-out-alt"></i>
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Log In</a>
              </li>
            <?php } ?>
          </div>
          
        </div>
      </div>
    </div>
    <div class="xs-nav-cntlr">
      <div class="xs-nav-inr">
        <div class="menu-closebtn">
          <span></span>
          <span></span>
        </div>
        <div class="xs-main-nav">
          <?php 
            $xmenuOptionsb = array( 
                'theme_location' => 'cbv_mobilemain_menu', 
                'menu_class' => 'clearfix reset-list',
                'container' => '',
                'container_class' => ''
              );
            wp_nav_menu( $xmenuOptionsb ); 
          ?>  
        </div>
        <div class="xs-other-nav">
          <ul class="reset-list">
            <li class="menu-item-has-children">
              <a href="#">My account</a>
              <ul class="sub-menu">
              <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">My Profile</a></li>
              <?php 
              if( is_user_logged_in() ){
                foreach ( wc_get_account_menu_items() as $endpoint => $label ) : 
                  if($endpoint == 'customer-logout'):
              ?>
              <li class="xs-logout">
                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">Log out</a>
              </li>
              <?php endif; endforeach; 
              } else {
              ?>
              <li class="xs-logout">
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Log In</a>
              </li>
            <?php } ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>




<?php 
  $logoObj = get_field('logo_header_homepage', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
?>
<section class="main-banner">
  <div class="main-bnr-logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
      <?php echo $logo_tag; ?>
    </a>
  </div>
  <?php 
    $slides = get_field('gslides', HOMEID);
    if($slides):
  ?>
  <div class="main-banner-cntlr mainBnrSlider">
    <div class="mainBnrSlider" id="mainBnrSlider">
    <?php foreach( $slides as $hslide ): ?>
      <div class="mainBnrSlideItem">
        <?php if( !empty($hslide['ID']) ): ?>
        <?php echo cbv_get_image_tag($hslide['ID'], 'hmslide'); ?>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>   
  <?php endif; ?>
</section>
<?php get_template_part('templates/header', 'popups'); ?>