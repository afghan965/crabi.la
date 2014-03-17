<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */

/* Template variables */
$template = array(
    'name'          => 'Crabi.la',
    'version'       => '1.0',
    'author'        => 'pqzada',
    'robots'        => 'noindex, nofollow',
    'title'         => 'Crabi.la - Admin',
    'description'   => '',
    // 'navbar-default'         for a light header
    // 'navbar-inverse'         for a dark header
    'header_navbar' => 'navbar-default',
    // ''                       empty for a static header
    // 'navbar-fixed-top'       for a top fixed header / fixed sidebars
    // 'navbar-fixed-bottom'    for a bottom fixed header / fixed sidebars
    'header'        => '',
    // ''                                               for a full main and alternative sidebar hidden by default (> 991px)
    // 'sidebar-visible-lg'                             for a full main sidebar visible by default (> 991px)
    // 'sidebar-partial'                                for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-partial sidebar-visible-lg'             for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-alt-visible-lg'                         for a full alternative sidebar visible by default (> 991px)
    // 'sidebar-alt-partial'                            for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-alt-partial sidebar-alt-visible-lg'     for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-partial sidebar-alt-partial'            for both sidebars partial which open on mouse hover, hidden by default (> 991px)
    // 'sidebar-no-animations'                          add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!
    'sidebar'       => 'sidebar-partial sidebar-visible-lg sidebar-no-animations',
    // ''                       empty for a static footer
    // 'footer-fixed'           for a fixed footer
    'footer'       => '',
    // ''                       empty for default style
    // 'style-alt'              for an alternative main style (affects main page background as well as blocks style)
    'main_style'    => '',
    // 'night', 'amethyst', 'modern', 'autumn', 'flatie', 'spring', 'fancy', 'fire' or '' leave empty for the Default Blue theme
    'theme'         => '',
    // ''                       for default content in header
    // 'horizontal-menu'        for a horizontal menu in header
    // This option is just used for feature demostration and you can remove it if you like. You can keep or alter header's content in page_head.php
    'header_content'=> '',
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
$primary_nav = array(
    array(
        'name'  => 'Dashboard',
        'url'   => '/',
        'icon'  => 'gi gi-stopwatch'
    ),
    array(
        'name'  => 'Posts',
        'url'   => 'header'
    ),
    array(
        'name'  => 'All posts',
        'url'   => '/posts/',
        'icon'  => 'hi hi-pushpin'
    ),
    array(
        'name'  => 'New post',
        'url'   => '/posts/new',
        'icon'  => 'gi gi-edit'
    ),
    array(
        'name'  => 'Categories',
        'url'   => '/posts/categories',
        'icon'  => 'gi gi-tags'
    ),
    array(
        'name'  => 'Social boards',
        'url'   => 'header'
    ),   
    array(
        'name'  => 'Facebook',
        'url'   => '/social/facebook',
        'icon'  => 'si si-facebook'
    ),
    array(
        'name'  => 'Instagram',
        'url'   => '/social/instagram',
        'icon'  => 'si si-instagram'
    ),
    array(
        'name'  => 'Twitter',
        'url'   => '/social/twitter',
        'icon'  => 'si si-twitter'
    ),
    array(
        'name'  => 'Youtube',
        'url'   => '/social/youtube',
        'icon'  => 'si si-youtube'
    )
);

$database = array(
    'user' => 'root',
    'pass' => 'donpipowinner',
    'dbname' => 'crabi',
    'host' => 'localhost'
);

$site = array(
    'base_url' => 'http://crabi.la'
);
