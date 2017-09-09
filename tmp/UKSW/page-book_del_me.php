<?php
/*
	Template name: Page Book
*/

get_header(); ?>

	
		<div class="container">
			<div class="row extra-margin">

				<div class="col-md-8 backstage-pattern">

				
					<section>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<div class="post-content">
								<?php
									echo show_parent_content(); // if has parent then show its content
								?>
							

								<?php
								while ( have_posts() ) : the_post();
									the_content();
								endwhile; // End of the loop.
								?>

								<?php
									show_children_links();	// show children pages links only if has children
								?>

								<?php
									show_next_previous();
								?>

								<div class="row">
								<?php
									echo facebookLikeButton();
								?>
								</div>
								
							</div>
						</article>
					</section>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->

		

<?php
get_footer();
?>

<?php

	function show_children_links() {
		global $post;
						
		$childrens = get_children(array('post_type' => 'page', 'post_parent' => $post->ID, 'post_status' => 'publish', 'order' => 'ASC'));
		if (count($childrens) > 0) {

			echo "<ol>";
			foreach ($childrens as $key => $value) {
				echo "<li><a href='".get_permalink($value->ID)."'>";
				echo $value->post_title."<br>";
				echo "</a></li>";
			}
			echo "</ol>";
		}
	}

	function show_parent_content() {
		global $post;
		$childrens = get_children(array('post_type' => 'page', 'post_parent' => $post->ID, 'post_status' => 'publish', 'order' => 'ASC'));
		if (count($childrens) == 0) { // show content only is page does not have any child

			$parent = wp_get_post_parent_id( $post->ID );
			echo "<div class='previous-content'>";
			echo apply_filters('the_content', get_post_field('post_content', $parent));
			echo "</div>";
		}
	}

	function show_next_previous() {
		global $post;
		$parent = wp_get_post_parent_id( $post->ID );
		$childrens = get_children(array('post_type' => 'page', 'post_parent' => $parent, 'post_status' => 'publish', 'order' => 'ASC'));

		// create children ids array
		$childrens_ids = array();
		foreach ($childrens as $key => $value) {
			$childrens_ids[] += $value->ID; 	
		}
		$current = array_search($post->ID, $childrens_ids);
		$prev_ID = -1;
		$next_ID = -1;

		if ($current > 0) {
			$prev_ID = $current - 1;
		}

		if ($current < (count($childrens_ids)-1)) {
			$next_ID = $current + 1;
		}
		
		if (count(get_children(array('post_type' => 'page', 'post_parent' => $post->ID, 'post_status' => 'publish', 'order' => 'ASC'))) == 0) {
			
			
			echo "<hr><div class='row next-prev-menu'>";

			// button prev
			echo "<div class='col-md-4 text-center' style='margin: auto 0;'>";

 				if ($prev_ID > -1) {
					
					echo "<a class='btn btn-default center-block btn-book' href='".get_permalink($childrens_ids[$prev_ID])."' role='button'>"."<span class='glyphicon glyphicon-menu-left' aria-hidden='true'></span>&nbsp;WSTECZ<br><span style='font-size: 11px;'></span></a>";
					echo "<p>".get_the_title($childrens_ids[$prev_ID])."</p>";
				} 
			echo "</div>";

		

			// button menu
			echo "<div class='col-md-4 text-center' style='margin: auto 0;'>";
					echo "<a class='btn btn-default center-block btn-book' href='".get_permalink($parent)."' role='button'>"."<span class='glyphicon glyphicon-menu-up' aria-hidden='true'></span></a>";
					echo "<p>Powrót do spisu treści</p>";
			echo "</div>";


			// button next
			echo "<div class='col-md-4 text-center' style='margin: auto 0;'>";
				if ($next_ID > -1) {
				
				echo "<a class='btn btn-default center-block btn-book' href='".get_permalink($childrens_ids[$next_ID])."' role='button'>"."DALEJ&nbsp;<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span><br><span style='font-size: 11px;'></span></a>";
				echo "<p>".get_the_title($childrens_ids[$next_ID])."</p>";
				
				}
			echo "</div>";

			
		
	
			echo "</div>";

		}

		
	}

	function facebookLikeButton() {
		global $post;
		$html = '<div class="fb-like" data-href="'.get_permalink($post).'" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>';
		return $html;
	}
?>


		