<?php
    session_start();
    ob_start();
    date_default_timezone_set( 'Europe/Istanbul' );

    class Connect
    {
        public $db;
        public function __construct()
        {
            try
            {
                $this->db = new PDO('mysql:host=localhost;dbname=tryto;charset=utf8mb4;', 'root', '');
            }

            catch( PDOException $error )
            {
                die( $error->getMessage() );
            }
        }
    }

    $connect = new Connect();
?>