<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UKSW-szablon
 */

get_header(); ?>
	
		<div class="container">
			<div class="row extra-margin">

				<div class="col-md-8 backstage-pattern">
					<section>
						<article>
							<div class="post-content">
							<?php while ( have_posts() ) : the_post(); ?>
								<h1><?php the_title(); ?></h1>
								<?php #the_post_thumbnail(); ?>
								<p><?php the_content(); ?></p>

								<?php
									// the_post_navigation();

									// If comments are open or we have at least one comment, load up the comment template.
									// if ( comments_open() || get_comments_number() ) :
									// 	comments_template();
									// endif;
								?>
								
							<?php endwhile; ?>
							</div>
						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->


<?php get_footer(); ?>