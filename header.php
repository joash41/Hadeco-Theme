<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            <?php 
            if ( is_front_page() ){ echo 'Home'; echo ' | ';  bloginfo( 'name' );}
            else { echo wp_title(''); echo ' | ';  bloginfo( 'name' );}?>
        </title>
            <link href="<?php echo get_template_directory_uri();?>/css/aos.css" rel="stylesheet">
            <script src="<?php echo get_template_directory_uri();?>/js/aos.js"></script>
        <?php wp_head(); ?>
    </head>
    <div class="siteWrap">
        <header id="header" class="normal">
            <div class="wrapper">
                <?php echo get_template_part('templates/parts/topnav');?>
                <a id="logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png"/></a>
                <nav id="menu-wrapper" class="hi_nav">
                    <div class="mobileNav" style="display:none">
                        <span class="mobileMenuTog"><i class="fas fa-bars"></i> MENU</span>
                    </div>
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </nav>
                <?php echo do_shortcode( '[woocommerce_product_search title="yes" placeholder="Search Products"]' );?>
            </div>
            <?php get_template_part('/templates/parts/usps');?>
        </header>
        <body id="hi_wrapper" <?php body_class(); ?>>
        <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                    s1.async=true;
                    s1.src='https://embed.tawk.to/5d43f7e67d27204601c8e9a2/default';
                    s1.charset='UTF-8';
                    s1.setAttribute('crossorigin','*');
                    s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
        <!--End of Tawk.to Script-->
        <div class="pageContent">