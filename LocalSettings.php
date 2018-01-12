<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "includes/DefaultSettings.php" );

# If PHP's memory limit is very low, some operations may fail.
ini_set( 'memory_limit', '128M' );
# Increase max shell memory for inkscape conversion of large pathways
$wgMaxShellMemory = 512 * 1024;

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
} elseif ( empty( $wgNoOutputBuffer ) ) {
	## Compress output if the browser supports it
	if( !ini_get( 'zlib.output_compression' ) ) @ob_start( 'ob_gzhandler' );
}

$wgSitename         = "WikiPathways";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
$wgScriptPath       = '';

$wgThumbnailScriptPath = "$wgScriptPath/thumb.php";

## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL

$wgEnableEmail      = true;
$wgEnableUserEmail  = true;

$wgEmergencyContact = "webmaster@localhost";
$wgPasswordSender = "webmaster@localhost";

## Turn of httponly cookies, otherwise the applet will not
## have access to the authentication cookies
$wgCookieHttpOnly = false;
$wgCookieExpiration = 604800;  #7 days

## For a detailed description of the following switches see
## http://meta.wikimedia.org/Enotif and http://meta.wikimedia.org/Eauthent
## There are many more options for fine tuning available see
## /includes/DefaultSettings.php
## UPO means: this is also a user preference option
$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
$wgDBport           = "5432";
$wgDBprefix         = "";

if( !isset( $wpiJavascriptSnippets ) ) $wpiJavascriptSnippets = array();
if( !isset( $wpiJavascriptSources ) ) $wpiJavascriptSources = array();

require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );
require_once( "$IP/extensions/ConfirmEdit/QuestyCaptcha.php" );
$wgCaptchaClass = 'QuestyCaptcha';

# Load passwords/usernames
require_once('pass.php');
# Load globals
require_once('wpi/globals.php');

# Default javascript locations
//if( !isset( $jsJQuery ) ) $jsJQuery = "$wgScriptPath/skins/wikipathways/jquery-1.8.3.min.js"; //js/jquery/jquery-1.5.1.js";
if( !isset( $jsJQueryUI ) ) $jsJQueryUI = "$wgScriptPath/wpi/js/jquery-ui/jquery-ui-1.8.10.custom.min.js";
if( !isset( $cssJQueryUI ) ) $cssJQueryUI = "$wgScriptPath/wpi/js/jquery-ui/jquery-ui-1.8.10.custom.css";
if( !isset( $jsSvgWeb ) ) $jsSvgWeb = "$wgScriptPath/wpi/js/svgweb/svg-uncompressed.js\" data-path=\"$wgScriptPath/wpi/js/svgweb";
$jsRequireJQuery = false; //Only load jquery when required by extension

# Schemas for Postgres
$wgDBmwschema       = "mediawiki";
$wgDBts2schema      = "public";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = true;
$wgUploadPath = $wgScriptPath."/img_auth.php";

##Extensions
$wgUseImageResize      = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
# $wgHashedUploadDirectory = false;

## User ID for UserLoginLog extension
$wgServerUser = 101;

## Enable AJAX
$wgUseAjax = true;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = false;

$wgLocalInterwiki   = $wgSitename;

$wgLanguageCode = "en";

$wgProxyKey = "b748562511ea57982358c30cec614e30b52b75119e3df78ac554eec5f69343cf";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'wikipathways';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
# $wgEnableCreativeCommonsRdf = true;
$wgRightsPage = "WikiPathways:License_Terms"; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/publicdomain/zero/1.0/";
$wgRightsText = "our terms of use";
$wgRightsIcon = "https://licensebuttons.net/p/zero/1.0/88x31.png";
# $wgRightsCode = ""; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$configdate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
$wgCacheEpoch = max( $wgCacheEpoch, $configdate );

$wgGroupPermissions['autoconfirmed']['autoconfirmed'] = false;

$wgGroupPermissions['*'    ]['createaccount']   = true;

//Disable read for all users, this will be handled by the private pathways extension
//$wgGroupPermissions['*'    ]['read']            = true;

$wgGroupPermissions['*'    ]['edit']            = false;
$wgGroupPermissions['*'    ]['createpage']      = false;
$wgGroupPermissions['*'    ]['createtalk']      = false;

#Non-defaults:

#Allow slow parser functions ({{PAGESINNS:ns}})
$wgAllowSlowParserFunctions = true;

#Logo
$wgLogo = "$wgScriptPath/skins/common/images/earth-or-pathway_text3_beta.png";

#Allow gpml extension and larger image files
$wgFileExtensions = array( 'pdf', 'png', 'gif', 'jpg', 'jpeg', 'svg', 'gpml', 'mapp');
$wgUploadSizeWarning = 1024 * 1024 * 5;

## Better SVG converter
/** Pick one of the above */
$wgSVGConverter = 'inkscape';
$wgSVGConverters['inkscape'] = '$path/inkscape -z -b white -w $width -f $input -e $output';

##$wgMimeDetectorCommand = "file -bi"; #This doesn't work for svg!!!
##$wgCheckFileExtensions = false;

# Allow direct linking to external images (so we don't have to upload them to the wiki)
$wgAllowExternalImages = true;

# Ontology data

# Ontologies in JSON format for use in the Javascript
# Format : ["<Ontology Name>", <Ontology Id>, <Version Id>]
$wgOntologiesJSON = '[' . '["Pathway Ontology","PW:0000001",1035,46237,"PW"]' . ',' . '["Disease","DOID:4",1009,46309,"DOID"]' . ',' . '["Cell Type","CL:0000000",1006,46163,"CL"]]';
# Ontologies Array to be used in the PHP Code
$wgOntologiesArray = json_decode($wgOntologiesJSON);
# Email address for the User Identification parameter to be used while making REST calls to BioPortal
$wgOntologiesBioPortalEmail =  "apico@gladstone.ucsf.edu";
# Maximum number of search results returned while searching BioPortal
$wgOntologiesBioPortalSearchHits =  12;
# Time after which data in the cache is refreshed (in Seconds)
$wgOntologiesExpiryTime = 60*60*24*7;

##Custom namespaces
define("NS_PATHWAY", 102); //NS_PATHWAY is same as NS_GPML since refactoring
define("NS_PATHWAY_TALK", 103);
define("NS_GPML", 102);
define("NS_GPML_TALK", 103);
define("NS_WISHLIST", 104);
define("NS_WISHLIST_TALK", 105);
define("NS_PORTAL", 106);
define("NS_PORTAL_TALK", 107);
define("NS_QUESTION", 108);
define("NS_QUESTION_TALK", 109);

$wgExtraNamespaces[100]              = "Pw_Old";
$wgExtraNamespaces[101]              = "Pw_Old_Talk";
$wgExtraNamespaces[NS_PATHWAY]       = "Pathway";
$wgExtraNamespaces[NS_PATHWAY_TALK]  = "Pathway_Talk";
$wgExtraNamespaces[NS_WISHLIST]      = "Wishlist";
$wgExtraNamespaces[NS_WISHLIST_TALK] = "Wishlist_Talk";
$wgExtraNamespaces[NS_PORTAL]        = "Portal";
$wgExtraNamespaces[NS_PORTAL_TALK]   = "Portal_Talk";

$wgNamespacesToBeSearchedDefault[100] = false;
$wgNamespacesToBeSearchedDefault[101] = false;
$wgNamespacesToBeSearchedDefault[NS_PATHWAY]      = true;
$wgNamespacesToBeSearchedDefault[NS_PATHWAY_TALK] = true;

$wgContentNamespaces += array(NS_PATHWAY, NS_PATHWAY_TALK);

##Protecting non-pathway namespaces from user edits
$wgNamespaceProtection[NS_HELP]          = array( 'help-edit' );
$wgNamespaceProtection[NS_HELP_TALK]     = array( 'help-talk-edit' );
$wgNamespaceProtection[NS_PATHWAY]       = array( 'pathway-edit' );
$wgNamespaceProtection[NS_PATHWAY_TALK]  = array( 'pathway-talk-edit' );
$wgNamespaceProtection[NS_WISHLIST]      = array( 'wishlist-edit' );
$wgNamespaceProtection[NS_WISHLIST_TALK] = array( 'wishlist-talk-edit' );
$wgNamespaceProtection[NS_PORTAL]        = array( 'portal-edit' );
$wgNamespaceProtection[NS_PORTAL_TALK]   = array( 'portal-tlk-edt' );

$wgGroupPermissions[ '*'          ][ 'read'                  ] = true;
$wgGroupPermissions[ '*'          ][ 'edit'                  ] = false;
$wgGroupPermissions[ '*'          ][ 'createpage'            ] = false;
$wgGroupPermissions[ '*'          ][ 'createtalk'            ] = false;
$wgGroupPermissions[ '*'          ][ 'move'                  ] = false;
$wgGroupPermissions[ '*'          ][ 'delete'                ] = false;

$wgGroupPermissions[ 'user'       ][ 'read'                  ] = true;
$wgGroupPermissions[ 'user'       ][ 'edit'                  ] = false;
$wgGroupPermissions[ 'user'       ][ 'createpage'            ] = false;
$wgGroupPermissions[ 'user'       ][ 'createtalk'            ] = false;
$wgGroupPermissions[ 'user'       ][ 'upload'                ] = false;
$wgGroupPermissions[ 'user'       ][ 'reupload'              ] = false;
$wgGroupPermissions[ 'user'       ][ 'reupload-shared'       ] = false;
$wgGroupPermissions[ 'user'       ][ 'minoredit'             ] = false;
$wgGroupPermissions[ 'user'       ][ 'move'                  ] = false;
$wgGroupPermissions[ 'user'       ][ 'move-subpages'         ] = false;
$wgGroupPermissions[ 'user'       ][ 'delete'                ] = false;

$wgGroupPermissions[ 'confirmed'  ][ 'read'                  ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'edit'                  ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'createpage'            ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'createtalk'            ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'createpathway'         ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'upload'                ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'reupload'              ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'reupload-shared'       ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'move'                  ] = false;
$wgGroupPermissions[ 'confirmed'  ][ 'move-subpages'         ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'delete'                ] = false;
$wgGroupPermissions[ 'confirmed'  ][ 'pathway-edit'          ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'pathway-talk-edit'     ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'wishlist-edit'         ] = true;
$wgGroupPermissions[ 'confirmed'  ][ 'wishlist-talk-edit'    ] = true;

$wgGroupPermissions[ 'bureaucrat' ][ 'read'                  ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'edit'                  ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'createtalk'            ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'createpage'            ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'move'                  ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'move-subpages'         ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'upload'                ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'reupload'              ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'reupload-shared'       ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'delete'                ] = false;
$wgGroupPermissions[ 'bureaucrat' ][ 'main-edit'             ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'main-talk-edit'        ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'help-edit'             ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'help-talk-edit'        ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'portal-edit'           ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'portal-tlk-edt'        ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'pathway-edit'          ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'pathway-talk-edit'     ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'wishlist-edit'         ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'wishlist-talk-edit'    ] = true;

$wgGroupPermissions[ 'sysop'      ][ 'read'                  ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'edit'                  ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'createtalk'            ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'createpage'            ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'move'                  ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'move-subpages'         ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'upload'                ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'reupload'              ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'delete'                ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'main-edit'             ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'main-talk-edit'        ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'help-edit'             ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'help-talk-edit'        ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'portal-edit'           ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'portal-tlk-edt'        ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'pathway-edit'          ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'pathway-talk-edit'     ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'wishlist-edit'         ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'wishlist-talk-edit'    ] = true;

$wgGroupPermissions[ 'usersnoop'  ][ 'usersnoop'             ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'usersnoop'             ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'usersnoop'             ] = true;
$wgGroupPermissions[ 'sysop'      ][ 'list_private_pathways' ] = true;
$wgGroupPermissions[ 'webservice' ][ 'webservice_write'      ] = true;
$wgGroupPermissions[ 'portal'     ][ 'portal-edit'           ] = true;
$wgGroupPermissions[ 'portal'     ][ 'portal-tlk-edt'        ] = true;

$wgHooks['AbortNewAccount'][] = 'abortOnBadDomain';

/*
##Debug
$wgDebugToolbar=true;
$wgProfiling = true; //Set to true for debugging info
$wgShowDebug = true;
$wgDevelopmentWarnings = true;
$wgShowExceptionDetails = true;
$wgShowSQLErrors = true;

$wgDebugLogFile = WPI_SCRIPT_PATH . '/tmp/wikipathwaysdebug.txt';
// Uncommenting the following will give you a separate debug log file
// for each request.
#if ( !defined( "STDIN" ) ) {
# 	$wgDebugLogFile .= "-" . $_SERVER['REQUEST_METHOD'] . "-" . urlencode( $_SERVER['REQUEST_URI'] );
#}
//*/

##New Autoloads
$wgAutoloadClasses['LegacySpecialPage'] = dirname(__FILE__) . '/wpi/LegacySpecialPage.php';

##Extensions
require_once('extensions/GoogleAnalytics/googleAnalytics.php'); //Google Analytics support
require_once('extensions/inputbox.php');
require_once('extensions/GoogleGroups.php');
require_once("$IP/extensions/LocalHooks.php");
require_once('extensions/EmbedVideo.php');
require_once('extensions/LiquidThreads/LiquidThreads.php');
require_once('extensions/SocialRewarding/SocialRewarding.php');
require_once('extensions/UserMerge/UserMerge.php');
require_once('extensions/parseViewRedirect.php');
require_once( "$IP/wpi/autoload-setup.php" );
require_once('wpi/extensions/EmailConfirmedUser.php');

$contribScoreIgnoreBots = true;  //Set to true if you want to exclude Bots from the reporting - Can be omitted.

//Each array defines a report - 7,50 is "past 7 days" and "LIMIT 50" - Can be omitted.
$contribScoreReports = array(
	array(7,50),
	array(30,50),
	array(0,50));

/* Biblio extension
Isbndb account: thomas.kelder@bigcat.unimaas.nl / BigC0w~wiki
*/
$isbndb_access_key = 'BR5539IJ';
require_once('extensions/Biblio.php');

//Interwiki extension
require_once('wpi/extensions/Interwiki/SpecialInterwiki.php');
$wgGroupPermissions['*']['interwiki'] = false;
$wgGroupPermissions['sysop']['interwiki'] = true;

//UserMerge settings
$wgGroupPermissions['bureaucrat']['usermerge'] = true;

//Google analytics settings (key should be in pass.php)
$wgGoogleAnalyticsIgnoreSysops = false;

//Set enotif for watch page changes to true by default
$wgDefaultUserOptions ['enotifwatchlistpages'] = 1;

##Cascading Style Sheets
#Default is {$wgScriptPath}/skins

$wgReadOnlyFile = "readonly.enable";

//Increase recent changes retention time
$wgRCMaxAge = 60 * 24 * 3600;

// JS Type http://developers.pathvisio.org/ticket/1567
$wgJsMimeType = "text/javascript";

//Lastly, include javascripts (that may have been added by other extensions)
require_once('wpi/Javascript.php');

/* Users have to have a confirmed email address to edit.  This also
 * requires a valid email at account creation time. */
$wgEmailConfirmToEdit = true;

/* This section allows you to set wgEmailConfirmToEdit to fals (so
 * that an email isn't required to create an account) but still
 * require a confirmed email before the user can edit. */
# Disable for everyone.
$wgGroupPermissions['*']['edit']              = false;
# Disable for users, too: by default 'user' is allowed to edit, even if '*' is not.
$wgGroupPermissions['user']['edit']           = false;
# Make it so users with confirmed e-mail addresses are in the group.
$wgAutopromote['confirmed'] = APCOND_EMAILCONFIRMED;
# Hide group from user list.
$wgImplicitGroups[] = 'confirmed';
# Finally, set it to true for the desired group.
$wgGroupPermissions['confirmed']['edit'] = true;

$ceAllowConfirmedEmail = false;

/* Turn on CAPTCHA for editing and page creation by setting these to true */
$wgCaptchaTriggers['edit'] = false;
$wgCaptchaTriggers['create'] = false;

/* In case you ever to turn on the CAPTCHA for editing, you will
 * probably want to let privleged users skip them */
$wgGroupPermissions[ 'sysop'      ][ 'skipcaptcha'    ] = true;
$wgGroupPermissions[ 'bureaucrat' ][ 'skipcaptcha'    ] = true;

$wgGroupPermissions[ 'curator'    ][ 'skipcaptcha'    ] = true;

$wgGroupPermissions[ 'curator'    ][ 'autocurate'     ] = true;

// If a pathway has been editted within this number of days, it will
// be highlighted on the browse page
$wgPathwayRecentSinceDays = 30;

// Do not display E_NOTICE PHP errors
error_reporting(E_ALL ^ E_NOTICE);  
#error_reporting( -1 );
#ini_set( 'display_errors', 1 );
