<?php
add_filter( 'wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_append_link' );
function yoast_seo_breadcrumb_append_link( $links ) {
    global $post;
    if ( !is_singular ( 'careers' ) ) {
        $breadcrumb[] = array(
            'url' => site_url( '/category/blog/' ),
            'text' => 'Blog',
        );
        array_splice( $links, 1, -2, $breadcrumb );
    }
    return $links;
}