<section class="homeProductSlider wrapper">
    <?php 
        $featured_product_slider = get_field('featured_product_slider');
        $prd_qty = get_field('product_qty');
        $catName = $featured_product_slider->slug;
        echo do_shortcode('[products columns="3" limit="'.$prd_qty.'" category="'.$catName.'"]');
    ?>
</section>