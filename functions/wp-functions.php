<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
//Register Menu
    function register_my_menus() {
        register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ),
            'side-menu' => __( 'Side Menu' ),
        )
        );
    }
    add_action( 'init', 'register_my_menus' );
//Widgets
	add_action( 'widgets_init', '_steve_widgets_init' );
    function _steve_widgets_init() {
        register_sidebar(array(
            'name' => 'Footer Full Width',
            'id'   => 'footer-column-one',
            'before_widget' => '',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>',
            'after_widget'  => ''
        ));
        register_sidebar(array(
            'name' => 'Footer Column Two',
            'id'   => 'footer-column-two',
            'before_widget' => '',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>',
            'after_widget'  => ''
        ));
        register_sidebar(array(
            'name' => 'Footer Column Three',
            'id'   => 'footer-column-three',
            'before_widget' => '',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>',
            'after_widget'  => ''
        ));
        register_sidebar(array(
            'name' => 'Footer Navigation',
            'id'   => 'footer-column-four',
            'before_widget' => '',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '<i class="fas fa-chevron-down"></i></h3>',
            'after_widget'  => ''
        ));
        register_sidebar(array(
            'name' => 'Post / Page Sidebar',
            'id'   => 'post_page_sidebar',
            'before_widget' => '<div class="postWidget %2$s">',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '<i class="fas fa-plus"></i><i class="fas fa-minus"></i></h3>',
            'after_widget'  => '</div>'
        ));
        register_sidebar(array(
            'name' => 'Shop Sidebar',
            'id'   => 'shop_sidebar',
            'before_widget' => '<div class="shopWidget %2$s">',
            'before_title'  => '<h3 class="shopWidgetTitle">',
            'after_title'   => '<i class="fas fa-plus"></i><i class="fas fa-minus"></i></h3>',
            'after_widget'  => '</div>'
        ));
        register_sidebar(array(
            'name' => 'Footer Social',
            'id'   => 'footer-social',
            'before_widget' => '',
            'before_title'  => '',
            'after_title'   => '',
            'after_widget'  => ''
        ));
    }
// Register Custom Post Type Services
    function custom_services() {

        $labels = array(
            'name'                  => _x( 'What we do', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'What we do', 'text_domain' ),
            'name_admin_bar'        => __( 'Service', 'text_domain' ),
            'archives'              => __( 'Service Archives', 'text_domain' ),
            'attributes'            => __( 'Service Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Service:', 'text_domain' ),
            'all_items'             => __( 'All Services', 'text_domain' ),
            'add_new_item'          => __( 'Add New Service', 'text_domain' ),
            'add_new'               => __( 'Add New Service', 'text_domain' ),
            'new_item'              => __( 'New Service', 'text_domain' ),
            'edit_item'             => __( 'Edit Service', 'text_domain' ),
            'update_item'           => __( 'Update Service', 'text_domain' ),
            'view_item'             => __( 'View Service', 'text_domain' ),
            'view_items'            => __( 'View Services', 'text_domain' ),
            'search_items'          => __( 'Search Service', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
            'items_list'            => __( 'Services list', 'text_domain' ),
            'items_list_navigation' => __( 'Services list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter services list', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Service', 'text_domain' ),
            'description'           => __( 'Listing all services', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-clipboard',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'what-we-do', $args );

    }
    add_action( 'init', 'custom_services', 0 );