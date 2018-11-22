<?php

/*
 * $Id$
 */

namespace Controller;

/**
 * @author Bartosz Kuzmab <bartosz.kuzma@release11.com>
 */
class Api {

	

	public function GET_dictionary_systems(\Base $f3) {
		$domain = array(	
			'marol.com.pl',
			'chatapolska.pl',
		);

		echo $this->_view->render('json_data.phtml', 'application/json', array('data' => $domains));
	}

	public function GET_test_message(\Base $f3) {
		$testMessage = 'papaya';

		$view=\View::instance();
		echo $view->render('json_data.phtml', 'application/json', array('data' => $testMessage));
	}

	public function GET_test_numbers(\Base $f3) {
		$data = array(1, 5, 2, 97, 26);

		$view=\View::instance();
		echo $view->render('json_data.phtml', 'application_json', array('data' => $data));
	}	

	public function GET_users(\Base $d3) {
		$ldap_dn = 'cn=admin,dc=marol,dc=com,dc=pl';
		$ldap_password = 'secret';
		$ldap_con = ldap_connect('127.0.0.1');
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		if (ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
			echo "Bind successful";
			$filter = "(uid=*)";
			$result = ldap_search($ldap_con, "dc=marol,dc=com,dc=pl", $filter) or exit("search error");
			$entries = ldap_get_entries($ldap_con, $result);
			print "<pre>";
			print_r ($entries);$f3->route('GET /api/te/@no',
	function($f3, $params) {
		echo "parameter: ";
		echo $params['no'];
	});
			print "</pre>";
		}
		else {
			echo "ErRoR";
		}
	}
}
