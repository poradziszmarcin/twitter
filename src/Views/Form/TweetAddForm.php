<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 12:16
 */

namespace Twitter\Views\Form;


use Twitter\Views\Renderer\Interfaces\RenderInterface;

class TweetAddForm implements RenderInterface
{

    private $form = <<<'FORM'
    
        <form method="post" >
             <p>Dodaj tweeta</p>
             <textarea type="text" name="text" cols="5 rows =4"></textarea><br>
             <input name="tweet" value="add" type="hidden">
             <input type="submit" value="tweetnij">
        
    
        </form>
FORM;


    public function render()
    {
        echo $this->form;
    }

}