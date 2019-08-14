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
 * Get a design image saved in the database.
 *
 * @param integer $idDesignImage
 * @return array
 */
function getDesignImage($idDesignImage){
	$sql = "SELECT * FROM design_image WHERE id_design_image = '" . $idDesignImage . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$designImage = array(
		"id_design_image" => $row['id_design_image'],
		"id_design" => $row["id_design"],
		"design_image" => $row['design_image'],
		"type_image" => $row['type_image']
	);
	free($res);
	return $designImage;
}

?>
