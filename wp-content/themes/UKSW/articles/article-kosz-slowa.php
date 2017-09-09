<?php
	function get_sentence() {


		$bucket = array();
		// $filePath = getcwd()."\\wp-content\\themes\\UKSW\\assets\\cytaty.txt";
		$filePath = get_template_directory_uri() . '/' . 'assets' . '/' . 'cytaty.txt';
		
		
		$myFile = fopen($filePath, "r") or die("Brak słowa na dziś");

		while(!feof($myFile)) {
		   $line = trim(fgets($myFile));
		   if ($line) {
		   	array_push($bucket, $line);
		   }
		}
		
		fclose($myFile);

		$choice = rand(0, count($bucket)-1);
		return $bucket[$choice];
	}

	echo get_sentence();
?>
		
