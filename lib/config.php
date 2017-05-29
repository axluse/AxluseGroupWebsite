<?php

/**
 * 共通設定ファイル
 */

/* DB接続情報 */
define('DSN', 'mysqlt://root:password@localhost/DBName');

/* 文字コード */
mb_language('japanese');
mb_internal_encoding('utf-8');

/* インクルードパス設定 */
ini_set('include_path', APP_HOME . '/lib');

/* エラー表示 */
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

/* 暗号化キー 128キー */
define ('KEY', '');
define ('IV', '');

/* メールアドレス設定 */
define ('ADDRESS', '');
define ('DISPLAY_NAME', '');
define ('SFTP_PORT', '');
define ('SFTP_HOST', '');

?>
