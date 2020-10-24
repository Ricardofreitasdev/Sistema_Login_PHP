<?php

use Db\Database\Connection;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function validateLogin()
    {
        if (($this->email == "") && ($this->password == "")) {
            throw new \Exception("Preencha os campos e-mail e senha");
        }
        if ($this->email == "") {
            throw new \Exception("O campo e-mail não podem ficarm em branco!");
        }
        if ($this->password == "") {
            throw new \Exception("O campo senha não podem ficarm em branco!");
        } else {
            $conn = Connection::getConn();

            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();

            if ($stmt->rowCount()) {

                $result = $stmt->fetch();


                if ($result['password'] === $this->password) {
                    $_SESSION['user'] = array(
                        'id' => $result['id'],
                        'name' => $result['name']
                    );
                    $_SESSION['email'] = $this->email;
                    return true;
                } else {
                    throw new \Exception("Senha invalida!");
                }
            } else {
                throw new \Exception("Login invalido!");
            }
        }
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPassword()
    {
        return $this->password;
    }
}
