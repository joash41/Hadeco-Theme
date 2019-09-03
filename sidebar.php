<?php if(is_shop() || is_product_category()):?>
    <section id="shopSideBar">
        <div class="sideInnerWrap">
            <?php dynamic_sidebar( 'shop_sidebar' ); ?>
        </div>
    </section>
<?php else: ?>
    <?php dynamic_sidebar( '[post_page_sidebar]' ); ?>
<?php endif;?>