<?php

require_once("_main2.php");

$designImage = getDesignImage($_GET["id_design_image"]);
header("Content-type: " . $designImage["type_image"]);
echo $designImage["design_image"];

?>