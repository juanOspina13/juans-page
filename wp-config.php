<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'juans_page' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'ET,(b=<R<E/c)=ORSn2{QH[p[*T6T}ED.LIu%|eG-=HZo:rDeW{O4wj7pGnW27w=' );
define( 'SECURE_AUTH_KEY', '.S`M^F>2aQyGk~B}0(S$7<zqTl1*lTi/.cAU.?KQ|t8)u+?N_WuYaH0m:kp4dwbp' );
define( 'LOGGED_IN_KEY', 'kgb*G.VW{x?Kq=m[i)7Fw40M4tjKmJO|DhPQ9Ee^kZeUgM;JP`LFJ_IiEXP;d_YT' );
define( 'NONCE_KEY', '{(}xv,S[C^#EcRp9@/{!y-9FX._w:#Eu6l$.QZ5e @#)d^%[UGKXM%>R}I@[m#2u' );
define( 'AUTH_SALT', 'xhl3 <m?~jAIYFPskRwu|*ex>N_M(-G0{d@JyNZ{$L5K2;Y41}*@|;g~[<e`4^@v' );
define( 'SECURE_AUTH_SALT', 'aW@BD.aOQHTwqRO3l8D{l?~BO%5W6H+&7@|zY+;UU+ppaWP*caWG;ntlr8srJ=fs' );
define( 'LOGGED_IN_SALT', '%BO&|(-n4rE>tTJgl*l.h!n&:@5j!V{!<(pO/R6}CZ5xUDhR6.n2uSthwQ:/=$5Z' );
define( 'NONCE_SALT', 'd&ah/ek!hr`bRWax@x#cZ+1|0(nEN]|3T_6SQk.={$~%J~-3ws0iAKq?sIs9Q<dH' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

