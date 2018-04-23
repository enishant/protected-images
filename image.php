<?php
function load_image($f='',$width,$height) {
	$dir = 'some_random_directory_name';
	$file = isset($f) ? $f : '';
	if(file_exists($dir . '/' .$file)) {
		$filename = $dir . '/' .$file;
	} else {
		$filename = $dir . '/' . "image-not-found.jpg";
	}
	$fp = fopen($filename, "rb");
	$contents = fread($fp, filesize($filename));
	fclose($fp);
	$base64 = chunk_split(base64_encode($contents));
	$content_type = mime_content_type($filename);
	echo '<img src="data:' . $content_type . ';base64,' . $base64 . '" width="' . $width . '" height="' . $height . '">';
}