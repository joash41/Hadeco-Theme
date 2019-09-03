<?php get_header();?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
        <div class="whiteBkg">
            <div class="wrapper sPostWrapper customContent">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div class="breadCrumbsWrapper"><p id="breadcrumbs">','</p></div>');} ?>
                <div class="sideBarContent">
                    <h1><?php the_title();?></h1>
                    <?php the_content(); ?>
                </div>
                <div id="sidebar">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
	<?php endwhile; endif; ?>
<?php get_footer();?>