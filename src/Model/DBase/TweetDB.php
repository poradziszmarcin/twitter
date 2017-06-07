<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 17:24
 */

namespace Twitter\Model\DBase;

use Twitter\Model\DBase\DBConnect;
use Twitter\Model\Classes\Tweet;

class TweetDB
{
    public function add(Tweet $tweet)
    {

        $db = DBConnect::open();
        $sql = "INSERT INTO `tweet` (`id`, `text`, `userID`, `date`) VALUES (NULL, :text, :userID, :date)";
        $stm = $db->prepare($sql);

        $stm->bindValue(":text", $tweet->getText());
        $stm->bindValue(":userID",$tweet->getUserId());
        $stm->bindValue(":date", $tweet->getDate());
        $stm->execute();
        DBConnect::close();

    }

    public function loadByUserID($userID)
    {
        $db = DBConnect::open();
        $sql = "SELECT * FROM `tweet` WHERE userID=:userID ORDER BY date DESC ";
//        $sql = "SELECT * FROM `tweet` WHERE userID=:userID";

        $stm = $db->prepare($sql);
        $stm->bindValue(":userID",$userID);
        $stm->execute();
        $tweets = $stm->fetchAll();
        DBConnect::close();
        return $tweets;
    }


}