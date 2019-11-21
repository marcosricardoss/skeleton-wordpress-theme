<?php

/**
 * Loads the CSS fonts stylesheets.
 */
function enqueue_style_fonts() {
	/**
	*	font-family: 'Lato', sans-serif;
	*	thin 100
	*	thin 100 Italic
	*	light 300
	*	light 300 Italic
	*	regular 400
	*	regular 400 Italic
	*	bold 700
	*	bold 700 Italic
	*	black 900
	*	black 900 Italic
	*
	*	font-family: 'Montserrat', sans-serif;
	*	regular 400
	*	bold 700
	*/
	wp_enqueue_style( 'googlefonts', "https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700");			

	# local font stylesheets.
	wp_enqueue_style( 'fonts', get_bloginfo('template_directory')."/fonts/fonts.css" );
}

/**
 * Replaces Pure.css link attributes.
 */
add_filter('style_loader_tag', 'pure_style_loader_tag');
function pure_style_loader_tag($tag){
	$tag = preg_replace("/id='pure-css'/", "id='pure-css' integrity='sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47' crossorigin='anonymous'", $tag);
	return $tag;
}

/**
 * Loads the CSS stylesheets.
 */
function enqueue_styles() {
	# fonts
	enqueue_style_fonts();

	# bootstrap		
	# wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css' );	

	# pure.css
	wp_enqueue_style( 'pure', "https://unpkg.com/purecss@1.0.1/build/pure-min.css" );

	# theme stylesheet.
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	# template stylesheet.
	wp_enqueue_style( 'template', get_bloginfo('template_directory')."/css/template.css" );
	
	if(is_home()) {
		# home stylesheet.
		wp_enqueue_style( 'home', get_bloginfo('template_directory')."/css/home.css" );	
	}	else {
		# inner stylesheet.
		wp_enqueue_style( 'inner', get_bloginfo('template_directory')."/css/inner.css" );
	}
}

/**
 * Loads the JS scripts.
 */
function register_scripts() {
	# jquery
	wp_register_script( 'jquery-custom', "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js");
	# wp_enqueue_script( 'jquery-custom' );

	# bootstrap
	wp_register_script( 'boostrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js' );
	# wp_enqueue_script( 'boostrap' );
	
	# modernizr
	wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js');
	# wp_enqueue_script( 'modernizr' );	
	
	# fontawesome
	wp_register_script( 'fontawesome', "https://use.fontawesome.com/ef6ae0d04e.js" );
	# wp_enqueue_script( 'fontawesome' );	
	
	# prefixfree
	wp_register_script( 'prefixfree', 'https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js' );   
  # wp_enqueue_script( 'prefixfree' );
}

/** 
 * Sets up theme defaults and registers support for some WordPress features.
 */
function theme_setup() {
		
	# add to theme supporte fot featured image 
	add_theme_support("post-thumbnails");
	
	# custom thumbnails
	add_image_size( 'thumb-custom', 250, 250, true );
		
	
	# This feature enables Automatic Feed Links for post and comment in the head
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.	 * 
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	# Google analitycs code
	add_action( 'wp_enqueue_scripts', 'google_analityc_code' );
	
	# add the initializing the types of custom post
	# require_once(dirname(__FILE__).'/inc/custom_post_type.php');
	
	# ordering the administration menu
	# require_once(dirname(__FILE__).'/inc/menu-order-admin.php');
	
}
add_action( 'after_setup_theme', 'theme_setup' ); #action

/**
 * Scripts initialization
 * 
 * Loads the JS scripts and the CSS stylesheets.
 */
function init_script() {			
	# enqueuing styles
	enqueue_styles();

	# registering scripts
	register_scripts();	
		
	# main script   
	wp_register_script( 'main-js', get_bloginfo('template_directory')."/js/main.js" );   
	wp_enqueue_script( 'main-js' );
	
	# seding varibles to the 'main' script 
	$global_vars = array( 'template_url' => get_bloginfo('template_url') ); # varibles
	wp_localize_script( 'main', 'vars', $global_vars ); # seding varibles	
}				
add_action ('wp_enqueue_scripts', 'init_script'); # action

/**
 * Summarize text
 * 
 * Print the summarize a certain text passed by parameter.
 * 
 * @param $excerpt Contents to be summarized
 * @return $limit Summary limit
 */
function excerpt($excerpt=null, $limit) {
	if($excerpt==null)	
		$excerpt = explode(' ', get_the_excerpt(), $limit);
	else 
		$excerpt = explode(' ', $excerpt, $limit);	
	
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);	
	$excerpt = implode(" ",$excerpt).'...';
		
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]] ]`','',$excerpt);
	echo $excerpt;
}

/**
 * Filtering result search
 * 
 * Select the categories that'll be part of result.
 * 
 * @param $query object of search
 * @return $query object filtered
 */
function search_select_cats( $query ) {
	if( $query->is_admin )
		return $query;
	if( $query->is_search ) {
		$query->set('post_type', array('news','products')); 	
		$query->set('post__not_in', array( 0, 0, 0, 0 ) );	
	}
	return $query;
}
# add_filter( 'pre_get_posts' , 'search_select_cats' ); # filter

/**
 * Adds extra fields on the general setting page.
*/
function my_general_settings_register_fields() {
	register_setting('general', 'twitter_account', 'esc_attr');
	add_settings_field('twitter_account', '<label for="twitter_account">'.__('Twitter Account' , 'twitter_account' ).'</label>' , 'my_general_settings_fields_html', 'general');
}
add_filter('admin_init', 'my_general_settings_register_fields');
 
function my_general_settings_fields_html() {
    $value = get_option( 'twitter_account', '' );
		echo '<input type="text" id="twitter_account" name="twitter_account" value="' . $value . '" />';
		echo '<p class="description" id="tagline-twitter-account">Text website\'s Twitter account.</p>';
}

/**
 * Google analytic code
 *
 * Add the google analytic code in the end of the head tag.
 * 
*/
function google_analityc_code() { ?>

	<script type="text/javascript">

		 var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<google-account-here>']);
		_gaq.push(['_setDomainName', 'none']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	
	</script>
	
<?php }