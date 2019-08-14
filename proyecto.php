<?php

require_once("requests/_main.php");

$idProyecto = $_GET['p'];
$proyecto = getDesign($idProyecto);
$galeriaProyecto = getDesignGallery($idProyecto);
//var_dump($galeriaProyecto);
?>
<!DOCTYPE html>
<html>

    <?php include 'head.php';?>

<body >

    <!-- Nav -->
    <div class="nav-mobile">
    	<a class="btn-nav-responsive" href="javascript:void(0)"><img src="img/icon-bar.svg"></a>
    	<div class="logo">
    		<a class="navbar-logo" href="index.php" ><img class="svg logo-svg" src="img/logo.svg" alt="un barco" title="un barco"></a>
    	</div>
    </div>
    	<!-- Nav Main-->
    <nav class="main-nav">
    	<div class="contenedor">

    		<div class="nav-collapse-left">
    			<ul class="navbar-menu">
    				<li> <a class="li-secciones btn-contacto active" href="index.php"><span class="linea">proyectos / <span class="italic">projects</span></span></a></li>
                    <li> <a class="li-secciones btn-contacto" href="nosotros.php"><span class="linea">nosotros / <span class="italic">about us</span></span></a></li>
    				<li style="display:none;"> <a class="li-secciones btn-contacto" href="tienda.php"><span class="linea">tienda / <span class="italic">store</span></span></a></li>
                    <li style="display:none;"> <a class="li-secciones btn-contacto" href="contacto.php"><span class="linea">contacto / <span class="italic">contact</span></span></a></li>
    			</ul>
    		</div>


            <div class="logo">
                <a class="navbar-logo" href="index.php" ><img class="svg logo-svg" src="img/logo.svg" alt="un barco" title="un barco"></a>
                <h1 style="display:none;">Estudio un barco</h1>

                <div class="nav-redes">
        			<a class="btn-instagram" href="https://www.instagram.com/unbarco.estudio/" target="_blank"><span class="btn-redes">Instagram</span></a>
                    <a class="btn-behance" href="https://www.behance.net/holabarco" target="_blank"><span class="btn-redes" >Behance</span></a>
        			<a class="btn-facebook" href="https://www.facebook.com/unbarco.estudio" target="_blank"><span class="btn-redes" >Facebook</span></a>
        		</div>

            </div>


            <div class="nav-collapse-right">
    			<ul class="navbar-menu">
                    <li> <a class="li-secciones btn-contacto" href="tienda.php"><span class="linea">tienda / <span class="italic">store</span></span></a></li>
                    <li> <a class="li-secciones btn-contacto" href="contacto.php"><span class="linea">contacto / <span class="italic">contact</span></span></a></li>
    			</ul>
    		</div>

            <a class="btn-icon-close"  style="display:none;" href="javascript:void(0)" ><img src="img/icon-close.svg"></a>
    		<p style="display:none;" class="nav-footer">© 2014-2019 The Work of Un Barco. </br >Visual identity, Branding, Packaging and Art direction.</p>
    	</div>
    </nav>

    <!-- END NAV -->

    <?php if($galeriaProyecto){ $count=0;
        foreach($galeriaProyecto as $image){
            if ( $count==0  ){
    ?>

            <img class="img-proyecto principal" src="requests/_design_image.php?id_design_image=<?php echo $image->getIdDesignImage() ?>" alt="<?php echo $proyecto->getName();?>" title="<?php echo $proyecto->getName();?>">

            <div class="columna proyecto">

                <div class="texto">
                    <div class="columna-espaniol">
                        <h2>Espa&ntilde;ol</h2>
                        <p><?php echo $proyecto->getDescription();?></p>
                    </div>
                    <div class="columna-ingles">
                        <h2>ENGLISH</h2>
                        <p><?php echo $proyecto->getDescriptionIngles();?></p>
                    </div>
                </div>


            <?php }else{ ?>
                <img class="img-proyecto" src="requests/_design_image.php?id_design_image=<?php echo $image->getIdDesignImage() ?>">
    <?php }
            $count++;
        }
    }
    ?>

</div>


<?php include 'footer.php';?>
</body>

</html>
