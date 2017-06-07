<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 04.06.2017
 * Time: 21:01
 */

namespace Twitter\Model\Classes;


class User
{
  private $id;
  private $name;
  private $email;
  private $password;
  private $userCode;


  public function __construct( $name,$email,$password)
  {
      $this->id = -1;
      $this->name = $name;
      $this->email = $email;
      $this->password = sha1($password);


  }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserCode()
    {
        return $this->userCode;
    }

    /**
     * @param mixed $userCode
     */
    public function setUserCode($userCode)
    {
        $this->userCode = $userCode;
    }

}