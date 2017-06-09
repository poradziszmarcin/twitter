<?php
/**
 * Created by PhpStorm.
 * User: Poradzisz Marcin
 * Project twitter
 * Date: 09.06.2017
 * Time: 13:05
 */

namespace Twitter\Model\Classes;


class Comment
{

 private $id;
 private $tweetID;
 private $userID;
 private $text;
 private $date;

 public function __construct($tweetID,$userID ,$text)
 {

         $this->id= null;
         $this->date= mktime();
         $this->tweetID = $tweetID;
         $this->text = $text;
         $this->userID=$userID;



 }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTweetID()
    {
        return $this->tweetID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return null
     */
    public function getDate()
    {
        return $this->date;
    }

}