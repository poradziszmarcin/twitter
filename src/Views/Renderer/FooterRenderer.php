<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 06.06.2017
 * Time: 13:00
 */

namespace Twitter\Views\Renderer;




class FooterRenderer
{

    private static $footer = <<<'FOOTER'
<div class="footer">
       <p>Marcin Poradzisz 2017</p>
</div>
     

FOOTER;
    static function render()
    {
       echo self::$footer;
    }
}