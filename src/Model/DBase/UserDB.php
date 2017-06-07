<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 13:41
 */

namespace Twitter\Model\DBase;
use Twitter\Model\Classes\User;
use Twitter\Model\DBase\DBConnect;

class UserDB
{
  public function add(User $user)
  {
      if ($this->isExist($user)==false) {
          $db = DBConnect::open();
          $sql = "INSERT INTO `user` (`id`, `name`, `email`, `password`,`userCode`) VALUES (NULL, :name, :email, :password,:userCode)";
          $stm = $db->prepare($sql);
          $stm->bindValue(":name", $user->getName());
          $stm->bindValue(":email", $user->getEmail());
          $stm->bindValue(":password", $user->getPassword());
          $stm->bindValue(":userCode", $user->getUserCode());
          $stm->execute();

          DBConnect::close();
          echo "konto zostalo utworzone";
          return $db->lastInsertId();
      }
      else {
          echo "konto juz istnieje";
      }

  }

  public function editPassword ($id,$password)
  {
      $db = DBConnect::open();
      $sql = 'UPDATE users SET  
            password= :password
              WHERE id=:id';

      $stm =$db->prepare($sql);

      $stm->bindValue(":id","$id");
      $stm->bindValue(":password","$password");
      $stm->execute();
      $result = $stm->fetch();
  }

  public function delete ()
  {

  }

    public function isExist ($user)
    {
        $db = DBConnect::open();
        $sql = "SELECT * FROM `user` WHERE `email`=:email";
        $stm =$db->prepare($sql);

        $stm->bindValue(":email",$user->getEmail());
        $stm->execute();
        $result = $stm->fetch();
        DBConnect::Close();
        return $result;

    }

    public function login ($email)
    {
        $db = DBConnect::open();
        $sql = 'SELECT * FROM user WHERE email=:email';

        $stm =$db->prepare($sql);

        $stm->bindValue(":email","$email");
        $stm->execute();

        $result = $stm->fetch();
        DBConnect::Close();
        return $result;
    }

    public function getNameByID($id)
    {
        $db = DBConnect::open();
        $sql = 'SELECT name FROM user WHERE id=:id';

        $stm =$db->prepare($sql);

        $stm->bindValue(":id","$id");
        $stm->execute();
        $result = $stm->fetch();
        DBConnect::Close();
        return $result;
    }

    public function getInfoByID($id)
    {
        $db = DBConnect::open();
        $sql = 'SELECT name ,email FROM user WHERE id=:id';

        $stm =$db->prepare($sql);

        $stm->bindValue(":id","$id");
        $stm->execute();
        $result = $stm->fetch();
        DBConnect::Close();
        return $result;
    }

}