<?php get_header(); ?>			
<main id='main' class='page'>			
	<header class="page-header">
		<h1 class='title-page'>
			<?php _e( 'Search results for:'); ?> <?php echo get_search_query(); ?>
		</h1>
	</header>
	<section id="content-container">	
		<section id="page-content" class='list'>
			<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content/content' );
					}
				} else {
					get_template_part( 'template-parts/content/content', 'none' );
				}
			?>
		</section>
		<?php get_sidebar(); ?>
	</section>
</main>
<?php get_footer(); ?>