UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'siteurl';

UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel') WHERE option_value LIKE '%localhost%';
UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost', 'https://fredericapassos.pt/cpanel') WHERE option_value LIKE '%localhost%';

UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost', 'https://fredericapassos.pt/cpanel');

UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost', 'https://fredericapassos.pt/cpanel');

UPDATE wp_comments SET comment_content = REPLACE(comment_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');

UPDATE wp_usermeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
