<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 07.06.2017
 * Time: 10:38
 */

namespace Twitter\Views\Renderer\User;


use Twitter\Model\DBase\DBConnect;
use Twitter\Model\DBase\UserDB;
use Twitter\Views\Renderer\Interfaces\RenderInterface;

class UserInfoRenderer implements RenderInterface
{
    public function render()
    {
       $userInfo = $this->getInfo();

       $name = $userInfo["name"];
       $email = $userInfo["email"];

       echo <<<"USERINFO"
       
       <p>Informacje o użytkowniku</p>
       <p>Nazwa: $name</p>
        <p>Email: $email</p>
<br>
USERINFO;




    }

    public function getInfo()
    {
        $userId = $_COOKIE["userId"];
        $userDB  = new UserDB();
        $userInfo = $userDB->getInfoByID($userId);
        return $userInfo;
    }

}