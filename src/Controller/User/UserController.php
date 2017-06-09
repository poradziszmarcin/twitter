<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 09:31
 */

namespace Twitter\Controller\User;

use Twitter\Controller\ClassesInterface;
use Twitter\Views\Form\UserAddForm;
use Twitter\Model\Classes\User;
use Twitter\Model\DBase\UserDB;
use Twitter\Model\Verification\UserVerify;
use Twitter\Views\Form\LoginForm;
use Twitter\Model\DBase\TweetDB;
use Twitter\Views\Form\UserEditForm;
use Twitter\Views\Form\UserSearchForm;
use Twitter\Views\Renderer\Tweet\TweetRenderer;
use Twitter\Views\Renderer\User\UserInfoRenderer;
use Twitter\Views\Renderer\User\UserMenuRenderer;
use Twitter\Views\Form\TweetAddForm;

class UserController implements ClassesInterface

{
    public function getMethod()
    {
        if (isset($_GET["user"]) == true) {
            $getValue = trim($_GET["user"]);

            switch ($getValue) {

                case("create"):
                    $form = new UserAddForm();
                    $form->render();
                    break;

                case "logout":
                    UserVerify::logout();
                    header('Location: ' . "index.php");
                    break;

                case "login":
                    $form = new LoginForm();
                    $form->render();
                    break;

                case "editpassword":

                    $userMenuRenderer = new UserMenuRenderer();
                    $userMenuRenderer->render();
                    $userEditFormRenderer = new UserEditForm();
                    $userEditFormRenderer->render();
                    break;

                case "view":
                    if (isset($_GET["id"]) == true) {

                        $id = (int)trim($_GET["id"]);


                        if ($id != 0) {
                            $tweetDB = new TweetDB();
                            $tweets = $tweetDB->loadByUserID($id);

                            $tweetRenderer = new TweetRenderer();
                            $tweetRenderer->render($tweets);


                        }
                    }
                    break;
                case "main":
                    $userId = $_COOKIE["userId"];
                    $tweetDB = new TweetDB();
                    $tweets = $tweetDB->loadByUserID($userId);
                    $tweetForm = new TweetAddForm();
                    $tweetForm->render();
                    $tweetRenderer = new TweetRenderer();
                    $tweetRenderer->render($tweets);

                    break;

                case "info":
                    UserVerify::verifyOperations();
                    $userMenuRenderer = new UserMenuRenderer();
                    $userMenuRenderer->render();
                    $userInfoRenderer = new UserInfoRenderer();
                    $userInfoRenderer->render();

                    break;

                case "search":
                    $searchForm = new UserSearchForm();
                    $searchForm->render();
                    $userSearch = new UserSearchController();
                    $userSearch->getMethod();
                    break;
                default:
                    echo "invalid method";
                    break;
            }

        }
    }

    public
    function postMethod()
    {
        if (isset($_POST["user"]) == true) {
            $userPost = trim($_POST["user"]);


            switch ($userPost) {

                case "editpassword":
                    UserVerify::verifyOperations();
                    if ($_POST["password"] == $_POST["password1"]) {
                        $id = trim( $_COOKIE["userId"]);
                        $password = sha1(trim($_POST["password"]));
                          $userDB = new UserDB();
                          $userDB->editPassword($id,$password);
                          echo "haslo zostalo zmienione";



                        }
                     else {
                        echo "hasla nie sa identyczne";
                    }
                    break;

                case "delete":
                    echo "delete user";
                    break;

                case "add":
                    if ($_POST["password"] == $_POST["password1"]) {
                        $name = trim($_POST["name"]);
                        $email = trim($_POST["email"]);
                        $password = trim($_POST["password"]);
                        $user = new User($name, $email, $password);
                        $user->setUserCode(sha1(mktime()));
                        $userDB = new UserDB();
                        $id = $userDB->add($user);
                        $user->setId($id);
                        if (is_null($id) == false) {
                            userVerify::login($user);
                            header('Location: ' . "index.php?user=main");
                        }
                    } else {
                        echo "hasla nie sa identyczne";
                    }
                    break;
                case "login":
                    $userDB = new UserDB();
                    $password = ($_POST["password"]);

                    $email = trim($_POST["email"]);
                    $userFromDB = $userDB->login($email);


                    if ($userFromDB != null && $userFromDB["email"] == $email && $userFromDB["password"] == sha1($password)) {
                        $user = new User($userFromDB["name"], $userFromDB["email"], $password);
                        $user->setId($userFromDB["id"]);
                        $user->setUserCode($userFromDB["userCode"]);
                        UserVerify::login($user);
                        header('Location: ' . "index.php?user=main");
                    } else {
                        echo "niepoprawny login lub haslo";
                    }

                    break;
                default:

                    echo "wrong user input";
            }
        }
    }
}
