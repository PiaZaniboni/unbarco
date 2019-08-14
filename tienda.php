<?php
require_once("requests/_main.php");
$tiendas = getDesignsByCategory(2);
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
    				<li> <a class="li-secciones btn-contacto" href="index.php"><span class="linea">proyectos / <span class="italic">projects</span></span></a></li>
                    <li> <a class="li-secciones btn-contacto" href="nosotros.php"><span class="linea">nosotros / <span class="italic">about us</span></span></a></li>
    				<li style="display:none;"> <a class="li-secciones btn-contacto active" href="tienda.php"><span class="linea">tienda / <span class="italic">store</span></span></a></li>
                    <li style="display:none;"> <a class="li-secciones btn-contacto" href="contacto.php"><span class="linea">contacto / <span class="italic">contact</span></span></a></li>
    			</ul>
    		</div>


            <div class="logo">
                <a class="navbar-logo" href="index.php" ><img class="svg logo-svg" src="img/logo.svg" alt="un barco" title="un barco"></a>
                <h1 style="display:none;">Estudio un barco</h1>

                <div class="nav-redes tienda">
        			<a class="btn-instagram" href="https://www.instagram.com/unbarco.store/" target="_blank" style="padding:0!important;"><span class="italic tienda">STORE - </span><span class="btn-redes">Instagram</span></a>
        		</div>

            </div>


            <div class="nav-collapse-right">
    			<ul class="navbar-menu">
                    <li> <a class="li-secciones btn-contacto active" href="tienda.php"><span class="linea">tienda / <span class="italic">store</span></span></a></li>
                    <li> <a class="li-secciones btn-contacto" href="contacto.php"><span class="linea">contacto / <span class="italic">contact</span></span></a></li>
    			</ul>
    		</div>

            <a class="btn-icon-close"  style="display:none;" href="javascript:void(0)" ><img src="img/icon-close.svg"></a>
    		<p style="display:none;" class="nav-footer">© 2014-2019 The Work of Un Barco. </br >Visual identity, Branding, Packaging and Art direction.</p>
    	</div>
    </nav>

    <!-- END NAV -->


<div class="columna tiendas">

    <div class="nav-redes tienda" style="display:none;">
        <span class="italic tienda">STORE - </span><a class="btn-instagram" href="https://www.instagram.com/unbarco.store/" target="_blank" style="padding:0!important;"><span class="btn-redes">Instagram</span></a>
    </div>

    <?php
        $tiendasSplitted = array_chunk($tiendas, 3);
        foreach($tiendasSplitted as $arr){

            foreach($arr as $tienda){ ?>
            <div class="caja-tienda"><img src="requests/_design_frame.php?id_design=<?php echo $tienda->getIdDesign(); ?>"></div>
            <?php
            }
        }
        ?>

    <!--<div class="caja-tienda" style="background-image:url('img/tienda.jpg');"></div>-->
</div>


<?php include 'footer.php';?>
</body>

</html>
