<div class="topNav">
<?php if ( is_user_logged_in() ) : ?>
    <a class="myAccount" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>">
        <i class="fas fa-user"></i><?php _e('MY ACCOUNT','woothemes'); ?>
    </a>
<?php else : ?>
    <a class="myAccount" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>">
    <i class="fas fa-sign-in-alt"></i><?php _e('LOGIN / REGISTER','woothemes'); ?>
    </a>
<?php endif ;?>
    <div class="cart">
        <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $count = WC()->cart->cart_contents_count;?>
                <?php 
                if ( $count > 0 ) {
                    ?>
                    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                        <span class="cart-contents-count">
                            <img src="<?php echo get_template_directory_uri()?>/images/svg/cart_icon.svg" />
                            <span class="cartTotal"><?php echo WC()->cart->get_cart_total(); ?></span>
                            <span class="numOfItemsInCart"><?php echo esc_html( $count ); ?></span>
                        </span>
                    <?php
                }?>
                    </a>
        <?php } ?>
    </div>
</div>