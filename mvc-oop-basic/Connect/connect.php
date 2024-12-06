<?php
class Connect {
    public function connect() {
        $serverName = 'localhost';
        $userName = 'root';
        $password = '';
        $myDB = 'duan1';
        
        try {
            // Fixing the connection string to use double quotes for variable interpolation
            $conn = new PDO("mysql:host=$serverName;dbname=$myDB", $userName, $password);
            
            // Setting the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        } catch (\Throwable $th) {
            echo "Kết nối thất bại: " . $th->getMessage();
        }
    }
   
}
?>
