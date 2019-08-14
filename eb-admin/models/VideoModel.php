
<?php

class VideoModel {
	
	/**
     * Get all the videos saved in the database.
     *
     * @return array
     */
	public function getVideos(){
		$videos = array();
		$sql = "SELECT * FROM video ORDER BY id_video DESC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$videos[] = new Video (
				$row['id_video'], 
				$row['title'], 
				$row["id_vimeo"],
				$row["frame_video"],
				$row["frame_type"]
			);
		}
		DB::free($res);
		return $videos;
	}
	
	/**
     * Get a video saved in the database.
     *
     * @param integer $idVideo
     * @return Video
     */
	public function getVideo($idVideo){
		$sql = "SELECT * FROM video WHERE id_video = '" . $idVideo . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		$video = new Video (
			$row['id_video'],
			$row['title'], 
			$row["id_vimeo"],
			$row["frame_video"],
			$row["frame_type"]
		);
		DB::free($res);
		return $video;
	}

	/**
     * Add a video to the database.
     *
     * @param Video $video
     * @return integer
     */
	public function addVideo(Video $video){
		$sql = "INSERT INTO video (
			title, 
			id_vimeo
		) VALUES ('" . 
			replaceCharacters($video->getTitle()) . "', '" . 
			$video->getIdVimeo() .
		"')";
		return DB::query($sql);
	}

	/**
     * Modify a video saved in the database.
     *
     * @param Video $video
     * @return integer
     */
	public function editVideo(Video $video){
		$sql = "UPDATE video 
			SET id_video = '" . $video->getIdVideo() . 
			"', title = '" . replaceCharacters($video->getTitle()) . 
			"', id_vimeo = '" . $video->getIdVimeo() . 
			"' WHERE id_video = '" . $video->getIdVideo() . "'";
		return DB::query($sql);
	}
	
	/**
     * Delete a video saved in the database.
     *
     * @param integer $idVideo
     * @return integer
     */
	public function deleteVideo($idVideo){
		$sql = "DELETE FROM video WHERE id_video = '" . $idVideo . "'";
		return DB::query($sql);
	}

	/**
     * Verify and validate the extension of the uploaded frame.
     *
     * @param string $name
     * @param string $type
     * @return boolean
     */
	public function validateFrameVideo($name, $type){
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
     * @param integer $idVideo
     * @return boolean
     */
	public function addFrameVideo($frame, $type, $idVideo){
		DB::connect();
		$sql = "UPDATE video SET 
			frame_video = '" . mysqli_real_escape_string(DB::$connection, file_get_contents($frame)) . "', 
			frame_type = '" . $type .
		"' WHERE id_video = '" . $idVideo . "'";
		DB::query($sql);
	}

	/**
     * Modify a video saved in the database.
     *
     * @param Video $video
     * @return integer
     */
	public function deleteFrameVideo($idVideo){
		$sql = "UPDATE video 
			SET frame_video = NULL" . 
			", frame_type = ''" .
			"WHERE id_video = '" . $idVideo . "'";
		return DB::query($sql);
	}

}

?>
