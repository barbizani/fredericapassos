<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$wp_load_paths = [
    __DIR__ . '/wp-load.php',
    __DIR__ . '/../wp-load.php',
    __DIR__ . '/../../wp-load.php',
    __DIR__ . '/../../../wp-load.php',
    dirname(__DIR__) . '/wp-load.php',
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

if (!current_user_can('edit_posts')) {
    die('❌ Você não tem permissão para executar este script.<br>Faça login no WordPress Admin primeiro.');
}

$page_id = 11;
$json_file = __DIR__ . '/elementor-data.json';

echo "<h2>📦 Importador de Elementor</h2>";
echo "<hr>";

if (!file_exists($json_file)) {
    die('❌ Arquivo elementor-data.json não encontrado!<br>Local procurado: ' . $json_file . '<br><br>Certifique-se de que o arquivo elementor-data.json está na mesma pasta deste script PHP.');
}

echo "✅ Arquivo JSON encontrado: " . $json_file . "<br>";

$json_content = file_get_contents($json_file);
if ($json_content === false) {
    die('❌ Erro ao ler o arquivo JSON!');
}

echo "✅ Arquivo JSON lido: " . number_format(strlen($json_content)) . " caracteres<br>";

$json_data = json_decode($json_content, true);

if ($json_data === null) {
    die('❌ Erro: JSON inválido!<br>Erro: ' . json_last_error_msg() . '<br>Último erro JSON: ' . json_last_error());
}

echo "✅ JSON válido!<br>";

$result = update_post_meta($page_id, '_elementor_data', wp_slash($json_content));

if ($result === false) {
    echo "⚠️ Aviso: update_post_meta retornou false. Pode ser que o valor não tenha mudado.<br>";
} else {
    echo "✅ Meta _elementor_data atualizado!<br>";
}

$result2 = update_post_meta($page_id, '_elementor_edit_mode', 'builder');
$result3 = update_post_meta($page_id, '_elementor_template_type', 'wp-page');

echo "✅ Elementor configurado como editor!<br>";

delete_transient('elementor_css_' . $page_id);
delete_option('_elementor_css_' . $page_id);

$deleted = $GLOBALS['wpdb']->query("DELETE FROM {$GLOBALS['wpdb']->options} WHERE option_name LIKE '_transient_elementor%'");
$deleted2 = $GLOBALS['wpdb']->query("DELETE FROM {$GLOBALS['wpdb']->options} WHERE option_name LIKE '_transient_timeout_elementor%'");

echo "✅ Cache limpo! ($deleted + $deleted2 transients removidos)<br><br>";

echo "<hr>";
echo "<h3>✅ SUCESSO! JSON importado na página ID $page_id</h3>";
echo "<br>";
echo "<strong>📝 Próximos passos:</strong><br>";
echo "1. <a href='" . admin_url('post.php?post=' . $page_id . '&action=elementor') . "' target='_blank'>Clique aqui para Editar com Elementor</a><br>";
echo "2. No Elementor, clique em <strong>'Atualizar'</strong> ou <strong>'Update'</strong> para salvar<br>";
echo "3. Vá em: <strong>Elementor → Tools → Regenerate CSS</strong><br>";
echo "4. Limpe o cache do navegador (Ctrl+F5)<br>";
echo "5. <strong>DELETE este arquivo PHP por segurança!</strong><br>";
echo "<br>";
echo "<hr>";
echo "<small>Script executado em: " . date('Y-m-d H:i:s') . "</small>";
