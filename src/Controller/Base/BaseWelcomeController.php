<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 06.06.2017
 * Time: 16:52
 */

namespace Twitter\Controller\Base;

use Twitter\Views\Form\UserAddForm;
use Twitter\Views\Form\LoginForm;
use Twitter\Controller\Base\PostController\PostController;

class BaseWelcomeController
{
    public function getInput()
    {
        if (isset($_GET["user"]) == true) {
            $getValue = trim($_GET["user"]);

            switch ($getValue) {

                case("create"):
                    $form = new UserAddForm();
                    $form->render();
                    break;

                case "login":
                    $form = new LoginForm();
                    $form->render();

                    break;
            }

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $postController = new PostController();
            $postController->getInput();
        }
    }
}