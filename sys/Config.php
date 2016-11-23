<?php

namespace Framework\Sys;

class Config {
	private static $app;
	private static $database;

	public static function app($key = null) {
		if (self::$app == null) {
			self::$app = include ROOT . 'config/app.php';
		}

		if (!is_null($key)) {
			return array_key_exists($key, self::$app) ? self::$app[$key] : null;
		}

		return self::$app;
	}

	public static function database($key = null) {
		if (self::$database == null) {
			self::$database = include ROOT . 'config/database.php';
		}

		if (!is_null($key)) {
			return array_key_exists($key, self::$database) ? self::$database[$key] : null;
		}

		return self::$database;
	}
}