<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header>
	<div class="entry-content">
		<?php the_post_thumbnail('medium') ?>
		<?php the_content() ?>
		<a class="pure-button" href="<?php the_permalink() ?>">Ler mais</a>
	</div>
</article>
