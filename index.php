<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require 'Services/EncryptionService.php';

        $encryptor = new EncryptionService();
        
        $appKey = 'yourSecretKey';
        $password = 'abc123456';
        
        echo 'Your original password: &nbsp;' ;
        echo $password;
        echo '<br />';
        
        $encrypted = $encryptor->Encrypt($appKey, $password);
        echo 'Your encrypted password: &nbsp;' ;
        echo $encrypted;
        echo '<br />';
        
        $decrypted = $encryptor->Decrypt($appKey, $encrypted);
        echo 'Your decrypted password: &nbsp;' ;
        echo $decrypted;
        echo '<br />';
        
        ?>
    </body>
</html>
