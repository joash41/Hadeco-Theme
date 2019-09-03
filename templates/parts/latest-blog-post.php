<?php 
    $args = array( 
        'numberposts' => '1', 
    );
    $recent_posts = wp_get_recent_posts( $args );
    foreach( $recent_posts as $recent ):

    $post_id            = $recent['ID'];
    $post_url           = get_permalink($recent['ID']);
    $post_title         = $recent['post_title'];
    $post_content       = $recent['post_content'];
    $post_thumbnail     = get_the_post_thumbnail($recent['ID']);
    $post_thumbnail_url = get_the_post_thumbnail_url($recent['ID']);

    endforeach;
?>
<section class="latestBlogWrapper">
    <div class="blogFeaturedImgWrapper" style="background-image: url('<?= $post_thumbnail_url ?>')"></div>
    <div class="blogInfoWrapper">
        <h4>FROM OUR BLOG</h4>
        <h2><?= $post_title ?></h2>
        <div class="link-wrapper"><a href="<?= $post_url ?>">READ MORE</a></div>
    </div>
</div>
