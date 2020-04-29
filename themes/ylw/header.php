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

  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/css/jquery-ui.css">

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
        <!-- <div class="logo">
          <a class="no-bnr-logo" href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo-black.png"></a>
          <a class="has-bnr-logo" href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo-white.png"></a>
        </div> -->
      </div>
      <div class="hdr-mid">
        <nav class="main-nav">
          <ul class="clearfix reset-list">
            <li><a href="#">newborn</a></li>
            <li><a href="#">baby</a></li>
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
            <a href="#">
              <i><img src="<?php echo THEME_URI; ?>/assets/images/cart-icon-white.png"></i>
              <span>3</span>
            </a>
          </div>
          <div class="hdr-account">
            <span>Account</span>
            <ul class="reset-list clearfix">
              <li><a href="#">My Profile</a></li>
              <li>
                <a href="#"><i class="fas fa-sign-out-alt"></i> <span>Log out</span></a>
              </li>
            </ul>
          </div>
          <div class="hdr-humbergur-btn">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>