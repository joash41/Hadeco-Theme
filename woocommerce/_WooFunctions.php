<?php 
// Theme Support
	function rd_bhc_theme_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
	add_action( 'after_setup_theme', 'rd_bhc_theme_support' );
//Global Fucntion to remvoe Woo Functions
    function joe_remove_functions(){
	    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}
	add_action('init','joe_remove_functions');
//Add the Icon to Trigger Product Info
	add_action('woocommerce_after_shop_loop_item','joe_product_infotrigger');
	function joe_product_infotrigger() {;?>
        <div class="icon-wrapper"><i class="fas fa-search-plus"></i></div>
	<?php }
	add_action('woocommerce_after_shop_loop_item','robin_product_lb_info');
	function robin_product_lb_info() {
		global $product;
		$productID = $product->get_id();
		$productACF_name = get_field('product_name');
		$productACF_subname = get_field('sub_product_name');
		$productACF_avail = get_field ('availability');
		$productACF_deliv = get_field ('deliveries');
		$productACF_season = get_field('product_season');
		$prd_sku = $product->get_sku();
		$prd_pri = $product->get_regular_price();
		$prd_pri_sale = $product->get_sale_price();
		$prd_cats = $product->get_categories();
		$prd_qty = $product->get_stock_quantity();
		$prd_status = $product->get_stock_status();
		?>
		<div class="productInfo">
			<div class="close"><i class="far fa-times-circle"></i></div>
		<!-- Product Title -->
			<div class="prdTitle">
				<?php if($productACF_season){?>
				<div class="season_icon"><img src="<?php echo get_template_directory_uri()?>/images/<?php echo $productACF_season ?>" /></div>
				<?php } else if(get_field('product_season', $productID)){?>
					<div class="season_icon"><img src="<?php echo get_template_directory_uri()?>/images/<?php the_field('product_season', $productID) ?>" /></div>
				<?php }?>
				<?php if($productACF_name && $productACF_subname){;?>
					<?php echo $productACF_name;?>
					<span class="perPack"><?php echo $productACF_subname;?></span>
				<?php }elseif(get_field('product_name', $productID) && get_field('sub_product_name', $productID)){?>
					<?php the_field('product_name', $productID)?>
					<span class="perPack"><?php the_field('sub_product_name', $productID)?></span>
					<?php }else{?>
					<?php the_title();?>
				<?php }?>
			</div>
		<!-- Product Price -->
			<div class="prdPrice">
				<?php if($prd_pri_sale){;?>
					<span>R <?php echo $prd_pri_sale;?></span>
				<?php } else if($prd_pri) {;?>
					<span>R <?php echo $prd_pri;?></span>
				<?php } else{;?>
					<p style="font-size: 15px">This product has a range of pricing.<a href="<?php echo get_permalink($productID); ?>"> Click here</a> to view more info about this product to make a purchase</p>
				<?php }; ?> 
				
			</div>
			<!-- Product Status -->
			<div class="prdStatus">
				<?php if($prd_status == 'instock'){;?>
					<i class="fas fa-smile"></i>
					<?php if($prd_qty > 0){;?>
						Stock: <?php echo $prd_qty;?>
					<?php }else {;?>
						In Stock
					<?php };?>
				<?php } elseif($prd_status == 'onbackorder'){;?>
					<i class="far fa-smile"></i> Available on backorder
				<?php } else {;?>
					<i class="fas fa-frown"></i> Out of stock
				<?php };?>
			</div>
		<!-- Product Add to cart -->
		<?php if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
				$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
				$html .= '<div class="qtyBefore">Qty: </div>';
				$html .= woocommerce_quantity_input( array(), $product, false );
				$html .= '<button type="submit" class="button alt"><img class="jkg_atc_icon" src="'. get_template_directory_uri() .'/images/atc_icon.png" /></button>';
				$html .= '</form>';
				echo $html;
			}?>
		<!-- Product Availability -->
			<?php if($productACF_avail){;?>
				<span class="jkg_meta"><span class="jkg_meta_label">Availability:</span>
					<?php echo $productACF_avail; ?>
				</span>
			<?php }elseif(get_field('availability', $productID)){ ?>
				<span class="jkg_meta"><span class="jkg_meta_label">Availability:</span>
					<?php the_field('availability', $productID ) ?>
				</span>
			<?php } ;?>
		<!-- Product Deliveries -->
		<?php if($productACF_deliv){;?>
				<span class="jkg_meta"><span class="jkg_meta_label">Deliveries:</span>
					<?php echo $productACF_deliv; ?>
				</span>
			<?php }elseif(get_field('deliveries', $productID)){ ?>
				<span class="jkg_meta"><span class="jkg_meta_label">Deliveries:</span>
					<?php the_field('deliveries', $productID ) ?>
				</span>
			<?php } ;?>
		<!-- Product SKU -->
			<?php if($prd_sku){;?>
				<span class="jkg_meta"><span class="jkg_meta_label">SKU:</span>
					<?php echo $prd_sku ;?>
				</span>
			<?php };?>
		<!-- Product Categories -->
			<?php if($prd_cats){;?>
				<span class="jkg_meta"><span class="jkg_meta_label">CATEGORIES:</span>
					<?php echo $prd_cats;?>
				</span>
			<?php };?>
		</div>
	<?php }

//Adding Instructions tab
function joe_custom_tab( $tabs ) {
	if (get_field('product_instruction')){
		$tabs['the_custom_tab'] = array(
			'title'    => __( 'Instructions', 'textdomain' ),
			'callback' => 'joe_instruction',
			'priority' => 1,
		);
	}
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'joe_custom_tab' );
function joe_instruction() {
	// The new tab content
	echo get_template_part('/woocommerce/product-instructions');
}

// add_filter( 'woocommerce_product_tabs', 'yikes_woo_remove_empty_tabs', 20, 1 );
// function yikes_woo_remove_empty_tabs( $tabs ) {
// 	if ( ! empty( $tabs ) ) {
// 		foreach ( $tabs as $title => $tab ) {
// 			if ( empty( $tab['content'] ) && strtolower( $tab['title'] ) !== 'description' && strtolower( $title ) !== 'reviews' && strtolower( $title) !== 'the_custom_tab' ) {
// 				unset( $tabs[ $title ] );
// 			}
// 		}
// 	}
// 	return $tabs;
// }

//Adding custom product name
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary', 'jkg_addCustomProductName', 5 );
	function jkg_addCustomProductName() {;?>
		<?php global $product; ?>
		<?php $productID = $product->get_id(); ?>
		<!-- <div class="catProductInfo"> -->
		<h1 class="acf_product_name">
			<?php if($productACF_season){?>
				<div class="season_icon"><img src="<?php echo get_template_directory_uri() ?>/images/<?php echo $productACF_season ?>"/></div>
				<?php } else if(get_field('product_season', $productID)){?>
					<div class="season_icon"><img src="<?php echo get_template_directory_uri() ?>/images/<?php echo the_field('product_season', $productID) ?>"/></div>
			<?php }?>
			<?php if(get_field('product_name') && get_field('sub_product_name')){?>
				<?php the_field('product_name');?></br>
				<h4><?php the_field('sub_product_name');?></h4>
			<?php } else if(get_field('product_name', $productID) && get_field('sub_product_name', $productID)){
					echo the_field('product_name', $productID); ?></br>
					<h4><?php echo the_field('sub_product_name', $productID);?></h4>
			<?php } else {?>
				<?php the_title();}?>
		</h1>
	<?php }
	// remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 5 );
	// add_action( 'woocommerce_single_variation', 'removing_stock', 5 );
	// function removing_stock() {
	// echo 'TEST';
	// }

// remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
// Product Meta 
	add_action( 'woocommerce_product_meta_start', 'rd_test', 1 );
		function rd_test() {;?>
			<?php if (get_field ('availability')):?>
				<span class="jkg_meta"><span class="jkg_meta_label">Availability:</span>
					<?php the_field('availability'); ?>
				</span></br>
			<?php endif;?>
			<?php if (get_field ('deliveries')):?>
				<span class="jkg_meta"><span class="jkg_meta_label">Deliveries:</span>
					<?php the_field('deliveries'); ?>
				</span></br>
			<?php endif;?>
		<?php }		
function wc_custom_single_addtocart_text() {
	echo '<img class="jkg_atc_icon" src="'. get_template_directory_uri() .'/images/atc_icon.png" />';
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wc_custom_single_addtocart_text' );

//Remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//Remove sidebar from all single product pages
add_action( 'wp', 'jkg_remove_sidebar_product_pages' );
 
function jkg_remove_sidebar_product_pages() {
if ( is_product() ) {
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
}

//Adjusting stoc status on single product page
add_filter( 'woocommerce_get_availability', 'jkg_get_availability', 1, 2);
function jkg_get_availability( $availability, $_product ) {
	global $product;
		$prd_qty = $product->get_stock_quantity();
		$prd_status = $product->get_stock_status();
	// Change In Stock Text
    if ($prd_qty > 0) {
        $availability['availability'] = __('<i class="fas fa-smile"></i> Stock: ' . $prd_qty, 'woocommerce');
	}
	else if ($prd_status == 'instock') {
        $availability['availability'] = __('<i class="fas fa-smile"></i> Available ', 'woocommerce');
	}
	// Change Out of Stock Text
	else if ($prd_status == 'onbackorder') {
		$availability['availability'] = __('<i class="fas fa-smile"></i> Available on backorder', 'woocommerce');
	}
    //Change Out of Stock Text
    else{
        $availability['availability'] = __('<i class="fas fa-frown"></i> Sorry we are sold out on this product', 'woocommerce');
	}
    return $availability;
}

//Adding notes to single product
add_action( 'woocommerce_after_single_product' , 'jkg_add_custom_div', 5 );
function jkg_add_custom_div() {
	if(is_product()):?>
        <?php $_notes = get_field('product_notes');
            if($_notes):?>
            <div class="productNotesWrapper">
                    <?php echo '<h4>Notes</h4><p>' . $_notes . '</p>'; ?>
            </div>
			<?php endif;
	endif;
}

//Adding season icon to category page
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'jkg_AddSeasonToCategory', 15 ); 
function jkg_AddSeasonToCategory() {
	jkg_addCustomProductName();
}
//
add_action( 'woocommerce_before_add_to_cart_quantity', 'jpash_bc_qty_before' );
 
function jpash_bc_qty_before() {
 echo '<div class="qtyBefore">Qty: </div>'; 
}

add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
return '';
}

add_action( 'woocommerce_after_subcategory_title', 'custom_add_product_description', 12);
function custom_add_product_description ($category) {
$cat_id        	=    $category->term_id;
$prod_term    	=    get_term($cat_id,'product_cat');
$description	=    $prod_term->description;
 
echo '<div>'.$description.'</div>';
}

function __search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);