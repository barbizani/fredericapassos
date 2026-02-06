<?php
define('DB_NAME', 'updklnwsqf6clv_fredericapassos');
define('DB_USER', 'updklnwsqf6clv_fredericapassos');
define('DB_PASSWORD', 'E#S[7LZx?},)gY22');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

define('AUTH_KEY',         'p[}ruJ:>Qbjoa:W-j$)*Ty_JAM,Y:u}ss/:m^w^ZjZd5m:YmdJSZc`lDyPs3w/R2');
define('SECURE_AUTH_KEY',  '[w@{],JQg/.:2Ih/})h~e7.kw%qPT,!5UfP>!5M)^J|K)dYr/e*H^~B;ofVT S_s');
define('LOGGED_IN_KEY',    'EzKu%PUSH:FWM;@$.uG4%si=TrZ><we^Q/YtnHTdsT&XC#1%w]La-4|onCyKIM:L');
define('NONCE_KEY',        '}Ew6,8~K3Sgiu,+MN>*fMkWZmU%va].EL&/NF;qTWT`^<yhc]?!RnhuHa1(2AoPS');
define('AUTH_SALT',        't:km~2Onc<Rb.~lb%qOhUY=~h|7j+KVIdV>#YHcq1o.F6)(7TkzXjWL_.W&*/,ni');
define('SECURE_AUTH_SALT', '3Oi[3$oKg]UuwDBOU>0d`+|Ub2F,;WmCF^R=ld6iVA<EOmv*#<{ynAtNa{rxp!-+');
define('LOGGED_IN_SALT',   'Wtg3S8rzrq6BtMJHI?TsR$&ax$bZ?eg]zO}~ty)/-5^.2{Jxz3:x%z~tQD0ASZfn');
define('NONCE_SALT',       'oX)5#GLx=kVgYdrMp)C34d{o1lgxX:~od6c1y*~VEL{{~|4kK_ <g$]rgC([VJ3|');

$table_prefix = 'wp_';

define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

define('WP_HOME', 'https://fredericapassos.pt');
define('WP_SITEURL', 'https://fredericapassos.pt');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
