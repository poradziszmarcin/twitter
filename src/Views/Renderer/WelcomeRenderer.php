<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 06.06.2017
 * Time: 11:57
 */

namespace Twitter\Views\Renderer;



use Twitter\Controller\Base\BaseWelcomeController;
use Twitter\Views\Renderer\MenuRenderer;
use Twitter\Views\Renderer\ContentRenderer;
use Twitter\Controller\Base\BaseController;

class WelcomeRenderer
{

    static function render()
    {
        if (isset($_COOKIE["userId"])==true && isset($_COOKIE["userName"])==true)
        {
            self::renderLogged();
        }

        else
        {
            self::renderNonLogged();
        }

    }

    static function renderLogged()
    {

        $name = $_COOKIE["userName"];
        echo "<div class='welcomeUser'>";
            echo "<p>Witaj $name</p>";
        echo "</div>";
        $menuRenderer = new MenuRenderer();
        $menuRenderer->render();
        $contentRenderer = new ContentRenderer();
        $contentRenderer->render();
        $controller = new BaseController();
        $controller->getInput();
    }

    static function renderNonLogged()
    {

            echo "<div class='signIn'>";
            echo "<p><a href='index.php?user=login'>Zaloguj sie</a> lub ";
            echo "<a href='index.php?user=create'>Utworz konto</a> </p>";
            echo "</div>";
        $controller = new BaseWelcomeController();
        $controller->getInput();
    }
}