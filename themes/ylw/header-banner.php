<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head> 
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>
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
<?php 
  $logoObj = get_field('logo_header_pagebanner', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
?>
<header class="header has-banner">
  <div class="header-inr">
    <div class="header-cntlr clearfix">
      <div class="hdr-lft">
        <div class="hdr-humbergur-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="logo">
          <a class="has-bnr-logo" href="<?php echo esc_url(home_url('/')); ?>">
            <?php echo $logo_tag; ?>
          </a>
        </div>
      </div>
      <div class="hdr-mid">
        <nav class="main-nav">
          <ul class="clearfix reset-list">
            <li><a href="#">newborn</a></li>
            <li class="current-menu-item"><a href="#">baby</a></li>
            <li class="menu-item-has-children">
              <a href="#">KID</a>
              <div class="mega-menu-cntlr">
                <div class="mega-menu-inr">
                  <div class="mega-menu-cols">
                    <div class="mega-menu-col">
                      <strong>GIRLS</strong>
                      <ul>
                        <li><a href="#">New in</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">Tops</a></li>
                        <li><a href="#">Gloves</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Jeans</a></li>
                        <li><a href="#">Jogging Bottoms</a></li>
                        <li><a href="#">Jumpers</a></li>
                      </ul>
                      <span><a href="#">Sales</a></span>
                    </div>
                    <div class="mega-menu-col">
                      <strong>GIRLS</strong>
                      <ul>
                        <li><a href="#">New in</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">Tops</a></li>
                        <li><a href="#">Gloves</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Jeans</a></li>
                        <li><a href="#">Jogging Bottoms</a></li>
                        <li><a href="#">Jumpers</a></li>
                      </ul>
                      <span><a href="#">Sales</a></span>
                    </div>
                    <div class="mega-menu-col">
                      <strong>Collections</strong>
                      <ul>
                        <li><a href="#">Cobalt Elixir</a></li>
                        <li><a href="#">Cork Pulp</a></li>
                        <li><a href="#">Covert Green</a></li>
                        <li><a href="#">Foggy Day</a></li>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="mega-menu-fea-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/mega-menu-fea-img.png);">
                    <div>
                      <strong>New <br>&nbsp;&nbsp; arrivals</strong>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li><a href="#">BOYS</a></li>
            <li><a href="#">GIRLS</a></li>
          </ul>
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
                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><i class="fas fa-sign-out-alt"></i> Log out</a>
              </li>
            <?php } ?>
            </ul>
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
          <ul class="clearfix reset-list">
            <li><a href="#">newborn</a></li>
            <li class="current-menu-item"><a href="#">baby</a></li>
            <li class="menu-item-has-children">
              <a href="#">kid</a>
              <ul class="sub-menu">
                <li class="menu-item-has-children">
                  <a href="#">girls</a>
                  <ul class="sub-menu">
                    <li><a href="#">New in</a></li>
                    <li><a href="#">Dresses</a></li>
                    <li><a href="#">Coats</a></li>
                    <li><a href="#">Tops</a></li>
                    <li><a href="#">Gloves</a></li>
                    <li><a href="#">Jackets</a></li>
                    <li><a href="#">Jeans</a></li>
                    <li><a href="#">Jogging Bottoms</a></li>
                    <li><a href="#">Jumpers</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">boys</a>
                  <ul class="sub-menu">
                    <li><a href="#">New in</a></li>
                    <li><a href="#">Dresses</a></li>
                    <li><a href="#">Coats</a></li>
                    <li><a href="#">Tops</a></li>
                    <li><a href="#">Gloves</a></li>
                    <li><a href="#">Jackets</a></li>
                    <li><a href="#">Jeans</a></li>
                    <li><a href="#">Jogging Bottoms</a></li>
                    <li><a href="#">Jumpers</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">Collections</a>
                  <ul class="sub-menu">
                    <li><a href="#">Cobalt Elixir</a></li>
                    <li><a href="#">Cork Pulp</a></li>
                    <li><a href="#">Covert Green</a></li>
                    <li><a href="#">Foggy Day</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">boys</a></li>
            <li><a href="#">girls</a></li>
          </ul>
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
<?php get_template_part('templates/header', 'popups'); ?>