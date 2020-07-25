<?php

@ob_start ();

@session_start ();

include 'include/session_check.php';

include ("../config.php");

$category = mysql_real_escape_string($_REQUEST ['category']);

$subcategory = mysql_real_escape_string($_REQUEST ['subcategory']);


$product_name = mysql_real_escape_string($_REQUEST ['product_name']);

$description = mysql_real_escape_string($_REQUEST ['description']);

		$pic1 = $_FILES ['pic1'] ['name'];
		$pic2 = $_FILES ['pic2'] ['name'];

$query = "insert into news set category='$category', subcategory='$subcategory',
 product_name='$product_name',  description='$description',pic1='$pic1',pic2='$pic2',date=now()";
$run = mysql_query ( $query );
$id = mysql_insert_id ();


	//find category Name
		$category = $_REQUEST ['category'];
		$run1 = mysql_query ("select * from category where id='$category'");
		$run2=mysql_fetch_array($run1);
		$category=$run2['category'];
		
	//find  subcategory Name
	$run11 = mysql_query ("select * from subcategory where id='$subcategory'");
	$run21=mysql_fetch_array($run11);
	$subcategory=$run21['subcategory'];
		
		



if ($run) 

{
	
	if ($_FILES ['pic1'] ['tmp_name'] != '') 

	{
		
		$file_name = $_FILES ['pic1'] ['name'];
		
		$temp_name = $_FILES ['pic1'] ['tmp_name'];
		
		$file_parts = pathinfo ( $file_name );
		
		$new_filename = trim ( $file_parts ['filename'] ) . $id . "." . $file_parts ['extension'];
		
		move_uploaded_file ($temp_name, "../assets/images/$category/$subcategory/$file_name" );
		move_uploaded_file ($temp_name, "../gallery_images/$file_name" );
		
		$query1 = "update product set pic1='$new_filename' where id='$id'";
		
		$run1 = mysql_query ( $query1 );
		
		if (strtolower ( $file_parts ['extension'] ) == 'jpg') 

		{
			
			$img = imagecreatefromjpeg ( "../assets/images/$category/$subcategory/$new_filename" );
			
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
			
			$img = imagecreatefromgif ( "../assets/images/$category/$subcategory/$new_filename" );
			
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
			
			$img = imagecreatefrompng ( "../assets/images/$category/$subcategory/$new_filename" );
			
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
		
		move_uploaded_file ( $temp_name, "../assets/images/$category/$subcategory/$file_name" );
		
		move_uploaded_file ($temp_name, "../gallery_images/$file_name" );
		
		$query1 = "update product set pic2='$new_filename' where id='$id'";
		
		$run1 = mysql_query ( $query1 );
		
		if (strtolower ( $file_parts ['extension'] ) == 'jpg') 

		{
			
			$img = imagecreatefromjpeg ( "../assets/images/$category/$subcategory/$new_filename" );
			
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
			
			$img = imagecreatefromgif ( "../assets/images/$category/$subcategory/$new_filename" );
			
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
			
			$img = imagecreatefrompng ( "../assets/images/$category/$subcategory/$new_filename" );
			
			$width = imagesx ( $img );
			
			$height = imagesy ( $img );
			
			$new_width = 290;
			
			$new_height = 153;
			
			$tmp_img = imagecreatetruecolor ( $new_width, $new_height );
			
			imagecopyresized ( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			
			imagepng ( $tmp_img, "../assets/images/$category/$subcategory/$new_filename" );
		
		}
	
	}
	
	
	header ( "location:view-all_news.php" );

} 

else 

{
	
	echo mysql_error ();

}

?>