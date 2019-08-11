<?php

namespace Model;

class InetOrgPersonMapper
{
    private $_ldap_dn;
    private $_ldap_password;
    private $_ldap_con;

    private $_min_uid_number;

    public function __construct()
    {
        $this->_ldap_dn = 'cn=admin,dc=marol,dc=com,dc=pl';
        $this->_ldap_password = 'secret';
        $this->_ldap_con = ldap_connect('127.0.0.1');
        $this->_min_uid_number = 16384;
    }

    public function fetch($uid)
    {
        ldap_set_option($this->_ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        if (ldap_bind($this->_ldap_con, $this->_ldap_dn, $this->_ldap_password)) {
            $filter = '(uid=' . $uid . ')'; // '*' to fetch all users
            $result = ldap_search($this->_ldap_con, 'dc=marol,dc=com,dc=pl', $filter) or exit('search error');
            $entries = ldap_get_entries($this->_ldap_con, $result);
            //print_r($entries);
            if (1 == count($entries)) {
                return null;
            }

            return $entries;
        } else {
            echo 'unable to fetch';
            return null;
        };
    }

    public function generateUid($givenName, $sn)
    {
        $givenName = iconv('UTF-8', 'ASCII//TRANSLIT', $givenName);
        $givenName = preg_replace('/[^a-z0-9]/', '', strtolower($givenName));

        $sn = iconv('UTF-8', 'ASCII//TRANSLIT', $sn);
        $sn = preg_replace('/[^a-z0-9]/', '', strtolower($sn));
    
        $sn_chars = 7;
        $givenName_chars = 1;
        $index = 0;
    
        $uid = '';
    
        do {
            $suffix = '';
            if ($index > 0) {
                $suffix = (string) $index;
            }
    
            $uid = substr($sn, 0, $sn_chars - strlen($suffix))
                        . substr($givenName, 0, $givenName_chars)
                        . $suffix;
            ++$index;
        } while (true === $this->uidExists($uid));
    
        return $uid;
    }

    public function generateGenericUid($sn)
    {
        $sn = iconv('UTF-8', 'ASCII//TRANSLIT', $sn);
        $sn = preg_replace('/[^a-z0-9]/', '', strtolower($sn));
    
        $sn_chars = 6;
        $index = 0;
    
        $uid = '';

        do {
            $suffix = '';
            if ($index > 0) {
                $suffix = (string) $index;
            }

            $uid = 'g_'
                     . substr($sn, 0, $sn_chars - strlen($suffix))
                     . $suffix;
            ++$index;
        } while (true === $this->uidExists($uid));

        return $uid;
    }

    public function nextUidNumber()
    {
        //$uidNumbers = array();
        
        $users = $this->fetch('*');
        ldap_set_option($this->_ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        $currentMax = $this->_min_uid_number;
        foreach ($users as $user) {
            $current = $user['uidnumber'][0];
            if ($currentMax < $current) {
                $currentMax = $current;
            }
        }
        return ++$currentMax;
    }

    public function getHomeDirectory($uid)
    {
        //$person = $this->fetch($uid);
        //return $person[0]['homedirectory'][0];
        return '/home/' . $uid;
    }

    public function uidExists($uid)
    {
        if (null === $this->fetch($uid)) {
            return false;
        }

        return true;
    }
}
