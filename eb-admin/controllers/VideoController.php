
<?php

require_once("controllers/Controller.php");
require_once("classes/Video.php");

class VideoController extends Controller {
	
	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = "VideoModel"; //Overload
	
	/**
     * Analyze the action and determine a request.
     *
     * @return null
     */
	public function analyzeAction(){ //Overload
		
		switch($this->petitionAction){
			
			/**
		     * 
		     */
			case 'list':
				
				$this->createModel();
								
				$videos = $this->actualModel->getVideos();

				$this->createView($this->petitionAction);
				$this->actualView->render($videos);

			break;

			/**
		     * 
		     */			
			case 'add':

				if(empty($_POST)){

					$this->createView($this->petitionAction);
					$this->actualView->render();

				} else {
					
					$this->createModel();

					$video = new Video(
						"", 
						$_POST['title'],
						$_POST['id_vimeo'],
						"",
						""
					);

					$res = $this->actualModel->addVideo($video);
					$lastId = getLastId("video");
					$arrayFiles = $_FILES["frame_video"];

					if($res && $arrayFiles){
						if($arrayFiles["error"] === 0){
							if($this->actualModel->validateFrameVideo(
								$arrayFiles["name"], 
								$arrayFiles["type"]
							)){
								$this->actualModel->addFrameVideo(
									$arrayFiles["tmp_name"], 
									$arrayFiles["type"], 
									$lastId
								);	
							}
						}
					}

					$this->createLoadingView();
					$this->actualView->render();
					$this->redirect();
					
				}
		
			break;	

			/**
		     * 
		     */
			case 'edit':
			
				if(empty($_POST)){

					$this->createModel();
					
					$video = $this->actualModel->getVideo($_GET["id_video"]);

					$this->createView($this->petitionAction);
					$this->actualView->render($video);

				} else {
					
					$this->createModel();
					
					$video = new Video(
						$_GET['id_video'], 
						$_POST['title'],
						$_POST['id_vimeo'],
						"",
						""
					);

					$this->actualModel->editVideo($video);

					$this->createLoadingView();
					$this->actualView->render();
					$this->redirect();
					
				}
		
			break;
			
			/**
		     * 
		     */
			case 'delete':
				
				$this->createModel();
	
				$this->actualModel->deleteVideo($_GET['id_video']);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

			/**
		     * 
		     */
			case 'edit_gallery':
				
				$this->createModel();

				$video = $this->actualModel->getVideo($_GET["id_video"]);

				$this->createView("Edit_Gallery", true); //Corregir
				$this->actualView->render($video);
				
			break;

			/**
		     * 
		     */
			case 'add_gallery':
				
				$this->createModel();

				$video = $this->actualModel->getVideo($_GET["id_video"]);
				$arrayFiles = $_FILES["frame_video"];

				if($arrayFiles){
					if($arrayFiles["error"] === 0){
						if($this->actualModel->validateFrameVideo(
							$arrayFiles["name"], 
							$arrayFiles["type"]
						)){
							$this->actualModel->addFrameVideo(
								$arrayFiles["tmp_name"], 
								$arrayFiles["type"], 
								$_GET["id_video"]
							);	
						}
					}
				}

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

			/**
		     * 
		     */
			case 'delete_gallery':
				
				$this->createModel();

				$this->actualModel->deleteFrameVideo($_GET["id_video"]);
				$video = $this->actualModel->getVideo($_GET["id_video"]);

				$this->createView("Edit_Gallery", true); //Corregir
				$this->actualView->render($video);
				
			break;

		}
		
	}

}

?>
