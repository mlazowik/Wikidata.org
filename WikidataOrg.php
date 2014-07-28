<?php

/**
 * Component with Wikidata specific modifications
 * and additions for Wikibase
 *
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  ## ##### ##### ## ## ##### ## ##### ## ##
 *  __      _____ _  _____ ___   _ _____ _
 *  \ \    / /_ _| |/ /_ _|   \ /_\_   _/_\
 *   \ \/\/ / | || ' < | || |) / _ \| |/ _ \
 *    \_/\_/ |___|_|\_\___|___/_/ \_\_/_/ \_\
 *
 */

/**
 * Entry point for for the Wikidata.org extension.
 *
 * @see README.md
 * @see https://github.com/wmde/wikidata.org
 * @license GNU GPL v2+
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( defined( 'WIKIDATA_ORG_VERSION' ) ) {
	// Do not initialize more than once.
	return 1;
}

define( 'WIKIDATA_ORG_VERSION', '0.1 alpha' );

if ( !defined( 'WB_VERSION' ) ) {
	throw new Exception( 'The Wikidata.org extension requires Wikibase to be installed.' );
}

call_user_func( function() {
	global $wgExtensionCredits, $wgHooks, $wgResourceModules;

	$wgExtensionCredits['wikibase'][] = array((
		'path' => __DIR__,
		'name' => 'Wikidata.org',
		'version' => WIKIDATA_ORG_VERSION,
		'author' => 'Bene*',
		'url' => 'https://github.com/wmde/wikidata.org',
		'descriptionmsg' => 'wikidata-org-desc'
	);

	// i18n
	$wgMessagesDirs['Wikidata.org'] = __DIR__ . '/i18n';

	// Hooks
	$wgHooks['BeforePageDisplay'][] = 'WikidataOrg\Hooks::onBeforePageDisplay';

	// Resource Loader Modules:
	$wgResourceModules = array_merge( $wgResourceModules, include( __DIR__ . '/resources/Resources.php' ) );

} );
