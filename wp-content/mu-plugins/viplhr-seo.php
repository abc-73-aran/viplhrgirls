<?php
/**
 * Plugin Name: VIPLHR SEO & Schema
 * Description: Central SEO/AEO layer - meta tags, Open Graph, structured data, sitemap hygiene and performance hints.
 * Version: 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'VIPLHR_SITE_NAME', 'VIPLHRGIRLS' );
define( 'VIPLHR_SITE_URL', 'https://viplhrgirls.com' );
define( 'VIPLHR_PHONE', '+923296905800' );
define( 'VIPLHR_PHONE_DISPLAY', '+92 329 690 5800' );
define( 'VIPLHR_OG_IMAGE', 'https://viplhrgirls.com/wp-content/themes/viplhr-luxury/images/luxury_hero.jpg' );

/**
 * Per-page meta description.
 */
function viplhr_meta_description() {
	if ( is_front_page() ) {
		return 'VIPLHRGIRLS offers premium escorts and call girls in Lahore. Elite, discreet companions in Gulberg, DHA, Johar Town and Iqbal Town. Call or WhatsApp ' . VIPLHR_PHONE_DISPLAY . ' for 24/7 bookings.';
	}
	if ( is_home() || is_page( 'blog' ) ) {
		return 'Guides, tips and updates from VIPLHRGIRLS - the premium escort and call girl service in Lahore. Learn about our elite companions and discreet booking process.';
	}
	if ( is_singular() ) {
		$excerpt = get_the_excerpt();
		if ( $excerpt ) {
			return wp_trim_words( wp_strip_all_tags( $excerpt ), 28, '...' );
		}
	}
	return 'VIPLHRGIRLS - premium, discreet escort and call girl services in Lahore, Pakistan. Available 24/7 via phone or WhatsApp at ' . VIPLHR_PHONE_DISPLAY . '.';
}

/**
 * Better titles for key pages.
 */
add_filter( 'pre_get_document_title', function ( $title ) {
	if ( is_home() || is_page( 'blog' ) ) {
		return 'Lahore Escorts & Call Girls Blog | VIPLHRGIRLS - ' . VIPLHR_PHONE_DISPLAY;
	}
	return $title;
}, 9998 );

/**
 * Head output: meta description, robots, Open Graph, Twitter cards, preconnects.
 */
add_action( 'wp_head', function () {
	$desc  = esc_attr( viplhr_meta_description() );
	$title = esc_attr( wp_get_document_title() );
	$url   = esc_url( home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) ) );
	if ( is_front_page() ) {
		$url = VIPLHR_SITE_URL . '/';
	}
	echo "\n<!-- VIPLHR SEO -->\n";
	echo '<meta name="description" content="' . $desc . '" />' . "\n";
	echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1" />' . "\n";
	echo '<meta name="geo.region" content="PK-PB" />' . "\n";
	echo '<meta name="geo.placename" content="Lahore" />' . "\n";
	echo '<meta name="geo.position" content="31.5204;74.3587" />' . "\n";
	echo '<meta property="og:locale" content="en_US" />' . "\n";
	echo '<meta property="og:type" content="website" />' . "\n";
	echo '<meta property="og:title" content="' . $title . '" />' . "\n";
	echo '<meta property="og:description" content="' . $desc . '" />' . "\n";
	echo '<meta property="og:url" content="' . $url . '" />' . "\n";
	echo '<meta property="og:site_name" content="' . VIPLHR_SITE_NAME . '" />' . "\n";
	echo '<meta property="og:image" content="' . esc_url( VIPLHR_OG_IMAGE ) . '" />' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	echo '<meta name="twitter:title" content="' . $title . '" />' . "\n";
	echo '<meta name="twitter:description" content="' . $desc . '" />' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( VIPLHR_OG_IMAGE ) . '" />' . "\n";
	echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";
	echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;600&display=swap" />' . "\n";
	if ( is_front_page() ) {
		echo '<link rel="preload" as="image" href="https://viplhrgirls.com/wp-content/themes/viplhr-luxury/images/luxury_hero.webp" />' . "\n";
	}
	echo "<!-- /VIPLHR SEO -->\n";
}, 2 );

/**
 * Structured data: LocalBusiness + WebSite sitewide, FAQPage on the front page.
 */
add_action( 'wp_head', function () {
	$business = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'LocalBusiness',
		'@id'         => VIPLHR_SITE_URL . '/#business',
		'name'        => 'VIPLHRGIRLS - VIP Lahore Escort Service',
		'description' => 'Premium elite companionship, escorts and call girl services in Lahore, Pakistan. Serving Gulberg, DHA, Johar Town, Iqbal Town and Bahria Town.',
		'url'         => VIPLHR_SITE_URL,
		'telephone'   => VIPLHR_PHONE,
		'image'       => VIPLHR_OG_IMAGE,
		'priceRange'  => '$$',
		'address'     => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => 'Lahore',
			'addressRegion'   => 'Punjab',
			'addressCountry'  => 'PK',
		),
		'geo'         => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => '31.5204',
			'longitude' => '74.3587',
		),
		'areaServed'  => array( 'Lahore', 'Gulberg', 'DHA Lahore', 'Johar Town', 'Iqbal Town', 'Bahria Town Lahore' ),
		'openingHoursSpecification' => array(
			'@type'     => 'OpeningHoursSpecification',
			'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ),
			'opens'     => '00:00',
			'closes'    => '23:59',
		),
		'sameAs'      => array(
			'https://viplhrclub.com/',
			'https://vipisbgirls.com/',
		),
	);
	$website = array(
		'@context' => 'https://schema.org',
		'@type'    => 'WebSite',
		'@id'      => VIPLHR_SITE_URL . '/#website',
		'name'     => VIPLHR_SITE_NAME,
		'url'      => VIPLHR_SITE_URL,
		'publisher' => array( '@id' => VIPLHR_SITE_URL . '/#business' ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $business, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	echo '<script type="application/ld+json">' . wp_json_encode( $website, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";

	if ( is_front_page() ) {
		$faq = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'How do I book an escort or call girl in Lahore with VIPLHRGIRLS?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Booking is simple and discreet: call or WhatsApp our concierge at ' . VIPLHR_PHONE_DISPLAY . '. Our team is available 24/7 and will arrange the perfect companion for your schedule and location in Lahore.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Which areas of Lahore does VIPLHRGIRLS serve?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'We serve all major areas of Lahore including Gulberg, DHA, Johar Town, Iqbal Town, Bahria Town and Model Town, with both in-call and out-call arrangements.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Is the service confidential?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Yes. Absolute discretion is our hallmark. Your personal information is never shared and every booking is handled privately by our concierge team.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Are companions available in other cities such as Islamabad?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Yes. Through our partner network - VIP Islamabad Girls (vipisbgirls.com) and VIP Lahore Club (viplhrclub.com) - we can arrange elite companionship in Islamabad and across our wider network.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What are the rates for call girls in Lahore?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Rates depend on the companion and the type of booking (dinner date, event or private meeting). Contact us on ' . VIPLHR_PHONE_DISPLAY . ' via phone or WhatsApp for current availability and pricing.',
					),
				),
			),
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $faq, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
}, 3 );

/**
 * Head cleanup: remove generator, RSD, wlwmanifest, shortlink.
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/**
 * Security/SEO hygiene: disable xmlrpc, author archives and user sitemaps.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

add_filter( 'wp_sitemaps_add_provider', function ( $provider, $name ) {
	return 'users' === $name ? false : $provider;
}, 10, 2 );

add_action( 'template_redirect', function () {
	if ( is_author() ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
} );
