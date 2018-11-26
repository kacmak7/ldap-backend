<?php

namespace Model;

class InetOrgPersonMapper {

//	const MIN_UID_NUMBER = 16384;

	private $_ldap_dn;
	private $_ldap_password;
	private $_ldap_con;

	public function __construct() {
		$this->_ldap_dn = 'cn=admin,dc=marol,dc=com,dc=pl';
		$this->_ldap_password = 'secret';
		$this->_ldap_con = ldap_connect('127.0.0.1');
	}

	public function fetch($uid) {
		ldap_set_option($this->_ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		if (ldap_bind($this->_ldap_con, $this->_ldap_dn, $this->_ldap_password)) {
			$filter = '(uid=' . $uid . ')'; // '*' to fetch all users
			$result = ldap_search($this->_ldap_con, 'dc=marol,dc=com,dc=pl', $filter) or exit('search error');
			$entries = ldap_get_entries($this->_ldap_con, $result);
			return $entries;
		}
		else {
			return array('error');
		};
	}

	public function nextUidNumber() {
		
	}




	public function testGet() {
		$person = $this->fetch('testt1');
		echo $person[0]['homedirectory'][0];
	}

}
