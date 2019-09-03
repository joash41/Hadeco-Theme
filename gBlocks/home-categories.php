<section class="homeGridCat">
    <?php 
    $rd_grid_cats = get_field('featured_grid');
    $itemID = 1;
    foreach ($rd_grid_cats as $gridItem) {;?>
        <?php $thumbnail_id = get_woocommerce_term_meta( $gridItem->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );?>
        <div class="gridItem item<?php echo $itemID++;?>" <?php if ( $image ) {?> style="background-image:url(<?php echo $image;?>);" <?php };?>">
            <a href="<?php echo get_term_link( $gridItem, 'product_cat' );?>">
                <div class="content">
                    <div class="spaceMe"></div>
                    <h2 class="whiteText"><?php echo $gridItem->name;?></h2>
                </div>
            </a>
        </div>
    <?php };?>
</section>