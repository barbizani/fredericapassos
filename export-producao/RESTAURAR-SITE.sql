-- ⚠️ SCRIPT DE RESTAURAÇÃO - Execute se o site desconfigurou
-- Este script tenta restaurar o estado anterior

-- 1. Limpar o JSON do Elementor que pode estar corrompido
UPDATE wp_postmeta 
SET meta_value = '' 
WHERE post_id = 11 AND meta_key = '_elementor_data';

-- 2. Limpar cache do Elementor
DELETE FROM wp_options WHERE option_name LIKE '_transient_elementor%';
DELETE FROM wp_options WHERE option_name LIKE '_transient_timeout_elementor%';

-- 3. Limpar cache geral do WordPress
DELETE FROM wp_options WHERE option_name LIKE '_transient_%';
DELETE FROM wp_options WHERE option_name LIKE '_transient_timeout_%';

-- 4. Verificar se a página Home existe
SELECT post_id, post_title, post_status 
FROM wp_posts 
WHERE post_id = 11 AND post_type = 'page';

-- Se a página não existir, você precisará criá-la manualmente no WordPress Admin
