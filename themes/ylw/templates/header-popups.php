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
          <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="form-group">
              <input type="search" id="search" class="form-input" value="<?php echo get_search_query(); ?>" name="s" />
              <label class="form-label placeholder" for="search"><span>Search for a product</span></label>
              <span class="search-submit-btn-cnltr">
              <input class="search-submit-btn" type="submit" value="">
              </span>
              <input type="hidden" name="post_type" value="product" />
            </div>
          </form>
      </div>       
    </div> 

  </div>
</section><!-- end of header-search -->