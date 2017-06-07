<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 07.06.2017
 * Time: 11:41
 */

namespace Twitter\Views\Form;


use Twitter\Views\Renderer\Interfaces\RenderInterface;

class UserSearchForm implements RenderInterface
{
    public $form = <<<'SEARCHFORM'
        <form method="get" class="searchForm">
             <br>
             <label>
                Haslo:
                <input type="password" name ="password" class="password">  <br>
                Powtorz haslo:
                <input type="password" name ="password1">
                <input name="user" value="search" type="hidden" >
             </label>
             <br>
    <input type="submit" value="zapisz">
        </form>
SEARCHFORM;

    public function render()
    {
        // TODO: Implement render() method.
    }

}