<?php
    $items = array(1319, 1320, 1318, 1322);
?>

<div class="eoc-wrapper">
    
    <div class="owl-carousel" id="owl-simple">

        <?php foreach ($items as $item): ?>
            <div><img src='<?= wp_get_attachment_url($item); ?>'></div>
        <?php endforeach; ?>

    </div>
</div>


<script>
		jQuery(document).ready(function(){
		  jQuery("<?= "#owl-simple"; ?>").owlCarousel(
		  	{
		  		items: 1,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: false,
				loop: true,
				animateOut: 'fadeOut'
		  	});
		});
	</script>