<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 12:21
 */

namespace Twitter\Model\Classes;
use Twitter\Model\ClassesInterface;

class Tweet implements ClassesInterface
{
    private $id;
    private $userId;
    private $date;
    private $text;

    public function __construct($userId,$text)
    {
        $this->userId = $userId;
        $this->text =$text;
        $this->date = mktime();
    }

    public function getId()
    {
       return $this->id;
    }

    public function setId($id)
    {
        $this->id=$id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getText()
    {
        return $this->text;
    }
}