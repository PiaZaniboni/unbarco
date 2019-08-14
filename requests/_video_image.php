<?php

require_once("_main2.php");

$video = getVideo($_GET["id_video"]);
header("Content-type: " . $video["frame_type"]);
echo $video["frame_video"];

?>