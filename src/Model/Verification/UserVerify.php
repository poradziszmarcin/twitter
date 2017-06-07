<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 12:56
 */

namespace Twitter\Model\Verification;

use Twitter\Controller\User\UserController;
use Twitter\Model\Classes\User;
use Twitter\Model\DBase\UserCodeFromDB;


class UserVerify
{
    private $sessionId;
    private static $sessionCode;
    private static $cookieId;
    private static $cookieCode;
    private static $DbCode;

    static function verifyCookie()
    {

        if (!isset($_SESSION["verified"])) {

            switch (self::verifyOperations()) {

                case "verified":
                    header('Location: ' . "index.php?user=main");
                    break;

                case "noVerified":
                    self::logout();
                    break;

                default:
                    break;

            }

        }
    }

    static function verifyOperations()
    {
        if (isset($_COOKIE["userId"])) {

            self::$cookieId = $_COOKIE["userId"];
            self::$DbCode = UserCodeFromDB::getCode(self::$cookieId);

            self::$cookieCode = $_COOKIE["userCode"];

            if (self::$cookieCode == self::$DbCode["userCode"]) {
                $_SESSION["userCode"] = self::$DbCode;
                $_SESSION["userId"] = self::$cookieId;
                $_SESSION["verified"] = "ok";
                return "verified";

            } else {

                return "nonVerified";

            }
        }
        return "noLogged";
    }

    static function logout()
    {

        unset($_SESSION["userId"]);
        unset($_SESSION["userCode"]);
        unset($_SESSION["verified"]);
        setcookie("userId", "", time() - 3600);
        setcookie("userName", "", time() - 3600);
        setcookie("userCode", "", time() - 3600);

        echo "zostales wylogowany";
    }

    static function login(User $user)
    {

        $_SESSION["userId"] = $user->getId();
        $_SESSION["userCode"] = $user->getUserCode();
        $_SESSION["verified"] = "ok";

        setcookie("userId", $user->getId(), time() + 3600);
        setcookie("userName", $user->getName(), time() + 3600);
        setcookie("userCode", $user->getUserCode(), time() + 3600);

    }
}