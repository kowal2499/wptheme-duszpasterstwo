<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UKSW-szablon
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4" >
	<aside id="secondary" class="widget-area" role="complementary">

			<div class="row">
				<article id="kosz-slowa">
					<h1>Kosz Słowa</h1>
					<?php include("articles/article-kosz-slowa.php"); ?>
				</article>
			</div>

			<div class="row">
					<?php include("articles/article-biezace-sprawy.php"); ?>
			</div>

			<div class="row">
				<article>
					<?php echo wp_get_attachment_image(628, array("class" => " center-block")); ?>
				</article>
			</div>

			<div class="row">
				<article id="wydarzenia">
					<h1>Najbliższe Wydarzenia</h1>
					<?php include("articles/article-wydarzenia.php"); ?>
				</article>
			</div>

			<div class="row">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>

			<!-- <div class="row"> -->
				<!-- <article id="most-commented"> -->
					<!-- <h1>Najliczniej komentowane</h1> -->
					<?php #include("articles/article-most-commented.php"); ?>
				<!-- </article> -->
			<!-- </div> -->

			<!-- <div class="row">
				<article id="last-comments">
					<h1>Ostatnie komentarze</h1>
					<?php #include("articles/article-last-comments.php"); ?>
				</article>
			</div> -->

			


		
	</aside><!-- #secondary -->
</div>
</div>
