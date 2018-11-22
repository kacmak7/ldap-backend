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
$f3->route('GET /api/test1', 'Controller\Api->GET_test_message');
$f3->route('GET /api/test/array', 'Controller\Api->GET_test_numbers');

$f3->route('GET /api/users', 'Controller\Api->GET_users');

$f3->route('GET /api/bind', 
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
$f3->route('GET /api/search', 
	function() {
		$ldap_dn = "cn=admin,dc=marol,dc=com,dc=pl";
		$ldap_password = "secret";
		$ldap_con = ldap_connect("127.0.0.1");

		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

		if (ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
			echo "Bind successful";

			$filter = "(uid=andrzejk)";
			$result = ldap_search($ldap_con, "dc=marol,dc=com,dc=pl", $filter) or exit("search error");
			$entries = ldap_get_entries($ldap_con, $result);

			print "<pre>";
			print_r ($entries);
			print "</pre>";


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

$f3->route('GET /api/adldap2',
	function() {
		$ad = new Adldap\Adldap();

		$config = [
			'hosts' => ['marol.com.pl', '127.0.0.1'],
			'base_dn' => 'dc=marol,dc=com,dc=pl',
			'username' => 'admin',
			'password' => 'secret',
		];
		$ad->addProvider($config);

		try {
			$provider = $ad->connect();

			//$results = $provider->search()->where('cn', '=', 'Dariusz Kowalczyk')->get();
			//echo $results;
		} catch (Adldap\Auth\BindException $e) {
			echo "erroR";
		}
	});
$f3->route('GET /api/te/@no',
	function($f3, $params) {
		echo "parameter: ";
		echo $params['no'];
	});

$f3->route('GET /api/te',
	function($f3, $params) {
		echo 'no parameters';
	});

$f3->run();
