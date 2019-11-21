<header id='header'>				
	<h1 id="logo"><a href="<?php bloginfo('url') ?>">SKELETON 1.0</a></h1>
	<div id='main-menu' class="pure-menu pure-menu-horizontal">
		<ul class="menu pure-menu-list">
			<?php
			$pages = get_pages( array( 'sort_column' => 'post_title', 'sort_order' => 'desc' ) );				
			foreach( $pages as $page ):		
			?>
				<li class="pure-menu-item">
					<a href="<?php echo $page->guid ?>" class="pure-menu-link"><?php echo $page->post_title ?></a>
				</li>
			<?php endforeach ?>				
		<ul>
	</div>
</header>		