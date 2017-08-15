<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UKSW-szablon
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&subset=latin-ext" rel="stylesheet">

<?php wp_head(); ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>

<div id="page" class="site">
	

	<?php

		if ( !is_front_page() ) {
	?>			

	<header id="masthead" class="site-header" role="banner">
			
		
		<div class="container-fluid">
			<div class="row">
				<div class="nav-wrapper">
					<?php include "template-parts/content-navigation-mobile.php"; ?>
	        <?php include "template-parts/content-navigation.php"; ?>
	        <?php include "template-parts/content-navigation-secondary.php"; ?>
				</div>
			</div>
		</div>


	</header><!-- #masthead -->

	<?php
			}
	?>

	<div id="content" class="site-content">
