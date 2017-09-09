<?php
/*
    Template name: Home Page
*/
get_header(); ?>

	<div class="home-page-content">
	
		<div class="container-fluid">
			<div class="row">

				<section class="welcome-screen" style="background-image:url(<?php echo get_template_directory_uri() . "/assets/imgs/background02.jpg"; ?>);">
					<?php include "template-parts/content-navigation-mobile.php"; ?>
                    <?php include "template-parts/content-navigation.php"; ?>
                    <?php include "template-parts/content-navigation-secondary.php"; ?>
				</section>
			</div>
		</div>

		<!-- <div class="backstage-solid"></div> -->

		<div class="container">
			<div class="row">

				<div class="col-md-8 backstage-pattern">
					<section>

						<!-- <article id="aktualnosci"> -->
							<!-- <h1>Sekcja Aktualności</h1> -->
							<?php #include("articles/article-aktualnosci.php"); ?>
						<!-- </article> -->


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

		

	</div>


<?php get_footer(); ?>
