<?php get_header();?>
<?php get_template_part('/templates/parts/page-banner');?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<div class="wrapperPage wrapper">
			<?php the_content(); ?>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer();?>