<?php
/**
 * Enable theme features
 */
add_theme_support('exai-gallery');          // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('nice-search');           // Enable /?s= to /search/ redirect
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y (Note: Universal Analytics only, not Classic Analytics)
define('POST_EXCERPT_LENGTH', 40); // Length in words for excerpt_length filter (http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length)

/**
 * .main classes
 */
function exai_main_class() {
  if (exai_display_sidebar()) {
    if (is_front_page()) {
      $class = 'desk--two-thirds';
    } else {
      // Classes on pages with the sidebar
      $class = 'desk--three-quarters';
    }

  } else {
    // Classes on full width pages
    $class = '';
  }

  return $class;
}

/**
 * .sidebar classes
 */
function exai_sidebar_class() {
  if (is_front_page()) {
    return 'desk--one-third';
  } else {
    return 'desk--one-quarter';
  }
}

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */
function exai_display_sidebar() {
  $sidebar_config = new Roots_Sidebar(
    /**
     * Conditional tag checks (http://codex.wordpress.org/Conditional_Tags)
     * Any of these conditional tags that return true won't show the sidebar
     *
     * To use a function that accepts arguments, use the following format:
     *
     * array('function_name', array('arg1', 'arg2'))
     *
     * The second element must be an array even if there's only 1 argument.
     */
    array(
      'is_404'
    ),
    /**
     * Page template checks (via is_page_template())
     * Any of these page templates that return true won't show the sidebar
     */
    array(
      'template-custom.php'
    )
  );

  return apply_filters('exai_display_sidebar', $sidebar_config->display);
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 940; }

/**
 * Define helper constants
 */
$get_theme_name = explode('/themes/', get_template_directory());

define('RELATIVE_PLUGIN_PATH',  str_replace(home_url() . '/', '', plugins_url()));
define('RELATIVE_CONTENT_PATH', str_replace(home_url() . '/', '', content_url()));
define('THEME_NAME',            next($get_theme_name));
define('THEME_PATH',            RELATIVE_CONTENT_PATH . '/themes/' . THEME_NAME);
