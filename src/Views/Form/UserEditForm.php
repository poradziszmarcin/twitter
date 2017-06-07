<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 07.06.2017
 * Time: 11:12
 */

namespace Twitter\Views\Form;


use Twitter\Views\Renderer\Interfaces\RenderInterface;

class UserEditForm implements RenderInterface
{

    public $form = <<<'FORM'
        <form method="post" class="editForm">
             <br>
             <label>
                Haslo:
                <input type="password" name ="password" class="password">  <br>
                Powtorz haslo:
                <input type="password" name ="password1">
                <input name="user" value="editpassword" type="hidden" >
             </label>
             <br>
    <input type="submit" value="zapisz">
        </form>
FORM;

    public function render()
    {
       echo $this->form;
    }
}