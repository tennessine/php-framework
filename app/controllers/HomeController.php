<?php

namespace App\Controllers;

use Framework\Sys\Controller;

class HomeController extends Controller {

	public function index($id = 1) {
		var_dump($_ENV);
		// $post = Post::find($id);
		// $this->view('home/index.html', [
		// 	'post' => $post,
		// ]);

		// Post::create([
		// 	'user_id' => 1,
		// 	'title' => '糗事百科',
		// 	'body' => '天越来越暖和了，于是穿上丝袜照镜子，正为自己象腿苦恼，俺家小萝莉过来抱着大腿就又摸又蹭，还一脸陶醉的说“还是你的腿肉肉多，真舒服！”我，我……',
		// ]);
	}
}