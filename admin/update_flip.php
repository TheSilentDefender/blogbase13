<?php
ob_start ();
@session_start ();
include ("../config.php");

$title = mysql_real_escape_string($_REQUEST ['title']);
$id = $_REQUEST ['id'];

$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_" );
$catnew = str_replace ( $chars, "-", $category );


 $query = "update flip set title='$title' where id='$id'";
$rst = mysql_query ( $query ) or die ( mysql_error () );
if ($_FILES ['pic'] ['tmp_name'] != '') {
	$file_name = $_FILES ['pic'] ['name'];
	$temp_name = $_FILES ['pic'] ['tmp_name'];
	$file_parts = pathinfo ( $file_name );
	$new_filename = trim ( $file_parts ['filename'] ) . "." . $file_parts ['extension'];

	if ((strtolower ( $file_parts ['extension'] ) == 'jpg') || (strtolower ( $file_parts ['extension'] ) == 'jpeg') || (strtolower ( $file_parts ['extension'] ) == 'png')) {

		move_uploaded_file ( $temp_name, "../flip/flipPaper/pages/$new_filename" );

		$query1 = "update flip set pic='$new_filename' where id='$id'";
		$run1 = mysql_query ( $query1 );

	}

}

header ( "location:view_flip.php" );

?>