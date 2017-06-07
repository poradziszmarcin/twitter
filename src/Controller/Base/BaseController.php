<?php

namespace Twitter\Controller\Base;

use Twitter\Controller\Base\BaseControllerInterface;
use Twitter\Controller\Base\GetController\GetContoller;
use Twitter\Controller\Base\PostController\PostController;
use Twitter\Controller\Base\PostController\GetController;
class BaseController implements BaseControllerInterface
{
    public function getInput()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" or $_SERVER["REQUEST_METHOD"] === "GET") {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $postController = new PostController();
                $postController->getInput();
            }

            elseif ($_SERVER["REQUEST_METHOD"] == "GET")
            {
                $getController = new GetContoller();
                $getController->getInput();
            }

            else
            {
              return "Undefinied request method";
            }
        }
    }
}