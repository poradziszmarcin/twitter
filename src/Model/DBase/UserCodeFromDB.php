<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 12:51
 */

namespace Twitter\Model\DBase;
use Twitter\Model\DBase\DBConnect;

class UserCodeFromDB
{
  static function getCode($id)
  {
      $db = DBConnect::open();

      $sql = "SELECT `userCode` FROM `user` WHERE `id`=:id";
      $stm =$db->prepare($sql);

      $stm->bindValue(":id","$id");
      $stm->execute();
      $result = $stm->fetch();
      DBConnect::Close();
      return $result;

  }
}