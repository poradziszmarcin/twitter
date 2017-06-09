<?php
/**
 * Created by PhpStorm.
 * User: Poradzisz Marcin
 * Project twitter
 * Date: 09.06.2017
 * Time: 13:04
 */

namespace Twitter\Model\DBase;
use Twitter\Model\DBase\DBConnect;
use Twitter\Model\Classes\Comment;

class CommentDB
{

    public function add (Comment $comment)
    {
        $db = DBConnect::open();
        $sql = "INSERT INTO `comment` (`id`, `tweetID`, `userID`, `text`, `date`) VALUES (NULL, :tweetID, :userID, :text, :date)";
        $stm = $db->prepare($sql);

        $stm->bindValue(":tweetID", $comment->getTweetID());
        $stm->bindValue(":text", $comment->getText());
        $stm->bindValue(":userID",$comment->getUserID());
        $stm->bindValue(":date", $comment->getDate());
        $stm->execute();
        DBConnect::close();
    }

    public function load ($tweetId)
    {
        $db = DBConnect::open();
        $sql = "SELECT * FROM `comment` WHERE tweetID=:tweetID ORDER BY date ASC ";
//

        $stm = $db->prepare($sql);
        $stm->bindValue(":tweetID",$tweetId);
        $stm->execute();
        $comments = $stm->fetchAll();
        DBConnect::close();
        return $comments;
    }

}