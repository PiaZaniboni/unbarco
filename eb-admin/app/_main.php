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
	$design = array(
		"id_design" => $row['id_design'],
		"id_category" => $row['id_category'],
		"name" => $row['name'],
		"description" => $row['description'],
		"description_ingles" => $row['description_ingles'],
		"frame_design" => $row['frame_design'],
		"frame_type" => $row['frame_type']
	);
	free($res);
	return $design;
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
	$video = array(
		"id_video" => $row['id_video'],
		"title" => $row['title'],
		"id_vimeo" => $row["id_vimeo"],
		"frame_video" => $row["frame_video"],
		"frame_type" => $row["frame_type"]
	);
	free($res);
	return $video;
}

?>
