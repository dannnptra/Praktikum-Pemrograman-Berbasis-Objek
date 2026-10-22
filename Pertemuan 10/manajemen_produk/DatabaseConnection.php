<?php

class DatabaseConnection
{
    private static $connection = null;

    //constructor dibuat private supaya objek tidak bisa dibuat dari luar class
    private function __construct()
    {
    }

    //fungsi ambil koneksi, objek PDO hanya dibuat satu kali
    public static function getConnection()
    {
        if (self::$connection === null) {
            try {
                $dsn = "mysql:host=localhost;dbname=materi_pdo;charset=utf8";
                $username = "root";
                $password = "";

                self::$connection = new PDO($dsn, $username, $password);

                //supaya error query bisa ditangkap oleh try catch
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi gagal! " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
