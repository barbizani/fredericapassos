<?php
define('DB_NAME', 'seu_banco_de_dados');
define('DB_USER', 'seu_usuario_db');
define('DB_PASSWORD', 'sua_senha_db');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

define('AUTH_KEY',         'gere-uma-chave-unica-aqui');
define('SECURE_AUTH_KEY',  'gere-uma-chave-unica-aqui');
define('LOGGED_IN_KEY',    'gere-uma-chave-unica-aqui');
define('NONCE_KEY',        'gere-uma-chave-unica-aqui');
define('AUTH_SALT',        'gere-uma-chave-unica-aqui');
define('SECURE_AUTH_SALT', 'gere-uma-chave-unica-aqui');
define('LOGGED_IN_SALT',   'gere-uma-chave-unica-aqui');
define('NONCE_SALT',       'gere-uma-chave-unica-aqui');

$table_prefix = 'wp_';

define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

define('WP_HOME', 'https://fredericapassos.pt/cpanel');
define('WP_SITEURL', 'https://fredericapassos.pt/cpanel');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
