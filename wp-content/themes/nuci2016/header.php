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
<html <?php
language_attributes();
?>>
<head>
<meta charset="<?php
bloginfo('charset');
?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php
bloginfo('pingback_url');
?>">
<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Montserrat:400,700|Roboto+Condensed:400,700" rel="stylesheet">


<?php
wp_head();
?>
</head>

<body <?php
body_class();
?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'nuci2016');?></a>

	<header id="masthead" class="site-header" role="banner">
    <div class="navbar-header">
      <!-- main nav buttons -->
      <div class="navbar-main-buttons">
        <a class="header-main-button ns-red-btn" href="/get-help/" type="button" name="get-help-btn">Get Help</a>
        <a class="header-main-button ns-green-btn" href="/help-us/" type="button" name="help-us-btn">Help Us</a>
        <a class="header-main-button ns-blue-btn" href="/about-us/" type="button" name="about-us-btn">About Us</a>
      </div>
      <!-- hamburger menu -->
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".exCollapsingNavbar">
        <svg width="25px" height="25px" viewBox="0 0 25 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <polygon id="Fill-3" stroke="none" fill="#547AA3" fill-rule="evenodd" points="0 0 24.8447205 0 24.8447205 4.76190476 0 4.76190476"></polygon>
            <polygon id="Fill-4" stroke="none" fill="#547AA3" fill-rule="evenodd" points="0 10.4166667 24.8447205 10.4166667 24.8447205 15.1785714 0 15.1785714"></polygon>
            <polygon id="Fill-5" stroke="none" fill="#547AA3" fill-rule="evenodd" points="0 19.7916667 24.8447205 19.7916667 24.8447205 24.5535714 0 24.5535714"></polygon>
        </svg>
    </button>
    </div>
    <!-- nuci's space logo -->
    <a href="/"><img class="header-main-logo" src="/assets/img/nuci-logo-mobile.svg" alt="Nuci's Space" /></a>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
