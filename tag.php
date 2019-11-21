<?php get_header(); the_post(); ?>			
<main id='main' class='page'>		
	<header class='page-header'>
		<h1 class="page-title">
			<?php printf( __( 'tag: %s'), single_tag_title( '', false ) ); ?>
		</h1>					
	</header>				
	<section id="content-container">
		<section id="page-content" class='list'>
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
				query_posts(array('tag' => single_tag_title( '', false ), 'paged' => $paged ));
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
<?php get_template_part( 'template-parts/footer/footer', 'page' ); ?>		
<?php get_footer(); ?>