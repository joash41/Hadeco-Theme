<section class="usps">
    <div class="wrapper">
        <?php if ( get_field('shipping_note','options') ) : ?>
            <div class="singleUSP">
                    <i class="fas fa-shipping-fast"></i>
                    <div class="uspContent"><?php echo get_field('shipping_note','options'); ?></div>
            </div>
        <?php endif; ?>
        <?php if ( get_field('telephone_number','options') ) : ?>
            <div class="singleUSP">
                    <i class="fas fa-phone"></i>
                    <div class="uspContent"><?php echo get_field('telephone_number','options'); ?></div>
            </div>
        <?php endif; ?>
        <?php if ( get_field('email','options') ) : ?>
            <div class="singleUSP">
                    <i class="fas fa-envelope"></i>
                    <div class="uspContent"><?php echo get_field('email','options'); ?></div>
            </div>
        <?php endif; ?>
        <?php if ( get_field('message','options') ) : ?>
            <div class="singleUSP">
                    <i class="fas fa-globe"></i>
                    <div class="uspContent"><?php echo get_field('message','options'); ?></div>
            </div>
        <?php endif; ?>
    </div>
</section>