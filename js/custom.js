$(window).scroll(function() {
    var scroll = $(window).scrollTop();
     //>=, not <=
    if (scroll >= 50) {
        $("body").addClass("scrolled");
    }else{
        $("body").removeClass("scrolled");
        $("#menu-wrapper").removeClass("miniMenu");
    }
});
$(document).ready(function(){
    //Flickity
    jQuery('.homeProductSlider ul.products').flickity({
        // options
        cellAlign: 'center',
        contain: true,
        wrapAround: true,
        pageDots: false,
        autoPlay: true,
        selectedAttraction: 0.04,
        friction: 0.5
    });

	
    // Flickity End
    $('li.menuIcon.Facebook a').prepend('<i class="fab fa-facebook-square"></i>');
    $('li.menuIcon.Mail a').prepend('<i class="fas fa-at"></i>');
    $('li.menuIcon.Address a').prepend('<i class="fas fa-map-marker"></i>');
    $('li.menuIcon.Telephone a').prepend('<i class="fas fa-phone"></i>');
    $('li.menuIcon.Twitter a').prepend('<i class="fab fa-twitter"></i>');
    $('li.menuIcon.Youtube a').prepend('<i class="fab fa-youtube"></i>');
    $('li.menuIcon.Instagram a').prepend('<i class="fab fa-instagram"></i>');
    $('li.menuIcon.Linkedin a').prepend('<i class="fab fa-linkedin-in"></i>');
    $('li.menuIcon.Map a').prepend('<i class="fas fa-map-marker-alt"></i>');
    $('li.menuIcon.Pinterest a').prepend('<i class="fab fa-pinterest"></i>');
    $('li.woocommerce-MyAccount-navigation-link--dashboard a').prepend('<i class="fas fa-tachometer-alt"></i>');
    $('li.woocommerce-MyAccount-navigation-link--orders a').prepend('<i class="fas fa-truck"></i>');
    $('li.woocommerce-MyAccount-navigation-link--downloads a').prepend('<i class="fas fa-download"></i>');
    $('li.woocommerce-MyAccount-navigation-link--edit-address a').prepend('<i class="fas fa-address-book"></i>');
    $('li.woocommerce-MyAccount-navigation-link--edit-account a').prepend('<i class="fas fa-user"></i>');
    $('li.woocommerce-MyAccount-navigation-link--customer-logout a').prepend('<i class="fas fa-sign-out-alt"></i>');
    $('li.woocommerce-MyAccount-navigation-link--account-wishlists a').prepend('<i class="fas fa-gift"></i>');
    $('li.woocommerce-MyAccount-navigation-link--waitlist a').prepend('<i class="fas fa-clock"></i>');
    $('ul.product-categories li.cat-item.cat-parent').prepend('<i class="fas fa-plus"></i><i class="fas fa-minus"></i>');
    $('ul.product-categories li.cat-item.cat-parent').on('click', function(e) {$(this).toggleClass('active');});
    $('.product .icon-wrapper').on('click', function(e) {$(this).parent().addClass('active');});
    $('.close').on('click', function(e) {$(this).closest('.product').removeClass('active');});
    // $('a.remove').prepend('<i class="far fa-trash-alt"></i>');
    $('a.wl-add-to.star').prepend('<i class="far fa-heart"></i>');
    $('.wl-already-in ul li a').prepend('<i class="fas fa-heart"></i>');
    $('li.menuIcon.menu-item-has-children').prepend('<i class="fas fa-plus"></i><i class="fas fa-minus"></i>');
    $('li.menuIcon.menu-item-has-children').on('click', function(e) {$(this).toggleClass('active');});
    $('.mobileNav').on('click', function(e) {$('#menu-wrapper .menu').toggleClass('active');});
    $('.mobileNav').on('click', function(e) {$('#header').toggleClass('active');});
    $('#sidebar .widgettitle').on('click', function(e) {$(this).parent().toggleClass('active');});
    $('#shopSideBar .shopWidgetTitle').on('click', function(e) {$(this).parent().toggleClass('active');});
    $('#footer .widgettitle').on('click', function(e) {$(this).parent().toggleClass('active');});
    // Accordion
    $('.accordiontoggler').on('click',function(){$(this).parent().toggleClass('active');});
    AOS.init();
});