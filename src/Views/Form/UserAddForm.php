<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 12:37
 */

namespace Twitter\Views\Form;



use Twitter\Views\Renderer\Interfaces\RenderInterface;

class UserAddForm implements RenderInterface
{

    public $form = <<<'FORM'
        <form method="post" class="createForm">
            <label>
                Nazwa użytkownika:
                <input type="text" name ="name">  
             </label>
             <br>
             <label>
                Email:
                <input type="text" name ="email">  
             </label>
             <br>
             <label>
                Haslo:
                <input type="password" name ="password" class="password">  <br>
                Powtorz haslo:
                <input type="password" name ="password1">
                <input name="user" value="add" type="hidden">
             </label>
             
    <input type="submit">
        </form>
FORM;


    public function render()
    {

    echo $this->form;
    }
}