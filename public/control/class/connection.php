<?php
class connection
{

    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $dbname = "theaterreservering";

    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    protected function conn()
    {
        try
        {
            $con = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            return $con;
        }
        catch (mysqli_sql_exception $exception)
        {
            $con = "Connection failed contact an administrator with the following error. " . $exception->getMessage();
            return $con;
        }
    }

    public function sanatize($input)
    {
        $clean = mysqli_real_escape_string($this->conn(), strip_tags($input));
        return $clean;
    }
}
