<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 12:18
 */

namespace Twitter\Model;


interface ClassesInterface
{
  public function getId();
  public function getUserId();
  public function setUserId($userId);
  public function getText();

}