<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'tutowp' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'oH3I}?<]xiPoN/& x v;L1yaR19;KCD+J65gR+2l&5%[4jOJmJfPIT1fp%H)(-lR' );
define( 'SECURE_AUTH_KEY',  'T`{|jk{TD8r yZ5q<k Z;;Zz7$IA@lqJ`%T%y#7EYmq;3<hg)d5ymE{90A&d&`z>' );
define( 'LOGGED_IN_KEY',    '%?1)H]Q{]G.!&diPU}c+SWIF<|o3vLj81|I,/I#Iw)Kx>vra|R--02AN2XG4^z=V' );
define( 'NONCE_KEY',        ',jN9wU1DIJF6;o-3;Ldz1V9o5l-6SS|l8@50D@6S?2[%W._c@$rZ!6<f0N,eI@.t' );
define( 'AUTH_SALT',        ':,I~+_@#QLIf-ot#9vE3o[eP^t`T<c95^$w-iKa8fGPV]]9`Z[:pO/I[fn:C7zZ6' );
define( 'SECURE_AUTH_SALT', 'M!PLv}%OhePObFI~U7K~- PU[&s/}$O]aq$:oM9)6y@KC(;Lq7iV0s^x, :ed/;x' );
define( 'LOGGED_IN_SALT',   '>FVVZ6TQ,Ie-:gEOx^[U>q@1%Kx9r%L`/aQ:7VN7=?PD93.2`QYuz9zwNFtp`umn' );
define( 'NONCE_SALT',       '|Fvk^&5%a@TY)O$rj@TQ62<)B1%l{g^G&Ihg+Y,:tG(A!Bp|)Iq`OF|=CORc6S*^' );
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
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
