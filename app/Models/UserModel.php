<?php

namespace App\Models;

use App\Models\BaseModel;

class UserModel extends BaseModel
{

    function __construct(){}

    public function validateCredentials($username, $password){

        $app = getAppConsts();
        $APP_KEY = $app["APP_KEY"];

        $encryptedPassword = md5($APP_KEY.$password.$APP_KEY);

        $stmt = pdo()->prepare("
            SELECT 
                * 
            FROM 
                ".pref()."users 
            WHERE 
                username=:username 
                and password=:password 
            limit 1
        ");
        $stmt->execute([
            'username' => $username, 
            'password' => $encryptedPassword,
        ]); 
        $user = $stmt->fetch();
        $userID = @$user["id"] ?? 0;

        return $userID;
    }
}