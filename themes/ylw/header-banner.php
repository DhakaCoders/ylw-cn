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
<header class="header has-banner">
  <div class="header-inr">
    <div class="header-cntlr clearfix">
      <div class="hdr-lft">
        <div class="logo">
          <a class="has-bnr-logo" href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo-white.png"></a>
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
                <i class="fas fa-sign-out-alt"></i>
                <a href="#">Log out</a>
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

<section id="header-popups" class="header-popups">
  <div class="hdrpopups-inr">
    <div class="pop-up-nav clearfix">
        <div class="popup-cross">
          <span></span>
          <span></span>
        </div>
    </div>  
    <div class="header-popup-search clearfix">
      <div class="search-form">
          <form action="" class="form">
            <div class="form-group">
              <input id="search" class="form-input" type="text" />
              <label class="form-label placeholder" for="search">Search for a product</span></label>
              <input class="search-submit-btn" type="submit" value="">
            </div>
          </form>
      </div>       
    </div>  
  </div>
</section><!-- end of header-search -->