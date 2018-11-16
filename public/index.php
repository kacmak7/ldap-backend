<?php

/*
 * $Id$
 */

require_once('../vendor/autoload.php');

$f3 = Base::instance();

$f3->config('../app/config.ini');

$f3->set('AUTOLOAD', '../app/');
$f3->set('CACHE', 'folder=../tmp/cache');
$f3->set('CORS.origin', '*');
$f3->set('UI', '../app/view/');

$f3->route('GET /api/domains', 'Controller\Api->GET_domains');
$f3->route('GET /api/test',
	function() {
		echo 'test';
	});
$f3->route('GET /api/test/con', 'Controller\Api->GET_test_message');
$f3->run();

