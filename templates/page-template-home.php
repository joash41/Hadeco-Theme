<?php 
/* 
    * Template Name: Home Page 
    * Template Post Type: page
*/ ?>
<?php get_header();?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<div class="homeWrapper">
			<div><h1 class="pageTitle"><?php the_title(); ?></h1></div>
			<?php the_content(); ?>
			<?php get_template_part('/templates/parts/latest-blog-post');?>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer();?>