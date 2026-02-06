<?php
/**
 * BASIC WordPress Setup - Forces everything to work
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

echo "<h1>🚀 SETUP BÁSICO DO WORDPRESS</h1>";
echo "<style>body{font-family:Arial;margin:20px;} .success{color:green;font-weight:bold;} .error{color:red;font-weight:bold;} .info{color:blue;font-weight:bold;}</style>";

// Force include WordPress
require_once(ABSPATH . 'wp-load.php');

// Force set basic options
echo "<h3>⚙️ Configurando opções básicas...</h3>";

update_option('siteurl', 'http://localhost:8000');
update_option('home', 'http://localhost:8000');
update_option('blogname', 'Frederica Passos');
update_option('blogdescription', 'Psiquiatria Perinatal e Sexualidade Humana');
update_option('admin_email', 'admin@fredericapassos.pt');

echo "<p class='success'>✅ Opções básicas configuradas</p>";

// Create admin user if doesn't exist
echo "<h3>👤 Criando usuário admin...</h3>";

if (!username_exists('admin')) {
    $user_id = wp_create_user('admin', 'admin123', 'admin@fredericapassos.pt');
    if (!is_wp_error($user_id)) {
        $user = new WP_User($user_id);
        $user->set_role('administrator');
        echo "<p class='success'>✅ Usuário admin criado</p>";
    } else {
        echo "<p class='error'>❌ Erro ao criar usuário: " . $user_id->get_error_message() . "</p>";
    }
} else {
    echo "<p class='info'>ℹ️ Usuário admin já existe</p>";
}

// Activate theme
echo "<h3>🎨 Ativando tema...</h3>";

switch_theme('frederica-passos');
echo "<p class='success'>✅ Tema ativado</p>";

// Redirect to main installation
echo "<h3>🔄 Redirecionando para instalação completa...</h3>";
echo "<p>Em 3 segundos você será redirecionado para a instalação completa...</p>";

echo "<script>
setTimeout(function(){
    window.location.href = 'http://localhost:8000/auto-install.php';
}, 3000);
</script>";

echo "<p><a href='http://localhost:8000/auto-install.php' style='background:#007cba;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;'>Continuar Instalação</a></p>";
?>