<!DOCTYPE html lang="en">
<!--[if lt IE 7 ]> <html class="ie ie6 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 lte9 lte8 no-js"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 lte9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="notie no-js"> <!--<![endif]-->
	<head>	
		<?php #facebook ?>		 
		<meta property="og:locale" content="en" >		
		<meta property="og:image:height" content="256">		
		<meta property="og:image:type" content="image/jpeg">
		<meta property="og:image:width" content="256">
	
		<?php #twitter ?>
		<meta name="twitter:card" value="summary">		
		<meta name="twitter:creator" content="<?php echo get_option('twitter_account') ?>">	
		<meta name="twitter:site" content="<?php echo get_option('twitter_account') ?>">
		
		<?php if(is_single()):?>		

			<?php
			$ID = $wp_query->post->ID;
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($ID) );
			?>			

			<?php #twitter ?>
			<meta name="twitter:card" content="summary_large_image">			
			<meta name="twitter:description" content="<?php excerpt( get_the_excerpt(), 20) ?>">			
			<meta name="twitter:image" content="<?php echo $feat_image; ?>">
			<meta name="twitter:title" content="<?php the_title() ?>">
			
			<?php #facebook ?>					
			<meta property="article:author" content="<?php echo get_author_name() ?>">
			<meta property="article:section" content="<?php $cat = get_the_category(); echo $cat[1]->name; ?>">			
			<meta property="article:published_time" content="<?php echo get_the_date() ?>">
			<meta property="og:description" content='<?php excerpt( get_the_excerpt(), 20) ?>'>
			<meta property="og:image" content="<?php echo $feat_image; ?>"/>
			<meta property="og:title" content="<?php the_title() ?>" >	
			<meta property="og:type" content="article">			
			<meta property="article:tag" content="<?php echo strip_tags(get_the_tag_list('',' , ','')); ?>">
			<meta property="og:url" content="<?php the_permalink() ?>" >
			
			<?php #default ?>
			<meta content="<?php the_title() ?>" name="title" >	
			<meta content="<?php excerpt( get_the_excerpt(), 20) ?>" name="description" />
			
		<?php else: ?>
			
			<?php #twitter ?>
			<meta name="twitter:card" content="summary_large_image">			
			<meta name="twitter:title" content="<?php bloginfo( 'name' ); ?>">
			<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>">
			<meta name="twitter:image" content="<?php echo get_site_icon_url() ?>">
								
			<?php #facebook ?>
			<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" >				
			<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
			<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
			<meta property="og:image" content="<?php echo get_site_icon_url() ?>">
			<meta property="og:url" content="<?php bloginfo('url') ?>" >	
			<meta property="og:type" content="website">
			
			<?php #default ?>
			<meta content="<?php bloginfo( 'name' ); ?>" name="title" >	
			<meta content="<?php bloginfo( 'description' ); ?>" name="description" />
			
		<?php endif ?>	

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">		
		<link rel="profile" href="http://gmpg.org/xfn/11">					
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?><link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php endif; ?>
		
		<?php wp_head() ?>			

		<title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></title>		

	</head>
	<body <?php body_class(); ?> >

	<div id='container' class='inner'>				
		<?php get_template_part( 'template-parts/header/site', 'branding'); ?>