<?php
/** Acc_Ldap_Object */
require_once 'Acc/Ldap/Object.php';


class InetOrgPerson {
    /**
     * List of required attributes
     *
     * @var Array
     */
    protected $_attributeDefinitions = Array(
        'dn' => Array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),

        'cn' => Array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'sn' => Array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),

        /* inetOrgPerson */
        'audio' => Array('MAY' => 'MAY'),
        'businessCategory' => Array('MAY' => 'MAY'),
        'carLicense' => Array('MAY' => 'MAY'),
        'departmentNumber' => Array('MAY' => 'MAY'),
        'displayName' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'employeeNumber' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'employeeType' => Array('MAY' => 'MAY'),
        'givenName' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'homePhone' => Array('MAY' => 'MAY'),
        'homePostalAddress' => Array('MAY' => 'MAY'),
        'initials' => Array('MAY' => 'MAY'),
        'jpegPhoto' => Array('MAY' => 'MAY'),
        'labeledURI' => Array('MAY' => 'MAY'),
        'mail' => Array('MAY' => 'MAY'),
        'manager' => Array('MAY' => 'MAY'),
        'mobile' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'o' => Array('MAY' => 'MAY'),
        'pager' => Array('MAY' => 'MAY'),
        'photo' => Array('MAY' => 'MAY'),
        'roomNumber' => Array('MAY' => 'MAY'),
        'secretary' => Array('MAY' => 'MAY'),
        'uid' => Array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'userCertificate' => Array('MAY' => 'MAY'),
        'x500uniqueIdentifier' => Array('MAY' => 'MAY'),
        'preferredLanguage' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'), /* XXX Multivalue */
        'userSMIMECertificate' => Array('MAY' => 'MAY'),
        'userPKCS12' => Array('MAY' => 'MAY'),

        /* organizationalPerson */
        'description' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'), /* XXX Multivalue */
        'destinationIndicator' => Array('MAY' => 'MAY'),
        'facsimileTelephoneNumber' => Array('MAY' => 'MAY'),
        'internationaliSDNNumber' => Array('MAY' => 'MAY'),
        'l' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'ou' => Array('MAY' => 'MAY'),
        'physicalDeliveryOfficeName' => Array('MAY' => 'MAY'),
        'postalAddress' => Array('MAY' => 'MAY'),
        'postalCode' => Array('MAY' => 'MAY'),
        'postOfficeBox' => Array('MAY' => 'MAY'),
        'preferredDeliveryMethod' => Array('MAY' => 'MAY'),
        'registeredAddress' => Array('MAY' => 'MAY'),
        'seeAlso' => Array('MAY' => 'MAY'),
        'st' => Array('MAY' => 'MAY'),
        'street' => Array('MAY' => 'MAY'),
        'telephoneNumber' => Array('MAY' => 'MAY'),
        'teletexTerminalIdentifier' => Array('MAY' => 'MAY'),
        'telexNumber' => Array('MAY' => 'MAY'),
        'title' => Array('MAY' => 'MAY'),
        'userPassword' => Array('MAY' => 'MAY'),
        'x121Address' => Array('MAY' => 'MAY'),

        /* + posixAccount */
        'uidNumber' => Array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'gidNumber' => Array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'homeDirectory' => Array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),


        'userPassword' => Array('MAY' => 'MAY'),
        'loginShell' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'gecos' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),

        /* + shadowAccount */
        'shadowLastChange' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowMin' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowMax' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowWarning' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowInactive' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowExpire' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowFlag' => Array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
    );


    /**
     * List of valid object class
     *
     * @var Array
     */
    protected $_objectClass = Array('inetOrgPerson', 'organizationalPerson', 'person', 'posixAccount', 'shadowAccount', 'top');
}
