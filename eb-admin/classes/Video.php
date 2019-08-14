
<?php

class Video {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idVideo;

     /**
     * Entity title.
     *
     * @var string
     */
     private $title;

     /**
     * Entity idVimeo.
     *
     * @var string
     */
     private $idVimeo;

     /**
     * Entity frame file.
     *
     * @var blob
     */
     private $frameVideo;

     /**
     * Entity frame type.
     *
     * @var string
     */
     private $frameType;

	/**
     * Initial constructor.
     *
     * @param integer $idVideo
     * @param title   $title
     * @param string  $idVimeo
     * @return null
     */
	public function __construct($idVideo, $title, $idVimeo, $frameVideo, $frameType){
		$this->idVideo = $idVideo;
          $this->title = $title;
		$this->idVimeo = $idVimeo;
          $this->frameVideo = $frameVideo;
          $this->frameType = $frameType;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdVideo(){
		return $this->idVideo;	
	}

     /**
     * Get the entity title.
     *
     * @return string
     */
     public function getTitle(){
          return $this->title;   
     }

	/**
     * Get the entity's idVimeo.
     *
     * @return string
     */
	public function getIdVimeo(){
		return $this->idVimeo;	
	}

     /**
     * Get the entity's frame file.
     *
     * @return blob
     */
     public function getFrameVideo(){
          return $this->frameVideo;   
     }

     /**
     * Get the entity frame type.
     *
     * @return string
     */
     public function getFrameType(){
          return $this->frameType;  
     }

}

?>
