<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 17:41
 */

namespace Twitter\Views\Form;


use Twitter\Views\Renderer\Interfaces\RenderInterface;

class LoginForm implements RenderInterface
{
    public $form = <<<'FORM'
    <h3>Formularz Logowania</h3>
        <form method="post">
             <br>
             <label>
                Email:
                <input type="text" name ="email">  
             </label>
             <br>
             <label>
                Haslo:
                <input type="password" name ="password">  
                <input name="user" value="login" type="hidden">
             </label>
             
    <input type="submit" value="zaloguj">
        </form>
FORM;


    public function render()
    {

        echo $this->form;
    }
}