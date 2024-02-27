<?php
class User
{
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function login($email, $password)
    {
        $user = $this->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: /');
        } else {
            return 'Неправильный email или пароль';
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /');
        exit;
    }


    public function register($email, $password, $password2)
    {
        if ($password == $password2) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("INSERT INTO users (`email`, `password`) VALUES (?, ?)", [$email, $hashedPassword]);
            return 'Вы зарегистрировались';
        } else {
            return 'Пароли не совпадают';
        }
    }

    private function getUserByEmail($email)
    {
        return $this->db->query("SELECT * FROM users WHERE `email` = :email", ['email' => $email])->fetch();
    }
}
