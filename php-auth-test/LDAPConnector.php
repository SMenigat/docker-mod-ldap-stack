<?php

class LDAPConnector
{
    private $serverPort;
    private $serverUrl;
    private $connection = null;

    private $authRdn = 'uid';
    private $authDnToken = [];

    public function __construct($serverUrl, $serverPort = 389)
    {
        $this->serverUrl = $serverUrl;
        $this->serverPort = $serverPort;

        // build connection
        $this->connection = ldap_connect($serverUrl, $serverPort);
        ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, 3);
    }

    public function __destruct()
    {
        if ($this->connection) {
            @ldap_close($this->connection);
        }
    }

    public function addAuthDnToken($key, $value)
    {
        $this->authDnToken[] = "${key}=${value}";
    }

    public function checkAuth($user, $password)
    {
        $authRdn = $this->authRdn;
        $allDnTokens = array_merge(["${authRdn}=${user}"], $this->authDnToken);
        $dnString = implode(',', $allDnTokens);
        $bind = @ldap_bind($this->connection, $dnString, $password);
        return !!$bind;
    }
}
