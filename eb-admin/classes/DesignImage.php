
<?php

class DesignImage {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idDesignImage;

	/**
     * External entity ID.
     *
     * @var integer
     */
	private $idDesign;

	/**
     * Image file.
     *
     * @var string
     */
	private $designImage;

     /**
     * Image type.
     *
     * @var string
     */
     private $typeImage;

	/**
     * Initial constructor.
     *
     * @param integer $idDesignImage
     * @param integer $idDesign
     * @param string  $designImage
     * @param string  $typeImage
     * @return null
     */
	public function __construct($idDesignImage, $idDesign, $designImage, $typeImage){
		$this->idDesignImage = $idDesignImage;
		$this->idDesign = $idDesign;
		$this->designImage = $designImage;
          $this->typeImage = $typeImage;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdDesignImage(){
		return $this->idDesignImage;	
	}

	/**
     * Get the entity's ID.
     *
     * @return string
     */
	public function getIdDesign(){
		return $this->idDesign;	
	}
	
	/**
     * Get the entity image file.
     *
     * @return string
     */
	public function getDesignImage(){
		return $this->DesignImage;	
	}

     /**
     * Get the entity image type.
     *
     * @return string
     */
     public function getTypeImage(){
          return $this->typeImage;  
     }

}

?>
