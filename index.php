<?php get_header(); global $theme_data;?>		
<main id='main' class='home'>	
	<section id="content-container">
		<section id="page-content">
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
