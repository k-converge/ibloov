<?php

	function store_upload($file){
		
		$filename = date("Y-d-m-H-i-s") . $file["name"];
		$filetemp = $file["tmp_name"];
		
		$newfilepath = dirname(dirname(__FILE__)) . "/images/uploads/";
		
		move_uploaded_file($filetemp, $newfilepath . $filename);
		
		return "images/uploads/" . $filename;
		
	}

?>