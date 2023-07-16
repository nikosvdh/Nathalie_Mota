<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'Nathalie_Mota' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mU=Nua:s1baM@JPn|oN{>,U[Y+c%|K,vL>n;!Xma+5NSUe9;#NV^_ZP{^n7k>M63' );
define( 'SECURE_AUTH_KEY',  'Hm:^~9+KP[v#nq;MaB@}34;sdFA^/mm+? ejXM]>n^!Pu 5MM73r/M-E=a~y<G&=' );
define( 'LOGGED_IN_KEY',    'pAK6%PB{.Sw4Mj)w*$mOXfY]Sq]ne*(E+c$N$2W2(**v&ceqxk@CSAxHr7r!K[mw' );
define( 'NONCE_KEY',        '*0e/.nuV~?D]^,JJfPBt+gzPh)U@Itpw$uN14;|yr@(9S3ML:5AiDyu`Ntu+Pu;M' );
define( 'AUTH_SALT',        '{P+Y~|_U3Is87c{Pa?TQ#if&FPx#1()e5N?T1w&Bu&WJ|/.xq=m8xHOj77x,UVBE' );
define( 'SECURE_AUTH_SALT', '}f1=X/~L!@f4b>6quJbvcKxwc_3jp(vAav0nT%/08dxnCVjt|,fWm3.__0drQYJu' );
define( 'LOGGED_IN_SALT',   'UZ;w:6ysQ1#yDw[bNJ7Nry4&$^)`^S0wk/nOC@4.IkVF6JO)D?1CA2}.d_Lr,YKg' );
define( 'NONCE_SALT',       ':5<a|cz5|W:#8}UMh}+@W(RCrxLWPH9q>ufOqH^XdH*M%`{LEz6pn3i_y2h<SC?9' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
