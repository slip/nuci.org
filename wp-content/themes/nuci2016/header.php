<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nuci2016
 */

?>
<!--
                  handmade by
       resolution digital type and image
    .-. .-. .-. .-. .   . . .-. .-. .-. . .
    |(  |-  `-. | | |   | |  |   |  | | |\|
    ' ' `-' `-' `-' `-' `-'  '  `-' `-' ' `
              resolutionathens.com
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Source+Sans+Pro:400,700|Roboto+Condensed:400,700" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <div id="header-image"></div>
  <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'nuci2016');?></a>

  <header id="masthead" class="site-header" role="banner">
    <!-- nuci's space logo -->
    <div class="header-main-logo"><a href="/"><img class="header-main-logo" src="/assets/img/nuci-logo-mobile.svg" alt="Nuci's Space" /></a></div>
    <div class="navbar-header">
      <!-- main nav buttons -->
      <div class="navbar-main-buttons">
        <a class="header-main-button ns-red-btn" href="/get-help/" type="button" name="get-help-btn">Get Support</a>
        <a class="header-main-button ns-green-btn" href="/help-us/" type="button" name="help-us-btn">Join Our Cause</a>
        <a class="header-main-button ns-blue-btn" href="/about-us/" type="button" name="about-us-btn">About Us</a>
      </div>
    </div>
  </header><!-- #masthead -->

  <div id="content" class="site-content">
