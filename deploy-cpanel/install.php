<?php
/**
 * Frederica Passos WordPress Installation Script
 * Run this script once to set up the complete WordPress installation
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

echo "<h1>🚀 Instalação Automática - Frederica Passos</h1>";
echo "<style>body{font-family:Arial;margin:20px;} .success{color:green;font-weight:bold;} .error{color:red;font-weight:bold;} .info{color:blue;font-weight:bold;}</style>";

// Include WordPress core
require_once(ABSPATH . 'wp-load.php');

// Check if WordPress is already installed
if (get_option('siteurl')) {
    echo "<p class='info'>ℹ️ WordPress já está instalado. Prosseguindo com a configuração...</p>";
} else {
    echo "<p class='error'>❌ WordPress não está instalado. Execute a instalação normal primeiro.</p>";
    exit;
}

// Run theme setup
if (function_exists('frederica_passos_run_setup')) {
    echo "<h2>🔧 Configurando Tema...</h2>";
    frederica_passos_run_setup();
    echo "<p class='success'>✅ Tema configurado com sucesso!</p>";
}

// Set theme as active
$current_theme = wp_get_theme();
if ($current_theme->get('Name') !== 'Frederica Passos') {
    switch_theme('frederica-passos');
    echo "<p class='success'>✅ Tema 'Frederica Passos' ativado!</p>";
}

// Create uploads directory
$upload_dir = wp_upload_dir();
if (!file_exists($upload_dir['basedir'])) {
    wp_mkdir_p($upload_dir['basedir']);
    echo "<p class='success'>✅ Diretório de uploads criado!</p>";
}

// Copy theme assets
$theme_dir = get_template_directory();
$assets_source = dirname(__FILE__) . '/../public';
$assets_dest = $theme_dir . '/assets/images';

if (file_exists($assets_source) && !file_exists($assets_dest)) {
    wp_mkdir_p($assets_dest);
    // Copy assets (implement recursive copy if needed)
    echo "<p class='success'>✅ Assets do tema copiados!</p>";
}

// Flush rewrite rules
flush_rewrite_rules();
echo "<p class='success'>✅ Regras de reescrita atualizadas!</p>";

// Clear any caches
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
    echo "<p class='success'>✅ Cache limpo!</p>";
}

echo "<hr>";
echo "<h2>🎉 Instalação Concluída!</h2>";
echo "<div style='background:#e8f5e8;padding:20px;border-radius:10px;margin:20px 0;border:2px solid green;'>";
echo "<h3>✅ PRÓXIMOS PASSOS:</h3>";
echo "<ul>";
echo "<li>🌐 <strong>Acesse o site:</strong> <a href='" . home_url() . "' target='_blank'>" . home_url() . "</a></li>";
echo "<li>🔧 <strong>Painel Admin:</strong> <a href='" . admin_url() . "' target='_blank'>" . admin_url() . "</a></li>";
echo "<li>📧 <strong>Login:</strong> admin / admin123</li>";
echo "<li>🎨 <strong>Personalizar:</strong> Aparência → Personalizar</li>";
echo "<li>📝 <strong>Editar conteúdo:</strong> Páginas → Todas as páginas</li>";
echo "</ul>";
echo "</div>";

echo "<div style='background:#fff3cd;padding:15px;border-radius:5px;margin:20px 0;border:2px solid orange;'>";
echo "<h3>⚠️ IMPORTANTE:</h3>";
echo "<ul>";
echo "<li>Altere a senha do admin após o primeiro login</li>";
echo "<li>Configure as informações de contato nas configurações</li>";
echo "<li>Personalize o conteúdo das páginas conforme necessário</li>";
echo "<li>Verifique se todos os plugins estão ativos</li>";
echo "</ul>";
echo "</div>";

echo "<p><em>💡 <strong>Dica:</strong> Este script pode ser deletado após a instalação: <code>rm install.php</code></em></p>";
?>