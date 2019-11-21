<?php get_header(); the_post(); ?>			
<main id='main' class='page'>			
	<header class='page-header'>
		<h1 class="page-title">
			<?php
			if ( is_day() ) {
				/* translators: %s: Date. */
				printf( __( 'Daily Archives: %s' ), get_the_date() );
			} elseif ( is_month() ) {
				/* translators: %s: Date. */
				printf( __( 'Monthly Archives: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
			} elseif ( is_year() ) {
				/* translators: %s: Date. */
				printf( __( 'Yearly Archives: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
			} else {
				_e( 'Archives');
			}
			?>
		</h1>					
	</header>	
	<section id="content-container">
		<section id="page-content" class='list'>
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
				query_posts(array('paged' => $paged ));
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