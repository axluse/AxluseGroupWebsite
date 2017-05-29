<?php

require_once(dirname(__FILE__) . '/config.php');

require_once ('const.php');
require_once ('adodb/adodb.inc.php');
require_once ('smarty/Autoloader.php');
require_once ('PHPExcel/PHPExcel.php');
require_once ('PHPWord/PHPWord.php');
require_once ('ChromePHP/ChromePhp.php');

/**
 * ユーザーベース
 */

class UserBase {

	protected $db;
	protected $smarty;

	/**
	 * 初期起動処理
	 */
	function __construct(){
		// セッションの開始
		session_start();
		header('Expires:-1');
		header('Cache-Control:');
		header('Pragma:');

		// Smartyの初期化
		Smarty_Autoloader::register();
		$this->smarty = new Smarty();

		// DBの初期化
		$this->db = ADONewConnection(DSN);
		$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
		$this->db->Execute('SET NAMES utf8');
		$this->db->debug = false;
	}

	/**
	 * DB->Execute
	 */
	public function Execute($sql, $param){
		$this->db->Execute($sql, $param);
	}

	/**
	 * DB->GetRow
	 */
	public function GetRow($sql, $param){
		$this->db->GetRow($sql, $param);
	}

	/**
	 * DB->GetAll
	 */
	public function GetAll($sql, $param){
		$this->db->GetAll($sql, $param);
	}

	/**
	 * Smarty->assign
	 */
	public function assign($key, $value){
		$this->smarty->assign($key, $value);
	}

	/**
	 * Smarty->display
	 */
	public function display($tpl){
		$this->smarty->display($tpl);
	}

	/**
	 * Chrome出力
	 */
	public function chr_dump($value, $type="log"){
		// ログ出力
		if($type=="log"){
			ChromePhp::log($value);

		// Info出力
		} else if ($type=="info") {
			ChromePhp::info($value);

		// Warn出力
		} else if ($type=="warn"){
			ChromePhp::warn($value);

		// Error出力
		} else if ($type=="error") {
			ChromePhp::error($value);
		}
	}


}

?>