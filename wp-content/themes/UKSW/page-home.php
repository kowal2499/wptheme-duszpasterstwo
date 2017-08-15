<?php
/*
	Template name: Home Page
*/
get_header(); ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 mobile-fix">
				<?php include "template-parts/content-navigation-mobile.php"; ?>
				<?php include "template-parts/content-navigation.php"; ?>
			</div>
			</div>
		</div>

		<div class="container" id="main-container">
			
			<div class="row margin-fix">
				<div class="col-md-12 secondary-nav-pattern">
					<?php include "template-parts/content-navigation-secondary.php"; ?>
				</div>
			</div>

			<div class="row">

				<div class="col-md-8 backstage-pattern">

					
					<section class="welcome-screen" style="background-image:url(<?php echo get_template_directory_uri() . "/assets/imgs/background02.jpg"; ?>);">
					</section>
					
					<section>
						<article id="wspolnoty">
							
							<h1>Wspólnoty</h1>
							<?php include("articles/article-wspolnoty.php"); ?>
							
						</article>

						<article id="diakonie">
							<h1>Diakonie</h1>
							<?php include("articles/article-diakonie.php"); ?>
						</article>

						<article id="poglebienie">
							<h1>Pogłębienie</h1>
							<?php include("articles/article-poglebienie.php"); ?>
						</article>

					</section>
				</div><!-- class -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>
