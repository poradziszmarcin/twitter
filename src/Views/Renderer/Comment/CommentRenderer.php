<?php
/**
 * Created by PhpStorm.
 * User: Poradzisz Marcin
 * Project twitter
 * Date: 09.06.2017
 * Time: 13:51
 */

namespace Twitter\Views\Renderer\Comment;


use Twitter\Views\Renderer\Interfaces\RenderInterfaceWithObject;
use Twitter\Model\DBase\UserDB;
use Twitter\Model\DBase\CommentDB;

class CommentRenderer implements RenderInterfaceWithObject
{
    public function render($tweetId)

    {

        $commentDB = new CommentDB();
        $comments = $commentDB->load($tweetId);
        echo "<br>";

        if ($comments == null) {
            echo "Jeszcze nikt nie skomentowal Twojego tweeta";
        } else {

            $userDB = new UserDB();

            foreach ($comments as $commentFromDB) {
                $userID = $commentFromDB["userID"];

                $userName = $userDB->getNameByID($userID)["name"];
                $text = $commentFromDB["text"];
                $date = $commentFromDB["date"];

                echo "<div class='comment'>";
                echo "<p> $userName </p>";
                echo "<p>  $text</p>";
                echo "<p>". $this->timeAgo($date),"</p>";
                echo "</div>";
                echo "<br>";



            }
        }
    }


    public function timeAgo($time)
    {
        $now = mktime();
        $difference = $now - $time;
        switch ($difference) {

            case ($difference < 60):
                echo "$difference second ago";
                break;

            case ($difference >= 60 && $difference < 3600):
                echo round($difference / 60, 0), " minutes ago";
                break;

            case ($difference >= 3600 && $difference < 86400):
                echo round($difference / 3600, 0), " hours ago";
                break;
            

            case ($difference >= 8640):
                echo date("G:i d-n-o", $time);
                break;
        }
    }


}