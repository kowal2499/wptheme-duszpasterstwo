<?php
	$query_args = array (
		'post_type' => 'wspolnoty',
		'orderby'	=>	'date',
		'order'	=>	'ASC'
	);

	$loop = new WP_Query ( $query_args );
	$postsNumber = $loop->post_count;
	
	$counter = 0;
	$classString = "col-md-4";
	echo "<div class='row'>";
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ): $loop->the_post();

		// Add a new row before 4th, 7th, 10th, etc.. element
		if (!($counter % 3) && ($counter)) {
			echo "</div><!-- .row -->";
			echo "<div class='row'>";

			// Add appropriate margin if there are less than 3 elements in last row
			if ($postsNumber - $counter < 3) {
				$orphants = $postsNumber - $counter;
				switch ($orphants) {
					case 2:
						$classString = "col-md-offset-2 col-md-4";
						break;
					case 1:
						$classString = "col-md-offset-4 col-md-4";
						break;
				}
			}
		}
		
?>

		<div class="<?php echo $classString; ?>">
			<a href='<?php the_permalink(); ?>'>
			<div class="content">
				<?php the_post_thumbnail( array(100, 100), array( 'class' => 'center-block img-circle' )); ?>
				<h2><?php the_title(); ?></h2>
				<p><?php the_excerpt(); ?></p>
			</div>
			</a>
		</div>

		<?php
			$counter = $counter+1;
		?>
		
<?php
		endwhile;
	echo "</div>";
	else:
			echo "Brak zdefiniowanych wspólnot.";
	endif;

?>