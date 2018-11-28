<?php

/*
 * $Id$
 */

require_once('../vendor/autoload.php');

$f3 = Base::instance();

$f3->config('../app/config.ini');

$f3->set('AUTOLOAD', '../app/');


$f3->set('CACHE', 'folder=../tmp/cache');
// CORS
$f3->copy('HEADERS.Orgin', 'CORS.origin');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested_With, Content-Type');
//$f3->set('CORS.origin', '*');

$f3->set('UI', '../app/view/');

$f3->route('GET /api/domains', 'Controller\Api->GET_domains');
$f3->route('GET /api/test',
	function() {
		echo 'test';
	});
$f3->route('GET /api/test1', 'Controller\Api->GET_test_message');
$f3->route('GET /api/test/array', 'Controller\Api->GET_test_numbers');

$f3->route('GET /api/users', 'Controller\Api->GET_users');
$f3->route('GET /api/user', 'Controller\Api->GET_users');

$f3->route('POST /api/user', 'Controller\Api->POST_user');

$f3->route('GET /api/users/array', 'Controller\Api->GET_users_array');

$f3->route('GET /api/test/number', 'Controller\Api->GET_test_number');

/*$f3->route('POST /api/test/post', 
	function(\Base $f3) {
		echo json_decode($f3->get('BODY'),true)['employees'][0]['firstName'];
	});


/*$f3->route('GET /api/bind', 
	function() {
		$ldap_dn = "cn=admin,dc=marol,dc=com,dc=pl";
		$ldap_password = "secret";
		$ldap_con = ldap_connect("127.0.0.1");

		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

		if (ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
			echo "Bind successful";


		}
		else {
			echo "ErRoR";
		}
	});

$f3->route('GET /api/add', 
	function() {
		$ldap_dn = "cn=admin,dc=marol,dc=com,dc=pl";
		$ldap_password = "secret";
		$ldap_con = ldap_connect("127.0.0.1");

		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

		if (ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
			echo "Bind successful";

			$info["objectclass"][0] = "inetOrgPerson";
			$info["objectclass"][1] = "person";
			$info["objectclass"][2] = "organizationalPerson";
			$info["objectclass"][3] = "posixAccount";
			$info["objectclass"][4] = "shadowAccount";
			$info["objectclass"][5] = "top";
			$info["cn"] = "Tasty Test";
			$info["gidNumber"] = "99999";
			$info["homeDirectory"] = "/home/testt1";
			$info["sn"] = "Test";
			$info["uid"] = "testt1";
			$info["uidNumber"] = "99999";

			ldap_add($ldap_con, "uid=testt1,ou=users,dc=marol,dc=com,dc=pl", $info);
			ldap_close($ldap_con);

		}
		else {
			echo "ErRoR";
		}
	});
 */

$f3->run();
