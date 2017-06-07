<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 16:13
 */

namespace Twitter\Views;
use Twitter\Views\Renderer\FooterRenderer;
use Twitter\Views\Renderer\HeaderRenderer;
use Twitter\Controller\Base\BaseController;
use Twitter\Views\Renderer\Interfaces\RenderInterface;
use Twitter\Views\Renderer\WelcomeRenderer;


class BaseRenderer implements RenderInterface
{
  public function render()
  {

      HeaderRenderer::render();
      WelcomeRenderer::render();
//      $controller = new BaseController();
//      $controller->getInput();


      FooterRenderer::render();


  }
}