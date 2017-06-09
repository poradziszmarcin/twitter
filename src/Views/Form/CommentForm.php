<?php
/**
 * Created by PhpStorm.
 * User: Poradzisz Marcin
 * Project twitter
 * Date: 09.06.2017
 * Time: 12:51
 */

namespace Twitter\Views\Form;


use Twitter\Views\Renderer\Interfaces\RenderInterfaceWithObject;

class CommentForm implements RenderInterfaceWithObject
{


    public function render($tweetId)
    {
       $userId= $_COOKIE["userId"];
      echo "<form method=post >";
      echo "<textarea  name=text cols=1 rows =30></textarea><br>";
      echo "<input name=comment value=add type=hidden>";
      echo "  <input name=tweetId value=$tweetId type=hidden>";
      echo " <input name=userId value=$userId type=hidden>";
      echo "<input type=submit value=skomentuj>";
      echo "</form>";





    }

}