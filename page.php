<?php get_header();the_post(); ?>			
<main id='main' class='page'>				
	<?php get_template_part( 'template-parts/header/page'); ?>
	<?php get_template_part( 'template-parts/content/content', 'page'); ?>	
</main>
<?php get_footer(); ?>