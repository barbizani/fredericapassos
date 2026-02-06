<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$wp_load_paths = [
    __DIR__ . '/wp-load.php',
    __DIR__ . '/../wp-load.php',
    __DIR__ . '/../../wp-load.php',
    __DIR__ . '/../../../wp-load.php',
    dirname(__DIR__) . '/wp-load.php',
    dirname(dirname(__DIR__)) . '/wp-load.php',
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
    die('❌ Erro: wp-load.php não encontrado!<br>Procurou em: ' . implode('<br>', $wp_load_paths));
}

if (!function_exists('current_user_can')) {
    die('❌ Erro: WordPress não foi carregado corretamente!');
}

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url($_SERVER['REQUEST_URI']));
    exit;
}

if (!current_user_can('edit_posts')) {
    die('❌ Você não tem permissão para executar este script.<br>Faça login no WordPress Admin primeiro.');
}

$page_id = 11;
$json_file = __DIR__ . '/elementor-data.json';

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Importar Elementor</title><style>body{font-family:Arial,sans-serif;max-width:800px;margin:50px auto;padding:20px;background:#f5f5f5}h2{color:#333}hr{border:1px solid #ddd;margin:20px 0}.success{color:#28a745;font-weight:bold}.error{color:#dc3545;font-weight:bold}.info{color:#17a2b8}a{color:#0073aa;text-decoration:none}a:hover{text-decoration:underline}</style></head><body>";
echo "<h2>📦 Importador de Elementor - Versão 2</h2>";
echo "<hr>";

if (!file_exists($json_file)) {
    die('❌ Arquivo elementor-data.json não encontrado!<br>Local procurado: ' . $json_file . '<br><br>Certifique-se de que o arquivo elementor-data.json está na mesma pasta deste script PHP.');
}

echo "<div class='info'>✅ Arquivo JSON encontrado: " . basename($json_file) . "</div>";

$json_content = file_get_contents($json_file);
if ($json_content === false) {
    die('❌ Erro ao ler o arquivo JSON!');
}

echo "<div class='info'>✅ Arquivo JSON lido: " . number_format(strlen($json_content)) . " caracteres</div>";

$json_data = json_decode($json_content, true);

if ($json_data === null) {
    die('❌ Erro: JSON inválido!<br>Erro: ' . json_last_error_msg() . '<br>Último erro JSON: ' . json_last_error());
}

echo "<div class='info'>✅ JSON válido!</div>";

global $wpdb;

$result1 = update_post_meta($page_id, '_elementor_data', wp_slash($json_content));
$result2 = update_post_meta($page_id, '_elementor_edit_mode', 'builder');
$result3 = update_post_meta($page_id, '_elementor_template_type', 'wp-page');
$result4 = update_post_meta($page_id, '_elementor_version', '0.4');
$result5 = update_post_meta($page_id, '_elementor_pro_version', '');

echo "<div class='info'>✅ Metadados do Elementor atualizados!</div>";

delete_transient('elementor_css_' . $page_id);
delete_option('_elementor_css_' . $page_id);

$deleted1 = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_elementor%'");
$deleted2 = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_elementor%'");
$deleted3 = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_elementor_css%'");

echo "<div class='info'>✅ Cache limpo! ($deleted1 + $deleted2 + $deleted3 transients removidos)</div>";

wp_cache_flush();

echo "<div class='info'>✅ Cache do WordPress limpo!</div>";

echo "<hr>";
echo "<h3 class='success'>✅ SUCESSO! JSON importado na página ID $page_id</h3>";
echo "<br>";
echo "<strong>📝 Próximos passos:</strong><br>";
echo "1. <a href='" . admin_url('post.php?post=' . $page_id . '&action=elementor') . "' target='_blank'><strong>Clique aqui para Editar com Elementor</strong></a><br>";
echo "2. No Elementor, clique em <strong>'Atualizar'</strong> ou <strong>'Update'</strong> para salvar<br>";
echo "3. Vá em: <strong>Elementor → Tools → Regenerate CSS</strong><br>";
echo "4. Clique em <strong>'Regenerate Files & Data'</strong><br>";
echo "5. Limpe o cache do navegador (Ctrl+F5 ou Cmd+Shift+R)<br>";
echo "6. <strong style='color:red;'>DELETE este arquivo PHP por segurança!</strong><br>";
echo "<br>";
echo "<hr>";
echo "<small>Script executado em: " . date('Y-m-d H:i:s') . "</small>";
echo "</body></html>";
