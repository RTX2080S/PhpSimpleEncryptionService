<?php

/**
 * EncryptionService and its interface
 *
 * @author LL
 */
interface IEncryptionService {

    public function Encrypt($password, $data);

    public function Decrypt($password, $data);

    public function hashPassword($password, $salt);
}

class EncryptionService implements IEncryptionService {

    function Encrypt($password, $data) {

        $salt = substr(md5(mt_rand(), true), 8);

        $key = md5($password . $salt, true);
        $iv = md5($key . $password . $salt, true);

        $ct = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);

        return base64_encode('Salted__' . $salt . $ct);
    }

    function Decrypt($password, $data) {

        $data = base64_decode($data);
        $salt = substr($data, 8, 8);
        $ct = substr($data, 16);

        $key = md5($password . $salt, true);
        $iv = md5($key . $password . $salt, true);

        $pt = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ct, MCRYPT_MODE_CBC, $iv);

        return $pt;
    }

    function hashPassword($password, $salt) {
        $hash_password = hash("SHA512", base64_encode(str_rot13(hash("SHA512", str_rot13($salt . $password)))));
        return $hash_password;
    }

}
