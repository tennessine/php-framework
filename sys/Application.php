<?php

namespace Framework\Sys;
use Illuminate\Database\Capsule\Manager as Capsule;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Application {
	/**
	 * 控制器
	 * @var string
	 */
	protected $controller;

	/**
	 * 方法
	 * @var string
	 */
	protected $method;

	/**
	 * 参数
	 * @var array
	 */
	protected $params = [];

	protected $templateEngine;
	protected $logger;

	public function __construct() {

		$this->controller = Config::app('default_controller');
		$this->method = Config::app('default_method');

		$this->setUpDatabase();
		$this->setUpTemplateEngine();
		$this->setUpLogger();

		$this->parseUrl();
	}

	/**
	 *	初始化数据库
	 */
	private function setUpDatabase() {
		$capsule = new Capsule;

		$config = Config::database();

		$capsule->addConnection($config['connections'][$config['default']]);
		$capsule->bootEloquent();
	}

	/**
	 * 初始化twig模板引擎
	 */
	private function setUpTemplateEngine() {
		$config = Config::app();

		$loader = new \Twig_Loader_Filesystem($config['template_dir']);
		$this->templateEngine = new \Twig_Environment($loader, array(
			'cache' => $config['template_cache_dir'],
			'auto_reload' => true,
		));
	}

	/**
	 * 初始化日志系统
	 */
	private function setUpLogger() {
		// create a log channel
		$this->logger = new Logger('name');
		$this->logger->pushHandler(new StreamHandler(Config::app('log_path'), Logger::WARNING));
	}

	/**
	 * 解析url
	 * @return void
	 */
	private function parseUrl() {
		$request_uri = filter_var(trim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL);
		$request_uri = explode('?', $request_uri);
		$request_uri = $request_uri[0];

		$segments = explode('/', $request_uri);

		if (current($segments)) {
			$this->controller = array_shift($segments);
		}

		if (current($segments)) {
			$this->method = array_shift($segments);
		}

		if (current($segments)) {
			$this->params = $segments;
		}

		$className = 'App\\Controllers\\' . ucfirst($this->controller) . 'Controller';

		if (class_exists($className)) {

			$obj = new $className($this->templateEngine, $this->logger);

			if (method_exists($obj, $this->method)) {
				call_user_func_array([$obj, $this->method], $this->params);
			} else {
				die(sprintf('method %s does not exist', $this->method));
			}
		} else {
			die(sprintf('controller %s does not exist', $className));
		}
	}
}