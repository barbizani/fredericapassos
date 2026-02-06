<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$wp_load_paths = [
    __DIR__ . '/wp-load.php',
    __DIR__ . '/../wp-load.php',
    __DIR__ . '/../../wp-load.php',
    __DIR__ . '/../../../wp-load.php',
];

$wp_loaded = false;
foreach ($wp_load_paths as $path) {
    if (file_exists($path)) {
        require_once($path);
        $wp_loaded = true;
        break;
    }
}

if (!$wp_loaded) {
    die('❌ Erro: wp-load.php não encontrado!');
}

if (!is_user_logged_in() || !current_user_can('edit_posts')) {
    wp_redirect(wp_login_url($_SERVER['REQUEST_URI']));
    exit;
}

global $wpdb;

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Limpar Cache</title><style>body{font-family:Arial,sans-serif;max-width:800px;margin:50px auto;padding:20px;background:#f5f5f5}h2{color:#333}hr{border:1px solid #ddd;margin:20px 0}.success{color:#28a745;font-weight:bold}</style></head><body>";
echo "<h2>🧹 Limpar Cache do Elementor</h2>";
echo "<hr>";

$deleted1 = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_elementor%'");
$deleted2 = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_elementor%'");
$deleted3 = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_elementor_css%'");
$deleted4 = $wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '_elementor_css%'");

wp_cache_flush();

if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}

if (function_exists('rocket_clean_domain')) {
    rocket_clean_domain();
}

if (function_exists('w3tc_flush_all')) {
    w3tc_flush_all();
}

echo "<div class='success'>✅ Cache limpo com sucesso!</div>";
echo "<div>Transients removidos: $deleted1 + $deleted2 + $deleted3</div>";
echo "<div>Meta removidos: $deleted4</div>";
echo "<br>";
echo "<strong>Próximos passos:</strong><br>";
echo "1. Limpe o cache do navegador (Ctrl+F5 ou Cmd+Shift+R)<br>";
echo "2. Acesse o site e verifique se as alterações aparecem<br>";
echo "3. Se não aparecer, aguarde alguns minutos e tente novamente<br>";
echo "<br>";
echo "<a href='" . home_url() . "'>Ver Site</a> | ";
echo "<a href='" . admin_url() . "'>WordPress Admin</a>";
echo "</body></html>";
