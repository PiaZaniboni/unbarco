
<?php

class DesignModel {

	/**
     * Get all the designs saved in the database.
     *
     * @return array
     */
	public function getDesigns(){
		$designs = array();
		$sql = "SELECT * FROM design ORDER BY id_design DESC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$designs[] = new Design (
				$row['id_design'],
				$row['id_category'],
				$row['name'],
				$row['description'],
				$row['description_ingles'],
				$row['frame_design'],
				$row['frame_type']
			);
		}
		DB::free($res);
		return $designs;
	}

	/**
     * Get a design saved in the database.
     *
     * @param integer $idDesign
     * @return Design
     */
	public function getDesign($idDesign){
		$sql = "SELECT * FROM design WHERE id_design = '" . $idDesign . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		$design = new Design (
			$row['id_design'],
			$row['id_category'],
			$row['name'],
			strip_tags($row['description']),
			strip_tags($row['description_ingles']),
			$row['frame_design'],
			$row['frame_type']
		);
		DB::free($res);
		return $design;
	}

	/**
     * Add a design to the database.
     *
     * @param Design $design
     * @return integer
     */
	public function addDesign(Design $design){
		$sql = "INSERT INTO design (
			id_category,
			name,
			description,
			description_ingles
		) VALUES ('" .
			$design->getIdCategory() . "', '" .
			replaceCharacters($design->getName()) . "', '" .
			$this->formatDescription(replaceCharacters($design->getDescription())) . "', '" .
			$this->formatDescription(replaceCharacters($design->getDescriptionIngles())) .
			"')";
		return DB::query($sql);
	}

	/**
     * Modify a design saved in the database.
     *
     * @param Design $design
     * @return integer
     */
	public function editDesign(Design $design){
		$sql = "UPDATE design
			SET id_design = '" . $design->getIdDesign() .
			"', id_category = '" . $design->getIdCategory() .
			"', name = '" . replaceCharacters($design->getName()) .
			"', description = '" . $this->formatDescription(replaceCharacters(strip_tags($design->getDescription()))) .
			"', description_ingles = '" . $this->formatDescription(replaceCharacters(strip_tags($design->getDescriptionIngles()))) .
			"' WHERE id_design = '" . $design->getIdDesign() . "'";
		return DB::query($sql);
	}

	/**
     * Delete a design saved in the database.
     *
     * @param integer $idDesign
     * @return integer
     */
	public function deleteDesign($idDesign){
		$sql = "DELETE FROM design WHERE id_design = '" . $idDesign . "'";
		return DB::query($sql);
	}

	/**
     * Get all the categories saved in the database.
     *
     * @return array
     */
	public function getCategories(){
		$categories = array();
		$sql = "SELECT * FROM category ORDER BY id_category ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$categories[] = new Category (
				$row['id_category'],
				$row['category']
			);
		}
		DB::free($res);
		return $categories;
	}

	/**
     * Get the gallery linked to a design.
     *
     * @param integer $idDesign
     * @return array
     */
	public function getGallery($idDesign){
		$gallery = array();
		$sql = "SELECT * FROM design_image
			WHERE id_design = '" . $idDesign . "'
			ORDER BY id_design_image DESC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$gallery[] = new DesignImage(
				$row['id_design_image'],
				$row["id_design"],
				$row['design_image'],
				$row['type_image']);
		}
		DB::free($res);
		return $gallery;
	}

	/**
     * Verify and validate the extension of the uploaded file.
     *
     * @param string $title
     * @param string $type
     * @return boolean
     */
	public function validateDesignImage($title, $type){
		$allowedExtensions = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $title);
		$extension = end($temp);
		if((($type === "image/gif") ||
			($type === "image/jpeg") ||
			($type === "image/jpg") ||
			($type === "image/pjpeg") ||
			($type === "image/x-png") ||
			($type === "image/png")) &&
			in_array($extension, $allowedExtensions)){
			return true;
		} else {
			return false;
		}
	}

	/**
     * Add a image to a entity
     *
     * @param mediumblob $image
     * @param string $type
     * @param integer $idDesign
     * @return boolean
     */
	public function addDesignImage($image, $type, $idDesign){
		DB::connect();
		$sql = "INSERT INTO design_image (
			id_design,
			design_image,
			type_image
		) VALUES ('" .
			$idDesign . "', '" .
			mysqli_real_escape_string(DB::$connection, file_get_contents($image)) . "', '" .
			$type .
		"')";
		DB::query($sql);
	}

	/**
     * Delete a design image saved in the database.
     *
     * @param integer $idDesignImage
     * @return integer
     */
	public function deleteDesignImage($idDesignImage){
		$sql = "DELETE FROM design_image WHERE id_design_image = '" . $idDesignImage . "'";
		return DB::query($sql);
	}

	/**
     * Delete a design gallery saved in the database.
     *
     * @param integer $idDesign
     * @return integer
     */
	public function deleteDesignGallery($idDesign){
		$sql = "DELETE FROM design_image WHERE id_design = '" . $idDesign . "'";
		return DB::query($sql);
	}

	/**
     * Verify and validate the extension of the uploaded frame.
     *
     * @param string $name
     * @param string $type
     * @return boolean
     */
	public function validateFrameDesign($name, $type){
		$allowedExtensions = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $name);
		$extension = end($temp);
		if((($type === "image/gif") ||
			($type === "image/jpeg") ||
			($type === "image/jpg") ||
			($type === "image/pjpeg") ||
			($type === "image/x-png") ||
			($type === "image/png")) &&
			in_array($extension, $allowedExtensions)){
			return true;
		} else {
			return false;
		}
	}

	/**
     * Add a frame to a entity
     *
     * @param mediumblob $frame
     * @param string $type
     * @param integer $idDesign
     * @return boolean
     */
	public function addFrameDesign($frame, $type, $idDesign){
		DB::connect();
		$sql = "UPDATE design SET
			frame_design = '" . mysqli_real_escape_string(DB::$connection, file_get_contents($frame)) . "',
			frame_type = '" . $type .
		"' WHERE id_design = '" . $idDesign . "'";
		DB::query($sql);
	}

	/**
     * Modify a design saved in the database.
     *
     * @param Design $design
     * @return integer
     */
	public function deleteFrameDesign($idDesign){
		$sql = "UPDATE design
			SET frame_design = NULL" .
			", frame_type = ''" .
			"WHERE id_design = '" . $idDesign . "'";
		return DB::query($sql);
	}

	/**
     * Format description
     *
     * @param string $description
     * @return integer
     */
	public function formatDescription($description){
		$arr = explode("-----", $description);
		$auxDescription = "";
		if(count($arr) === 1){
			return $description;
		} else {
			$auxDescription .= '<p>' . $arr[0] . '</p>' .
			'<span class="separator"></span>' .
			'<p>' . $arr[1] . '</p>';
		};

		return $auxDescription;
	}

}

?>
