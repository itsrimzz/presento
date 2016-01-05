<?php
/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/
$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

 $conn = mysql_connect("localhost", "root","") or die(mysql_error());

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    mysql_select_db("presento")or die(mysql_error());
    
   $id=time();
    
/*if ($fn) {
$extension = strtolower(substr($fn, strpos($fn, '.')+1));
	// AJAX call
	file_put_contents(
		'C:/uploads/' . $id . '.' . $extension,
		file_get_contents('php://input')
	);
    $Query= "insert into requests values ('$id', '0','$id')";
$result = mysql_query($Query);
	echo "$fn uploaded";
    header('Location:second.php');
	exit();

}*/
//else {

	// form submit
	$files = $_FILES['url'];

	foreach ($files['error'] as $i => $err) {
		if ($err == UPLOAD_ERR_OK) {
            
			$fn = $files['name'][$i];
            $extension = strtolower(substr($fn, strpos($fn, '.')+1));
			move_uploaded_file(
				$files['tmp_name'][$i],
				'C:/uploads/' . $id . '.' . $extension
			);
             $Query= "insert into requests values ('$id', '0','$id')";
$result = mysql_query($Query);
	echo "$fn uploaded";
    session_start();
    $_SESSION["id"] = $id;        
    echo "<script>window.location='second.php'</script>";
			echo "<p>File $fn uploaded.</p>";
		}
	}

//}