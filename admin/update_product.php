<?php

ob_start ();

@session_start ();

include ("../config.php");

$id = mysql_real_escape_string($_REQUEST ['id']);

$category = mysql_real_escape_string($_REQUEST ['category']);

$subcategory = mysql_real_escape_string($_REQUEST ['subcategory']);

$product_name = mysql_real_escape_string($_REQUEST ['product_name']);

$description = mysql_real_escape_string($_REQUEST ['description']);


$query = "update news set category='$category', subcategory='$subcategory', product_name='$product_name',
 description='$description' where id='$id'";

$run = mysql_query ( $query );

if ($run) 

{
	
	if ($_FILES ['pic1'] ['tmp_name'] != '') 

	{
		
		$file_name = $_FILES ['pic1'] ['name'];
		
		$temp_name = $_FILES ['pic1'] ['tmp_name'];
		
		$file_parts = pathinfo ( $file_name );
		
		$new_filename = trim ( $file_parts ['filename'] ) . $id . "." . $file_parts ['extension'];
		
		move_uploaded_file ( $temp_name, "../uploaded_product/$new_filename" );
		
		$query1 = "update product set pic1='$new_filename' where id='$id'";
		
		$run1 = mysql_query ( $query1 );
		
		if (strtolower ( $file_parts ['extension'] ) == 'jpg') 

		{
			
			$img = imagecreatefromjpeg ( "../uploaded_product/$new_filename" );
			
			$width = imagesx ( $img );
			
			$height = imagesy ( $img );
			
			$new_width = 290;
			
			$new_height = 153;
			
			$tmp_img = imagecreatetruecolor ( $new_width, $new_height );
			
			imagecopyresized ( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			
			imagejpeg ( $tmp_img, "../thumb_images/$new_filename" );
		
		}
		
		if (strtolower ( $file_parts ['extension'] ) == 'gif') 

		{
			
			$img = imagecreatefromgif ( "../uploaded_product/$new_filename" );
			
			$width = imagesx ( $img );
			
			$height = imagesy ( $img );
			
			$new_width = 290;
			
			$new_height = 153;
			
			$tmp_img = imagecreatetruecolor ( $new_width, $new_height );
			
			imagecopyresized ( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			
			imagegif ( $tmp_img, "../thumb_images/$new_filename" );
		
		}
		
		if (strtolower ( $file_parts ['extension'] ) == 'png') 

		{
			
			$img = imagecreatefrompng ( "../uploaded_product/$new_filename" );
			
			$width = imagesx ( $img );
			
			$height = imagesy ( $img );
			
			$new_width = 290;
			
			$new_height = 153;
			
			$tmp_img = imagecreatetruecolor ( $new_width, $new_height );
			
			imagecopyresized ( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			
			imagepng ( $tmp_img, "../thumb_images/$new_filename" );
		
		}
	
	}
	
	// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// / end pic 111111111111111
	
	// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if ($_FILES ['pic2'] ['tmp_name'] != '') 

	{
		
		$file_name = $_FILES ['pic2'] ['name'];
		
		$temp_name = $_FILES ['pic2'] ['tmp_name'];
		
		$file_parts = pathinfo ( $file_name );
		
		$new_filename = trim ( $file_parts ['filename'] ) . $id . "." . $file_parts ['extension'];
		
		move_uploaded_file ( $temp_name, "../uploaded_product/$new_filename" );
		
		$query1 = "update product set pic2='$new_filename' where id='$id'";
		
		$run1 = mysql_query ( $query1 );
		
		if (strtolower ( $file_parts ['extension'] ) == 'jpg') 

		{
			
			$img = imagecreatefromjpeg ( "../uploaded_product/$new_filename" );
			
			$width = imagesx ( $img );
			
			$height = imagesy ( $img );
			
			$new_width = 290;
			
			$new_height = 153;
			
			$tmp_img = imagecreatetruecolor ( $new_width, $new_height );
			
			imagecopyresized ( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			
			imagejpeg ( $tmp_img, "../thumb_images/$new_filename" );
		
		}
		
		if (strtolower ( $file_parts ['extension'] ) == 'gif') 

		{
			
			$img = imagecreatefromgif ( "../uploaded_product/$new_filename" );
			
			$width = imagesx ( $img );
			
			$height = imagesy ( $img );
			
			$new_width = 290;
			
			$new_height = 153;
			
			$tmp_img = imagecreatetruecolor ( $new_width, $new_height );
			
			imagecopyresized ( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			
			imagegif ( $tmp_img, "../thumb_images/$new_filename" );
		
		}
		
		if (strtolower ( $file_parts ['extension'] ) == 'png') 

		{
			
			$img = imagecreatefrompng ( "../uploaded_product/$new_filename" );
			
			$width = imagesx ( $img );
			
			$height = imagesy ( $img );
			
			$new_width = 290;
			
			$new_height = 153;
			
			$tmp_img = imagecreatetruecolor ( $new_width, $new_height );
			
			imagecopyresized ( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			
			imagepng ( $tmp_img, "../thumb_images/$new_filename" );
		
		}
	
	}
	
	// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// /////////// end pic222222222
	
	// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	$_SESSION ['msg4'] = "Product Detail Saved Successfully";
	
	header ( "location:view-all_news.php" );

} 

else 

{
	
	echo mysql_error ();

}
?>