<?php get_header(); ?>
<div class="whiteBkg ptb40">
	<div class="wrapper">

		<div class="content-left">
			<div id="search-wrap">

			<?php if (have_posts()) : ?>
				<h1 class="pageTitle textCenter">Search Results for : <?php echo get_search_query(); ?></h1>

				<?php while (have_posts()) : the_post(); ?>

					<div class="narrow post">
						<a href="<?php the_permalink() ?>">
							<div class="post-featured-image" style="background-image: url('<?php if ( has_post_thumbnail()) { ?>
										<?php the_post_thumbnail_url('medium');
									} else { ?><?php echo get_template_directory_uri();?>/images/search.png<?php } ?>');">
								
									
								
							</div><!--blogpost-featured-image-->
						</a>
						<div class="post-excerpt">
							<h2>
								<span><?php if ( get_post_type( get_the_ID() ) == 'post' ) {
										echo 'Blog Post';
									}else{
										echo get_post_type( get_the_ID());
									};?>
									</span>
								<a href="<?php the_permalink() ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<div class="post-readmore">
								<?php the_excerpt();?>
								<a class="button line narrow" href="<?php the_permalink(); ?>">
									<?php if ( get_post_type( get_the_ID() ) == 'product' ) {
										echo 'View Product';
									}else{
										echo 'Read more';
									};?>
								</a>
							</div><!--post-readmore-->
						</div><!--post-excerpt-->
					</div><!--post-->

				<?php endwhile; ?>
				<div class="paginations">
					<?php echo paginate_links( $args ); ?>
				</div>
			<?php else : ?>
				<h4>Nothing found for your search result.</br>Please search again.</h4>
				<div class="search noResult">
					<?php get_search_form( );?>
				</div>
			<?php endif; ?>
			</div><!--category-post-left-->
		</div><!--content-left-->
		<div class="clear"></div>

	</div><!--wrapper-->
</div>
<?php get_footer(); ?>
