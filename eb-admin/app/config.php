
<?php

define("DEFAULT_CONTROLLER", "design");

define("APP_NAME", "UN BARCO");

define("TITLE_TEXT", "Administrador");
define("GO_TO_SITE_TEXT", "Ir al sitio");
define("CLOSE_SESSION_TEXT", "Cerrar sesi&oacute;n");
define("CONFIRMATION_TEXT", "¿Desea continuar?");
define("YES_TEXT", "Si");
define("NO_TEXT", "No");
define("REQUIRED_FIELDS_TEXT", "Los campos con * son obligatorios.");

if($_SERVER["HTTP_HOST"] === "localhost"){
	define("WEB_PATH", "http://local.unbarconuevo.com/barco");
	define("APP_PATH", "http://local.unbarconuevo.com/eb-admin");

	define("DB_NAME", "barco-db");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");

	define("ACTIVATE_URL_FRIENDLY", false);
} else {
	define("WEB_PATH", "http://local.unbarconuevo.com/barco");
	define("APP_PATH", "http://local.unbarconuevo.com/eb-admin");

	define("DB_NAME", "barco-db");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");

	define("ACTIVATE_URL_FRIENDLY", false);
}

?>
