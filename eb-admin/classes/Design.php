
<?php

class Design {

	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idDesign;

     /**
     * Entity external ID.
     *
     * @var integer
     */
     private $idCategory;

	/**
     * Entity's name.
     *
     * @var string
     */
	private $name;

     /**
     * Entity's description.
     *
     * @var string
     */
     private $description;

	 /**
	 * Entity's description.
	 *
	 * @var string
	 */
	 private $description_ingles;

     /**
     * Entity frame file.
     *
     * @var blob
     */
     private $frameDesign;

     /**
     * Entity frame type.
     *
     * @var string
     */
     private $frameType;

	/**
     * Initial constructor.
     *
     * @param integer $idDesign
     * @param string  $name
     * @return null
     */
	public function __construct($idDesign, $idCategory, $name, $description, $description_ingles, $frameDesign, $frameType){
		  $this->idDesign = $idDesign;
          $this->idCategory = $idCategory;
		  $this->name = $name;
          $this->description = $description;
		  $this->description_ingles = $description_ingles;
          $this->frameDesign = $frameDesign;
          $this->frameType = $frameType;
     }

	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdDesign(){
		return $this->idDesign;
	}

     /**
     * Get the entity external ID.
     *
     * @return integer
     */
     public function getIdCategory(){
          return $this->idCategory;
     }

	/**
     * Get the entity's name.
     *
     * @return string
     */
	public function getName(){
		return $this->name;
	}

     /**
     * Get the entity's description.
     *
     * @return string
     */
     public function getDescription(){
          return $this->description;
     }

	 /**
	 * Get the entity's description.
	 *
	 * @return string
	 */
	 public function getDescriptionIngles(){
		  return $this->description_ingles;
	 }

     /**
     * Get the entity's frame file.
     *
     * @return blob
     */
     public function getFrameDesign(){
          return $this->frameDesign;
     }

     /**
     * Get the entity's frame type.
     *
     * @return string
     */
     public function getFrameType(){
          return $this->frameType;
     }

}

?>
