<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<section class="pro-single-monsters-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="pro-single-monsters-sec-cntlr">
          <div class="block-1260 clearfix">
            <div class="pro-single-monsters-sec-fea-img">
              <img src="<?php echo THEME_URI; ?>/assets/images/monsters-img-01.png">
            </div>
            <div class="pro-single-monsters-sec-des">
              <div class="pro-single-monsters-sec-des-inr">
                <h3 class="psmsd-title-1">Sea Monsters</h3>
                <h6 class="psmsd-title-2">COLLECTION</h6>
                <p>The inspiration about collection and a mini description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum erat et lacus fermentum pulvinar.</p>
                <a class="white-transparent-btn" href="#">VIEW ALL COLLECTION</a>
              </div>
            </div>
          </div>
          <div class="monsters-img-02">
            <img src="<?php echo THEME_URI; ?>/assets/images/monsters-img-02.png">
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
<?php
if ( $related_products ) : ?>

<section class="hm-new-arrivals-sec">
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-new-arrivals-sec-hdr">
          <h3 class="hnash-title"><?php _e('You may also like', 'woocommerce'); ?></h3>
          <div class="fl-prv-nxt">
            <span class="fl-prev"></span>
            <span class="fl-next"></span>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="container-xlg">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-new-arrivals-sec-cntlr hmNewAarrivalsSlider">
			<?php
       foreach ( $related_products as $related_product ) : ?>
			<?php
			$post_object = get_post( $related_product->get_id() );

			setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
			global $product, $woocommerce, $post;
			echo '<div class="hm-new-arrivals-item">';
			echo '<div class="fl-product-item">';
	        echo '<div class="fl-product-item-fea-img">';
	        echo '<a href="'.get_permalink( $product->get_id() ).'">';
	        echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' );
	        echo '</a>';
	        echo '<div class="product-overlay-icons">';
	        get_wish_thumb();
	        echo '<a href="#" class="product-overlay-icon-search yith-wcqv-button" data-product_id="'.$product->get_id().'"><i class="fas fa-search"></i></a>';
	        echo '</div>';
	        echo '</div>';
	        echo '<div class="fl-product-item-des mHc">';
	        echo '<strong class="fl-product-variable-title">NEW</strong>';
	        echo '<h6 class="fl-product-title"><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h6>';
	        echo '<div class="fl-product-box-prices">';
	        echo '<div class="fl-product-regular-price">'.$product->get_price_html().'</div>';
	        echo '</div>';
	        echo '</div>';
	        echo '</div>';
	        echo '</div>';
			?>
	          
			<?php endforeach; ?>
        </div>
      </div>
      <div class="col-md-12">
        <div class="gray-transparent-btn">
          <a href="<?php the_permalink( get_option( 'woocommerce_shop_page_id' ) );?>">discover our products</a>
        </div>
      </div>
    </div>
  </div>    
</section>
	<?php
endif;

wp_reset_postdata();
