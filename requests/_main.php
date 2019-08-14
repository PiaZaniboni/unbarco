<?php

/**
 * Connect to the database.
 *
 * @return null
 */
function connect(){
	if($_SERVER["HTTP_HOST"] === "localhost"){
		return mysqli_connect("localhost", "root", "", "barco-db");
	} else {
		return mysqli_connect("localhost", "root", "", "barco-db");
	}
	/*if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}*/
}

/**
 * Make a sql query to the database.
 *
 * @param string $sql
 * @return integer
 */
function query($sql){
	$connection = connect();
	$res = mysqli_query($connection, $sql);
	mysqli_close($connection);
	return $res;
}

/**
 * Free the last query made to the database.
 *
 * @param integer $res
 * @return null
 */
function free($res){
	mysqli_free_result($res);
}

if ($handle = opendir('_temp')) {
    while (false !== ($entry = readdir($handle))) {
		if(!is_dir($entry)){
			unlink("_temp/" . "$entry");
		}
	}
    closedir($handle);
}

/**
 * Summarize a text to a certain length of characters.
 *
 * @param string $txt
 * @param integer $charactersCount
 * @return string
 */
function summarize($txt, $charactersCount = 100){
	if(strlen($txt) > $charactersCount){
		return substr($txt, 0, strrpos(substr($txt, 0, $charactersCount), ' ')) . "...";
	} else {
		return $txt;
	}
}

/**
 * Generate a ramdon string.
 *
 * @param string $txt
 * @param integer $charactersCount
 * @return string
 */
function generateRandomString($length = 100){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for($i = 0; $i < $length; $i++){
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Get the extension of a file.
 *
 * @param string $txt
 * @param integer $charactersCount
 * @return string
 */
function getExtension($tipo){
	$extension = str_replace("image/", '.', $tipo);
	return $extension;
}

/**/

require_once("eb-admin/classes/Design.php");
require_once("eb-admin/classes/DesignImage.php");
require_once("eb-admin/classes/Video.php");

/**
 * Get all the designs saved in the database.
 *
 * @return array
 */
function getDesigns(){
	$designs = array();
	$sql = "SELECT * FROM design ORDER BY id_design DESC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$designs[] = new Design (
			$row['id_design'],
			$row['id_category'],
			$row['name'],
			$row['description'],
			$row['description_ingles'],
			$row["frame_design"],
			$row["frame_type"]
		);
	}
	free($res);
	return $designs;
}

/**
 * Get all the designs by category saved in the database.
 *
 * @param integer $idCategory
 * @return array
 */
function getDesignsByCategory($idCategory){
	$designs = array();
	$sql = "SELECT * FROM design WHERE id_category = '" . $idCategory . "' ORDER BY id_design DESC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$designs[] = new Design (
			$row['id_design'],
			$row['id_category'],
			$row['name'],
			$row['description'],
			$row['description_ingles'],
			$row["frame_design"],
			$row["frame_type"]
		);
	}
	free($res);
	return $designs;
}

/**
 * Get a design saved in the database.
 *
 * @param integer $idDesign
 * @return Design
 */
function getDesign($idDesign){
	$sql = "SELECT * FROM design WHERE id_design = '" . $idDesign . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$design = new Design(
		$row['id_design'],
		$row['id_category'],
		$row['name'],
		$row['description'],
		$row['description_ingles'],
		$row["frame_design"],
		$row["frame_type"]
	);
	free($res);
	return $design;
}

/**
 * Get the gallery linked to a design.
 *
 * @param integer $idDesign
 * @return array
 */
function getDesignGallery($idDesign){
	$gallery = array();
	$sql = "SELECT * FROM design_image
		WHERE id_design = '" . $idDesign . "'
		ORDER BY id_design_image DESC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$gallery[] = new DesignImage(
			$row['id_design_image'],
			$row["id_design"],
			$row['design_image'],
			$row['type_image']);
	}
	free($res);
	return $gallery;
}

/**
 * Get all the videos saved in the database.
 *
 * @return array
 */
function getVideos(){
	$videos = array();
	$sql = "SELECT * FROM video ORDER BY id_video DESC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$videos[] = new Video (
			$row['id_video'],
			$row['title'],
			$row["id_vimeo"],
			$row["frame_video"],
			$row["frame_type"]
		);
	}
	free($res);
	return $videos;
}

/**
 * Get a video saved in the database.
 *
 * @param integer $idVideo
 * @return Video
 */
function getVideo($idVideo){
	$sql = "SELECT * FROM video WHERE id_video = '" . $idVideo . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$video = new Video (
		$row['id_video'],
		$row['title'],
		$row["id_vimeo"],
		$row["frame_video"],
		$row["frame_type"]
	);
	free($res);
	return $video;
}

?>
