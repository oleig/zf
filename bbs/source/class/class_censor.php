<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_censor.php 15373 2010-08-24 01:19:22Z monkey $
 */

define('DISCUZ_CENSOR_SUCCEED', 0);
define('DISCUZ_CENSOR_BANNED', 1);
define('DISCUZ_CENSOR_MODERATED', 2);
define('DISCUZ_CENSOR_REPLACED', 3);

class discuz_censor {
	var $table = 'common_word';
	var $censor_words = array();
	var $bbcodes_display;
	var $result;
	var $words_found = array();

	var $highlight;

	function discuz_censor() {
		global $_G;
		loadcache(array('censor', 'bbcodes_display'));
		$this->censor_words = !empty($_G['cache']['censor']) ? $_G['cache']['censor'] : array();
		$this->bbcodes_display = $_G['cache']['bbcodes_display'][$_G['groupid']];
	}

	function & instance() {
		static $instance;
		if(!$instance) {
			$instance = new discuz_censor();
		}
		return $instance;
	}

	function highlight($message, $badwords_regex) {
		$color = $this->highlight;
		if(empty($color)) {
			return $message;
		}
		$message = preg_replace($badwords_regex, '<span style="color: '.$color.';">\\1</span>', $message);
		return $message;
	}

	function check(&$message, $modword = NULL) {
		$this->words_found = array();
		$bbcodes = 'b|i|color|size|font|align|list|indent|email|hide|quote|code|free|table|tr|td|img|swf|attach|payto|float'.($this->bbcodes_display ? '|'.implode('|', array_keys($this->bbcodes_display)) : '');
		if(!empty($this->censor_words['banned'])) {
			if(preg_match_all($this->censor_words['banned'], @preg_replace(array("/\[($bbcodes)=?.*\]/iU", "/\[\/($bbcodes)\]/i"), '', $message), $matches)) {
				$this->words_found = $matches[0];
				$this->result = DISCUZ_CENSOR_BANNED;
				$this->words_found = array_unique($this->words_found);
				$message = $this->highlight($message, $this->censor_words['banned']);
				return DISCUZ_CENSOR_BANNED;
			}
		}
		if($this->censor_words['mod']) {
			if($modword !== NULL) {
				$message = preg_replace($this->censor_words['mod'], $modword, $message);
			}
			if(preg_match_all($this->censor_words['mod'], @preg_replace(array("/\[($bbcodes)=?.*\]/iU", "/\[\/($bbcodes)\]/i"), '', $message), $matches)) {
				$this->words_found = $matches[0];
				$this->result = DISCUZ_CENSOR_MODERATED;
				$message = $this->highlight($message, $this->censor_words['mod']);
				$this->words_found = array_unique($this->words_found);
				return DISCUZ_CENSOR_MODERATED;
			}
		}
		if(!empty($this->censor_words['filter'])) {
			$message = preg_replace($this->censor_words['filter']['find'], $this->censor_words['filter']['replace'], $message);
			$this->result = DISCUZ_CENSOR_REPLACED;
			return DISCUZ_CENSOR_REPLACED;
		}
		$this->result = DISCUZ_CENSOR_SUCCEED;
		return DISCUZ_CENSOR_SUCCEED;
	}

	function modbanned() {
		return $this->result == DISCUZ_CENSOR_BANNED;
	}

	function modmoderated() {
		return $this->result == DISCUZ_CENSOR_MODERATED;
	}

	function modreplaced() {
		return $this->result == DISCUZ_CENSOR_REPLACED;
	}

	function modsucceed() {
		return $this->result == DISCUZ_CENSOR_SUCCEED;
	}
}