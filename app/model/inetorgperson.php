<?php
/** Acc_Ldap_Object */
require_once 'Acc/Ldap/Object.php';


class InetOrgPerson
{
    /**
     * List of required attributes
     *
     * @var Array
     */
    protected $_attributeDefinitions = array(
        'dn' => array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),

        'cn' => array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'sn' => array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),

        /* inetOrgPerson */
        'audio' => array('MAY' => 'MAY'),
        'businessCategory' => array('MAY' => 'MAY'),
        'carLicense' => array('MAY' => 'MAY'),
        'departmentNumber' => array('MAY' => 'MAY'),
        'displayName' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'employeeNumber' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'employeeType' => array('MAY' => 'MAY'),
        'givenName' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'homePhone' => array('MAY' => 'MAY'),
        'homePostalAddress' => array('MAY' => 'MAY'),
        'initials' => array('MAY' => 'MAY'),
        'jpegPhoto' => array('MAY' => 'MAY'),
        'labeledURI' => array('MAY' => 'MAY'),
        'mail' => array('MAY' => 'MAY'),
        'manager' => array('MAY' => 'MAY'),
        'mobile' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'o' => array('MAY' => 'MAY'),
        'pager' => array('MAY' => 'MAY'),
        'photo' => array('MAY' => 'MAY'),
        'roomNumber' => array('MAY' => 'MAY'),
        'secretary' => array('MAY' => 'MAY'),
        'uid' => array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'userCertificate' => array('MAY' => 'MAY'),
        'x500uniqueIdentifier' => array('MAY' => 'MAY'),
        'preferredLanguage' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'), /* XXX Multivalue */
        'userSMIMECertificate' => array('MAY' => 'MAY'),
        'userPKCS12' => array('MAY' => 'MAY'),

        /* organizationalPerson */
        'description' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'), /* XXX Multivalue */
        'destinationIndicator' => array('MAY' => 'MAY'),
        'facsimileTelephoneNumber' => array('MAY' => 'MAY'),
        'internationaliSDNNumber' => array('MAY' => 'MAY'),
        'l' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'ou' => array('MAY' => 'MAY'),
        'physicalDeliveryOfficeName' => array('MAY' => 'MAY'),
        'postalAddress' => array('MAY' => 'MAY'),
        'postalCode' => array('MAY' => 'MAY'),
        'postOfficeBox' => array('MAY' => 'MAY'),
        'preferredDeliveryMethod' => array('MAY' => 'MAY'),
        'registeredAddress' => array('MAY' => 'MAY'),
        'seeAlso' => array('MAY' => 'MAY'),
        'st' => array('MAY' => 'MAY'),
        'street' => array('MAY' => 'MAY'),
        'telephoneNumber' => array('MAY' => 'MAY'),
        'teletexTerminalIdentifier' => array('MAY' => 'MAY'),
        'telexNumber' => array('MAY' => 'MAY'),
        'title' => array('MAY' => 'MAY'),
        'userPassword' => array('MAY' => 'MAY'),
        'x121Address' => array('MAY' => 'MAY'),

        /* + posixAccount */
        'uidNumber' => array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'gidNumber' => array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'homeDirectory' => array('MUST' => 'MUST', 'SINGLE-VALUE' => 'SINGLE-VALUE'),


        'userPassword' => array('MAY' => 'MAY'),
        'loginShell' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'gecos' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),

        /* + shadowAccount */
        'shadowLastChange' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowMin' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowMax' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowWarning' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowInactive' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowExpire' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
        'shadowFlag' => array('MAY' => 'MAY', 'SINGLE-VALUE' => 'SINGLE-VALUE'),
    );


    /**
     * List of valid object class
     *
     * @var Array
     */
    protected $_objectClass = array('inetOrgPerson', 'organizationalPerson', 'person', 'posixAccount', 'shadowAccount', 'top');
}
