<?php get_header();?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<div class="wrapper Default customContent">
			<h1 class="pageTitle textCenter textUpper"><?php the_title();?></h1>
			<?php the_content(); ?>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer();?>
<h1> Test </h1>