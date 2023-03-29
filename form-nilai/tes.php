<?php
$pass = "bismillah";
$pass2 = "bismillah";
// var_dump(md5($pass));
// echo "<BR>";
// var_dump(md5($pass2));
var_dump(password_hash($pass, PASSWORD_DEFAULT));
echo "<BR>";
var_dump(password_hash($pass2, PASSWORD_DEFAULT));
echo "<BR>";
var_dump(password_verify($pass, password_hash($pass2, PASSWORD_DEFAULT)));

// Hash::make('')