<?php

require_once __DIR__."/LDAPConnector.php";

$htmlBuffer = [];

// initialize ldap connection
$ldapServerUrl = "ldap://ldapServer";
$ldapConnector = new LDAPConnector($ldapServerUrl);

// set some genral auth tokens
$ldapConnector->addAuthDnToken('dc', 'softbricks');
$ldapConnector->addAuthDnToken('dc', 'de');

// we try several connections
$loginCredentials = [
  [ "user" => "smenigat", "password" => "wrong-pw" ],
  [ "user" => "smenigat", "password" => "sbtest" ],
  [ "user" => "lsporrer", "password" => "wrong-pw" ],
  [ "user" => "lsporrer", "password" => "sbtest" ],
];

foreach($loginCredentials as $credentials) {
  $user = $credentials['user'];
  $password = $credentials['password'];
  $authStatus = $ldapConnector->checkAuth($user, $password);

  if ($authStatus) {
    $htmlBuffer[] = "✅ Successfully logged in for <strong>${user}</strong> with password <strong>${password}</strong>\n";
  } else {
    $htmlBuffer[] = "❌ Could not log in for <strong>${user}</strong> with password <strong>${password}</strong>\n";
  }
}
?>
<html>
  <body>
    <pre style="line-height: 24px;"><?php foreach($htmlBuffer as $htmlSnppet) echo $htmlSnppet; ?></pre>
  </body>
</html>