<?php

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);


add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 11);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 9);

function get_custom_wc_output_content_wrapper(){

    if(is_shop() OR is_product_category()){ 
    	echo '<section class="product-list-page-con">
		<div class="container-xlg">
		    <div class="row">
		      <div class="col-md-12">
		        <div class="fl-page-entry-hdr">
		          <h1 class="fl-page-entry-hdr-title">';
		          woocommerce_page_title();
		          echo '</h1>
		          <span class="fl-total-products-number">';
		          woocommerce_result_count();
		          echo '</span>
		        </div>
		      </div>
		    </div>
		  </div> 
    	<div class="container-xlg">
    	<div class="row">
    	<div class="col-lg-4">
    		<div class="fl-sidebar-cntlr">
	    	    <div class="fl-breadcrumbs">
		            <ul class="reset-list">
		              <li class="fl-home-icon"><a href="#">home</a></li>
		              <li><a href="#">shop</a></li>
		              <li class="active"><a href="#">kids fashion</a></li>
		            </ul>
	            </div>
				<div class="fl-my-slection">
		            <div class="fl-my-slection-hdr">
		              <label>My Selection</label>
		              <span class="delete-all-btn">Delete all</span>
		            </div>
		            <div class="fl-my-slect-items">
		              <ul class="reset-list">
		                <li><label>Jackets</label> <span><img src="'.THEME_URI.'/assets/images/close-sm-icon.png"></span></li>
		                <li><label>Boy</label> <span><img src="'.THEME_URI.'/assets/images/close-sm-icon.png"></span></li>
		              </ul>
		            </div>
	          	</div>';
	          	echo do_shortcode( '[searchandfilter id="product_filter"]' );
    		echo '</div>
    	</div>';
    	echo '<div class="col-lg-8">';
    	echo '<div class="fl-product-list-con">';
    }


}

function get_custom_wc_output_content_wrapper_end(){
	if(is_shop() OR is_product_category()){ 
    	echo '</div></div></div></div></section>';
	}

}



add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
    $sorting_options = array(
        'menu_order' => __( 'sort by', 'woocommerce' ),
        'popularity' => __( 'sort by popularity', 'woocommerce' ),
        'rating'     => __( 'sort by average rating', 'woocommerce' ),
        'date'       => __( 'sort by newness', 'woocommerce' ),
        'price'      => __( 'sort by low price', 'woocommerce' ),
        'price-desc' => __( 'sort by high price', 'woocommerce' ),
    );

    return $sorting_options;
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

/*Loop Hooks*/


/**
 * Add loop inner details are below
 */

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
    function add_shorttext_below_title_loop() {
        global $product, $woocommerce, $post;
        $sc = '[yith_quick_view product_id="'.$product->get_id().'" type="icon" label="QV"]';
		echo '<div class="fl-product-item hello">';
        echo '<div class="fl-product-item-fea-img">';
        echo '<a href="'.get_permalink( $product->get_id() ).'">';
        echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' );
        echo '</a>';
        echo '<div class="product-overlay-icons">';
        echo '<a class="product-overlay-icon-heart" href="#"> <i class="far fa-heart"></i></a>';
        echo '<a class="product-overlay-icon-search" href="#"><i class="fas fa-search"></i></a>';
        echo do_shortcode($sc);
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
        
    }
}


/*Remove Single page Woocommerce Hooks & Filters are below*/

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
$args['posts_per_page'] = 8; // 4 related products
return $args;
}