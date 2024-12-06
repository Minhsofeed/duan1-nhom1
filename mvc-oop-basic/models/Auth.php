<?php
require_once '../Connect/connect.php';
class Auth extends connect
{
    public function register($name, $email, $password)
    {
        try {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau , chuc_vu_id) VALUES (?, ?, ?, 2)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$name, $email, $hash_password]);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM tai_khoans WHERE email=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && $user['chuc_vu_id'] == 1 && password_verify($password, $user['mat_khau'])) {
            return $user;
        }
        return false;
    }
    public function auth($email, $password)
    {
        $sql = "SELECT * FROM tai_khoans WHERE email=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && $user['chuc_vu_id'] == 1 && password_verify($password, $user['mat_khau'])) {
            return $user;
        }
        return false;
    }
  
   
    public function getUserById($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function changePassword($id, $mat_khau)
    {
        try {
            $sql = "UPDATE tai_khoans SET mat_khau = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$mat_khau, $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
