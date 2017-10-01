<?php
/*
	Template name: Home Page
*/
get_header(); ?>
			<div class="row">

				<div class="col-md-8 backstage-pattern">

					<section class="welcome-screen">
						<?php do_shortcode('[eoc-simple]'); ?>
						<div class="logo"><img src="<?php echo get_template_directory_uri() . '/assets/imgs/jmn.jpg'; ?>" alt=""></div>
						<div class="sentence"><?php include("articles/article-kosz-slowa.php"); ?></div>
					</section>

					<section>
						<article id="wspolnoty2">
							<h1>Wspólnoty</h1>
							<?php include("articles/article-wspolnoty2.php"); ?>
						</article>

						<article id="diakonie">
							<h1>Diakonie</h1>
							<?php include("articles/article-diakonie.php"); ?>
						</article>

						<article id="poglebienie">
							<h1>Pogłębienie</h1>
							<?php include("articles/article-poglebienie.php"); ?>
						</article>

						<article id="swiadectwa">
							<h1>Śwadectwa</h1>
							<?php do_shortcode('[testimonies]'); ?>
						</article>

					</section>
				</div><!-- class -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>
