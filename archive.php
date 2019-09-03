<?php 
    get_header();
        ?>
            <div class="searchBlogWrapper wrapper">
                <div class="searchBlogText">Search for a blog post: </div>
                <div class="searchBlogField"><?php get_search_form(); ?></div>
            </div>
            <div id="hadecobog">
                <div class="wrapper">
<?php
                if ( get_query_var('paged') ) {

                $paged = get_query_var('paged');

                } elseif ( get_query_var('page') ) {

                $paged = get_query_var('page');

                } else {

                $paged = 1;

                }

                query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); 

                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                            ?>
                                <?php if($featured_img_url){?> 
                                    <div class="postimgblock">
                                        <a href="<?php echo the_permalink();?>">
											<div class="postImageWrapper" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
											</div></a>
                                        <a href="<?php echo the_permalink();?>"><h2><?php the_title();?></h2></a>
                                        <a class="button" href="<?php echo the_permalink();?>">Read More</a>
                                    </div>
                                <?php }?>
                            <?php endwhile; endif; 

                        wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="wrapper paging">
                <div class="nav-next alignleft"><?php previous_posts_link( '<i class="fas fa-chevron-left"></i> Newer posts' ); ?></div>
				<div class="nav-previous alignright"><?php next_posts_link( 'Older posts <i class="fas fa-chevron-right"></i>' ); ?></div>
            </div>
        <?php
    get_footer();
?>