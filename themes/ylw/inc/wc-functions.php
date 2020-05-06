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
    		<div class="fl-sidebar-cntlr">';
	    	  cbv_custom_both_breadcrump();  
			echo '<div class="fl-my-slection">
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
        get_wish_thumb();
        echo '<a href="#" class="product-overlay-icon-search yith-wcqv-button" data-product_id="'.$product->get_id().'"><i class="fas fa-search"></i></a>';
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

function get_wish_thumb(){
    if (class_exists('Alg_WC_Wish_List_Toggle_Btn')) {
        $obj = new Alg_WC_Wish_List_Toggle_Btn();
        echo '<a class="product-overlay-icon-heart">';
          $obj::show_thumb_btn();
        echo '</a>';
   }

}

/*Remove Single page Woocommerce Hooks & Filters are below*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );



add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
$args['posts_per_page'] = 8; // 4 related products
return $args;
}

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 

function woocommerce_custom_single_add_to_cart_text() {
    return __( 'ADD TO BAG', 'woocommerce' ); 
}



add_action( 'woocommerce_single_product_summary', 'wc_single_product_under_title', 6 );
function wc_single_product_under_title(){
    echo '<p>Science Stuff Collection</p>';
}

//add_action( 'woocommerce_single_product_summary', 'wc_single_product_delivery_message', 30 );
function wc_single_product_delivery_message(){
    echo '<p>Free Delivery for over 50€ </p>';
}

add_action( 'woocommerce_single_product_summary', 'wc_single_product_under_cartbutton', 31 );
function wc_single_product_under_cartbutton(){
    echo '<div class="sharewith">SHARE WITH LOVE +</div>';
}

add_action( 'woocommerce_single_product_summary', 'wc_single_product_price', 10 );
function wc_single_product_price(){
    global $product;
    $output = '<div class="price-wrapp">';
    $output .= $product->get_price_html();
    $output .= '</div>';

    echo $output;
}


add_action( 'woocommerce_custom_metafield', 'wc_single_product_metafields' );

function wc_single_product_metafields(){
    $output = '<div class="wc-accordion">';
    $output .= '<div class="faq-accordion-tab-row">
                  <h6 class="faq-accordion-title">Size & Fit</h6>
                  <div class="faq-accordion-des">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>';
    $output .= '<div class="faq-accordion-tab-row">
                  <h6 class="faq-accordion-title">Details & Materials</h6>
                  <div class="faq-accordion-des">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>';
    $output .= '<div class="faq-accordion-tab-row">
                  <h6 class="faq-accordion-title">Care</h6>
                  <div class="faq-accordion-des">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>';
    $output .= '<div class="wc-accordion">';

    echo $output;
}

//custom action 'woocommerce_delivery_text' is used on add to cart button 

add_action( 'woocommerce_delivery_text', 'wc_single_free_delivery_text' );

function wc_single_free_delivery_text(){

    echo '<div class="free-text"><p>Free Delivery for over 50 <span>€</span></p</div>';
}



// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div class="fl-breadcrumbs"><ul class="reset-list">',
            'wrap_after'  => '</ul></div>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;