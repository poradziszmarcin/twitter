<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 16:23
 */

namespace Twitter\Views\Renderer;




class HeaderRenderer
{
    public static $header = <<<'HEADER'
<div class="header">
       <p>Twitter</p>
</div>
     

HEADER;
static function render()
{
    echo self::$header;
}
}