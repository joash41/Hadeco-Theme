<?php
	include_once('functions/wp-functions.php');
	include_once('functions/acf-functions.php');
	include_once('functions/gravityForms-functions.php');
	include_once('woocommerce/_WooFunctions.php');
	include_once('functions/yoast.php');
	function header_bc_scripts() {
		wp_enqueue_style( 'hi-style',  get_template_directory_uri() .'/css/theme-style.css');
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'font-style',  get_template_directory_uri() .'/fonts/style.css');
		wp_enqueue_style( 'fa-style',  get_template_directory_uri() .'/css/all.min.css');
		wp_enqueue_style( 'flickity-style',  get_template_directory_uri() .'/css/flickity.min.css');
		wp_enqueue_script( 'google-js', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
		wp_enqueue_script( 'custom-product-js', get_template_directory_uri() . '/js/custom-variations-select.jquery.js');
		//wp_enqueue_script( 'scroll-reveal', get_template_directory_uri() . '/js/scrollreveal.min.js');
	}
	add_action( 'get_header', 'header_bc_scripts' );
	function footer_bc_scripts() {
		wp_enqueue_script( 'flickity-js', get_template_directory_uri() . '/js/flickity.pkgd.min.js');
		wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js');
		wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans');
	}
	add_action( 'get_footer', 'footer_bc_scripts' );
//Excerpt Read More
	function wpdocs_excerpt_more( $more ) {
		if ( ! is_single() ) {
			$more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
				get_permalink( get_the_ID() ),
				__( 'Read More', 'textdomain' )
			);
		}
	
		return $more;
	}
	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Function for minimum order
function disable_checkout_button_no_shipping() { 

    $total = WC()->cart->subtotal;
    if( $total < 350 ){
        remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
        echo '<b>Kindly note:</b> Your order needs to be above R350, in order check out.';
    }  
}

add_action( 'woocommerce_proceed_to_checkout', 'disable_checkout_button_no_shipping', 1 );
//
	function my_mario_block_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'hadeco-blocks',
					'title' => __( 'Hadeco Blocks', 'hadeco-blocks' ),
				),
			)
		);
	}
	add_filter( 'block_categories', 'my_mario_block_category', 60, 2);
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {
    // check function exists
    if( function_exists('acf_register_block') ) {
        // Product Feature
		acf_register_block(array(
            'name'              => 'hp-categories-block',
            'title'             => __('Categories Grid Block'),
            'description'       => __('Categories Grid Block.'),
            'render_template'   => 'gBlocks/home-categories.php',
            'category'          => 'hadeco-blocks',
            'icon'              => 'admin-comments',
            'mode'              => 'edit',
            'keywords'          => array( 'custom', 'block' ),
		));
		acf_register_block(array(
            'name'              => 'hp-categories-product-slider',
            'title'             => __('Product Slider'),
            'description'       => __('Product Slider.'),
            'render_template'   => 'gBlocks/product-slider.php',
            'category'          => 'hadeco-blocks',
            'icon'              => 'admin-comments',
            'mode'              => 'edit',
            'keywords'          => array( 'custom', 'block' ),
		));
    }
}
//Add Alphabetical sorting option to shop page / WC Product Settings
function sv_alphabetical_woocommerce_shop_ordering( $sort_args ) {
	$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
   
	  if ( 'alphabetical' == $orderby_value ) {
		  $sort_args['orderby'] = 'title';
		  $sort_args['order'] = 'asc';
		  $sort_args['meta_key'] = '';
	  }
   
	  return $sort_args;
  }
  add_filter( 'woocommerce_get_catalog_ordering_args', 'sv_alphabetical_woocommerce_shop_ordering' );
  function sv_custom_woocommerce_catalog_orderby( $sortby ) {
    $sortby['alphabetical'] = 'Sort by name: alphabetical';
    return $sortby;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'sv_custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'sv_custom_woocommerce_catalog_orderby' );