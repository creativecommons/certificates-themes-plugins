<?php

add_filter( 'body_class', 'gf_gallery_body_classes' );

function gf_gallery_body_classes( $classes ) {
	// slugs for possible gallery pages, needed to add extra body class for these pages
	if ( is_page( array( 'gallery', 'what-if' ) ) ) {
		$classes[] = 'gallery_page';
	}

	return $classes;
}

// Enable additional oEmbed for other video sites
add_action( 'init', 'cc_cert_add_oembed_handlers' );

function cc_cert_add_oembed_handlers() {
	// kaltura for warwick
	wp_oembed_add_provider( 'https://warwick.mediaspace.kaltura.com/id/*', 'https://warwick.mediaspace.kaltura.com/oembed' );
}

function is_embed_video ($url) {
	// tests if URl is for a youtube or vimeo site
	// ---- h/t https://gist.github.com/mjangda/1623788

	// valid domain list
	$video_domains = array( 'youtube.com', 'youtu.be', 'vimeo.com', 'www.youtube.com' );
	
	// parse domain
	$domain = parse_url( $url, PHP_URL_HOST );
	
	// Check if we match the domain exactly
	if ( in_array( $domain, $video_domains ) ) return true;

}

?>