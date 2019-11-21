<?php get_header();the_post(); ?>			
<main id='main' class='page single'>				
	<?php get_template_part( 'template-parts/header/page'); ?>
	<?php get_template_part( 'template-parts/content/content', 'single'); ?>		
	<?php get_template_part( 'template-parts/footer/footer', 'single' ); ?>
</main>
<?php get_footer(); ?>