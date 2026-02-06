-- Importar JSON do Elementor na página Home (ID 11)
-- IMPORTANTE: Substitua 'ELEMENTOR_JSON_AQUI' pelo conteúdo do arquivo elementor-data.json

UPDATE wp_postmeta 
SET meta_value = 'ELEMENTOR_JSON_AQUI' 
WHERE post_id = 11 AND meta_key = '_elementor_data';

-- Se a página não existir, criar
INSERT IGNORE INTO wp_postmeta (post_id, meta_key, meta_value) 
VALUES (11, '_elementor_data', 'ELEMENTOR_JSON_AQUI');

-- Limpar cache do Elementor
DELETE FROM wp_options WHERE option_name LIKE '_transient_elementor%';
DELETE FROM wp_options WHERE option_name LIKE '_transient_timeout_elementor%';
