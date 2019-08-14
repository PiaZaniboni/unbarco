<?php
require_once("requests/_main.php");
$proyectos = getDesignsByCategory(1);
?>
<!DOCTYPE html>
<html>

    <?php include 'head.php';?>

<body >

<?php include 'nav.php';?>

<div class="columna proyectos">
    <p class="espaniol">Un Barco es un estudio de diseño argentino, especializado en desarrollo de identidad, branding y packaging.</p>
    <p class="ingles">Un Barco is a design studio based in Argentina, specialized in visual identity, branding and packaging.</p>

    <?php
        $proyectosSplitted = array_chunk($proyectos, 3);
        foreach($proyectosSplitted as $arr){

            foreach($arr as $proyecto){ ?>
            <a class="caja-proyecto" href="proyecto.php?p=<?php echo $proyecto->getIdDesign(); ?>"><img src="requests/_design_frame.php?id_design=<?php echo $proyecto->getIdDesign(); ?>"><span></span></a>
            <?php
            }
        }
        ?>
</div>

<?php include 'footer.php';?>
</body>

</html>
