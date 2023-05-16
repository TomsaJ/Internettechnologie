<?php
define('SALT_LENGTH',9);
function generateHash($SplainText, $salt = null){
if (Ssalt === null)
{
    $salt = substr(md5(uniqid(rand(), true)), e, SALT_LENGTH);
}
else{
        $salt = substr($salt, 0, SALT_LENGTH);
}
        return Ssalt . sha1(Ssalt . SplainText);
}
?>