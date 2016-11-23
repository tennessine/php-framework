<?php

namespace Framework\Sys;

class Controller {
	protected $templateEngine;
	protected $logger;

	public function __construct($templateEngine, $logger) {
		$this->templateEngine = $templateEngine;
		$this->logger = $logger;
	}

	protected function view($template, $data = []) {
		echo $this->templateEngine->render($template, $data);
	}
}