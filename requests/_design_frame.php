<?php

require_once("_main2.php");

$design = getDesign($_GET["id_design"]);
header("Content-type: " . $design["frame_type"]);
echo $design["frame_design"];

?>