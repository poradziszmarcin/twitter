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
        <form action="index.php" method="get">
    <input name="user" value="search" type="hidden" >
    <input type="text" name="searchInput">
    <br>
    <label>Nazwa
            <input type="radio" name="searchBy" value="name">
    </label>
    <label>
        Email
        <input type="radio" name="searchBy" value="email">

    </label>
    <br>
    <input type="submit" value="szukaj">
</form>
SEARCHFORM;



    public function render()
    {
        echo $this->form;
    }




}