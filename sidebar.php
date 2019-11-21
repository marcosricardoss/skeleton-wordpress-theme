<aside id="sidebar">	
		<?php get_search_form(); ?>	
		
		<div id="categories">
			<h4><?php _e("Categories") ?></h4>
			<ul>
				<?php wp_list_categories(array(
					'title_li' => '',
					'orderby' => 'name'
				)); ?> 
			</ul>
		</div>

		<div id="archive">
			<h4><?php _e("Archives") ?></h4>
			<ul>
				<?php 
					$args = array(
						'type'            => 'monthly',
						'limit'           => '',
						'format'          => 'html', 
						'before'          => '',
						'after'           => '',
						'show_post_count' => false,
						'echo'            => 1,
						'order'           => 'DESC',
						'post_type'     => 'post'
					);
					wp_get_archives( $args ); 
				?>
			</ul>
		</div>
		
		<?php if(get_the_tag_list()): ?>
			<div id="tags">
				<h4><?php _e("Tags") ?></h4>
				<?php echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>'); ?>
			</div>
		<?php endif ?>
	
	</aside>