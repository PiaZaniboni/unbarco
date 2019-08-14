<?php
session_start();
require_once("app/config.php");
require_once("app/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo APP_NAME . " / " . TITLE_TEXT ?></title>

<script type="text/javascript" src="<?php echo APP_PATH ?>/js/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo APP_PATH ?>/css/bootstrap.min.css">
<script type="text/javascript" src="<?php echo APP_PATH ?>/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo APP_PATH ?>/js/scripts.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link rel="shortcut icon" href="<?php echo APP_PATH ?>/img/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo APP_PATH ?>/css/font.face.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo APP_PATH ?>/css/styles.css" media="screen" />

</head>

<body>
    
    <header>
    	
        <div id="logo" class="pull-left">
            <a href="<?php echo APP_PATH ?>">
                <img src="<?php echo APP_PATH ?>/img/logo.png" width="" height="">
            </a>
        </div>
    	<nav class="pull-right">
        	<ul>
            	<li>
                    <a href="<?php echo WEB_PATH ?>" target="_blank">
                        <?php echo GO_TO_SITE_TEXT ?>
                    </a>    
                </li>
                <?php if(isset($_SESSION["logged_user"])){ ?>
                <li>
                    <a href="<?php echo generateURL('system', 'logout') ?>">
                        <?php echo CLOSE_SESSION_TEXT ?>
                    </a>    
                </li>
                <?php } ?>
            </ul>
        </nav>
        
    </header>
    
    <section class="container">
    
    	<?php if(isset($_SESSION["logged_user"])){ ?>
    	<aside class="pull-left">
        	<nav>
            	<ul>
                    <li>
                        <a href="<?php echo generateURL('design', 'list')?>" <?php echo isset($_GET['c']) && $_GET['c'] === 'design' ? 'class="active"' : '' ?>>
                            <span class="glyphicon glyphicon-asterisk"></span>
                            DISE&Ntilde;OS
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo generateURL('video', 'list')?>" <?php echo isset($_GET['c']) && $_GET['c'] === 'video' ? 'class="active"' : '' ?>>
                            <span class="glyphicon glyphicon-film"></span>
                            VIDEOS
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <?php } ?>
       
        <div id="content" class="pull-right">
        	<?php if(isset($_SESSION["logged_user"])){ ?>
        	<h1>
                <?php
				if(!isset($_GET['c'])){
					echo "Dise&ntilde;os";
				} else {
					if($_GET['c'] === "system"){
						if($_GET['a'] !== "logout"){
							echo ucwords(DEFAULT_CONTROLLER) . 's';	
						}
                    } else if($_GET['c'] === "design"){
                        echo "Dise&ntilde;os";
					} else if($_GET['c'] === "video"){
						echo "Videos";   
                    }
				}
				require_once("submenu.php");
				?>
            </h1>
			<?php
			}
            require_once("app/Application.php");
            $app = new Application;
            $app->run();
            ?>
        </div>
        
    </section>

</body>
</html>
