<?php
/**
 * Load Composer.
 */
require_once locate_template('vendor/autoload.php');


/**
 * Load PHP-Dotenv.
 *
 * Throw an exception if required variables
 * are not defined.
 */
Dotenv::load(__DIR__);
Dotenv::required('FORECAST_API_KEY');


/**
 * Load Forecast.io PHP wrapper library.
 *
 * @link https://github.com/tobias-redmann/forecast.io-php-api
 */
require_once locate_template('/vendor/forecast.io-php-api/lib/forecast.io.php');


/**
 * Roots includes
 */
require_once locate_template('/lib/utils.php');           // Utility functions
require_once locate_template('/lib/init.php');            // Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');         // Theme wrapper class
require_once locate_template('/lib/sidebar.php');         // Sidebar class
require_once locate_template('/lib/config.php');          // Configuration
require_once locate_template('/lib/titles.php');          // Page titles
require_once locate_template('/lib/cleanup.php');         // Cleanup
require_once locate_template('/lib/nav.php');             // Custom nav modifications
require_once locate_template('/lib/gallery.php');         // Custom [gallery] modifications
require_once locate_template('/lib/comments.php');        // Custom comments modifications
require_once locate_template('/lib/widgets.php');         // Sidebars and widgets
require_once locate_template('/lib/scripts.php');         // Scripts and stylesheets


require_once locate_template('/lib/forecast.php');        // Weather widget and Forecast.io API calls
require_once locate_template('/lib/custom.php');          // Custom functions
