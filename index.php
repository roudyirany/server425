<?php
	if($_GET["type"] == "post")
	{
		$fn = "test.txt"; 
		$file = fopen($fn, "a+"); 
		$size = filesize($fn);
		fwrite($file, "Client connected!");
	}
?>