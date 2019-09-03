<?php
include_once('acf/acf-gravity_forms.php');
// BC Theme Options
    if( function_exists('acf_add_options_page') ) {
        $option_page = acf_add_options_page(array(
            'page_title' 	=> 'Theme Settings',
            'menu_title' 	=> 'Theme Settings',
            'menu_slug' 	=> 'custom-theme-settings',
            'capability' 	=> 'edit_posts',
            'icon_url' => get_template_directory_uri(). '/images/admin/bc-theme.png' ,
            'redirect' 	=> false,
            'position' => 2
        ));
        $option_page = acf_add_options_page(array(
            'page_title' 	=> 'Testimonials',
            'menu_title' 	=> 'Testimonials',
            'menu_slug' 	=> 'theme-testimonials',
            'capability' 	=> 'edit_posts',
            'redirect' 	=> false,
            'position' => 2,
            "parent_slug" => 'custom-theme-settings'
        ));
        $option_page = acf_add_options_page(array(
            'page_title' 	=> 'Our Clients',
            'menu_title' 	=> 'Our Clients',
            'menu_slug' 	=> 'theme-our-clients',
            'capability' 	=> 'edit_posts',
            'redirect' 	=> false,
            'position' => 2,
            "parent_slug" => 'custom-theme-settings'
        ));
        $option_page = acf_add_options_page(array(
            'page_title' 	=> 'Settings',
            'menu_title' 	=> 'Settings',
            'menu_slug' 	=> 'wwd-settings',
            'capability' 	=> 'edit_posts',
            "parent_slug" => 'edit.php?post_type=what-we-do'
        ));
    }