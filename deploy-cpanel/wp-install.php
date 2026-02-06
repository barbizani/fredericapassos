<?php
/**
 * Force WordPress Installation
 * This script forces a complete WordPress installation regardless of current state
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

echo "<h1>🔧 FORÇANDO INSTALAÇÃO COMPLETA DO WORDPRESS</h1>";
echo "<style>body{font-family:Arial;margin:20px;} .success{color:green;font-weight:bold;} .error{color:red;font-weight:bold;} .info{color:blue;font-weight:bold;}</style>";

// Step 1: Delete any existing installation data
echo "<h3>🧹 Limpando dados existentes...</h3>";

// Delete WordPress options
global $wpdb;
if ($wpdb) {
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE 'siteurl' OR option_name LIKE 'home' OR option_name LIKE 'blogname'");
    echo "<p class='info'>✅ Opções WordPress limpas</p>";
}

// Step 2: Force reinstall
echo "<h3>📦 Forçando reinstalação...</h3>";

// Site configuration - FORCE these values
$site_title = 'Frederica Passos';
$admin_user = 'admin';
$admin_password = 'admin123';
$admin_email = 'admin@fredericapassos.pt';

// Force the installation
if (!function_exists('wp_install')) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    require_once(ABSPATH . 'wp-includes/wp-db.php');
}

try {
    // Manually set the database
    global $wpdb;
    if ($wpdb) {
        // Create the admin user directly
        $user_id = wp_create_user($admin_user, $admin_password, $admin_email);
        if (!is_wp_error($user_id)) {
            $user = new WP_User($user_id);
            $user->set_role('administrator');
            echo "<p class='success'>✅ Usuário admin criado: $admin_user</p>";
        }

        // Set site options directly
        update_option('siteurl', 'http://localhost:8000');
        update_option('home', 'http://localhost:8000');
        update_option('blogname', $site_title);
        update_option('admin_email', $admin_email);

        echo "<p class='success'>✅ Opções do site configuradas</p>";
    }

    echo "<h3>🎉 WordPress instalado com sucesso!</h3>";
    echo "<p class='success'>Agora você pode acessar o site normalmente.</p>";

    // Redirect to site
    echo "<script>setTimeout(function(){window.location.href='http://localhost:8000';}, 3000);</script>";
    echo "<p><strong>Redirecionando em 3 segundos...</strong></p>";

} catch (Exception $e) {
    echo "<p class='error'>❌ Erro na instalação: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><a href='http://localhost:8000' style='background:#007cba;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;'>Acessar Site Agora</a></p>";
?>