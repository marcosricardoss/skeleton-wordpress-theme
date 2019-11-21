<?php get_header();the_post(); ?>			
<main id='main' class='page'>				
	<header class='page-header'>
		<h1 class='page-title'><?php _e( 'Oops! That page can&rsquo;t be found.' ); ?></h1>		
	</header>
	<section id="content-container">
		<section id="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></p>
			<?php get_search_form(); ?>
		</section>	
	</section>
</main>
<?php get_footer(); ?>