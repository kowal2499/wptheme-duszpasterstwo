<?php

function get_frontend($widget_instance) {

		if (!isset($widget_instance["image"])) {
			return;
		}

		$widget_data_json = urldecode($widget_instance["image"]);
		$widget_data = json_decode($widget_data_json, 'true');

?>

	
		

<?php

		foreach ($widget_data as $item) {
			$img_url = $item["image"]["url"];
			$img_id = $item["image"]["wpID"];
			$img_alt = $item["image"]["alt"];
			$desc = $item["desc"];

			// echo "$img_url, $img_id, $img_alt, $desc";
			// echo "<br/>";

			echo "<div><img src='".$img_url."'></div>";
		}

?>







<?php
}