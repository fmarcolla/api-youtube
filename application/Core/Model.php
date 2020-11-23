<?php

namespace Projeto\Core;

use PDO;

class Model
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    public $db_sync = null;

    public $db_sync_host = null;
    public $db_sync_name = null;
    public $db_sync_user = null;
    public $db_sync_pass = null;
    public $err_connection = false;

    /**
     * Whenever model is created, open a database connection.
     */
    function __construct()
    {
        try {
            self::openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('Sem conexão com o Banco de Dados.');
        }
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    public function connectDatabaseSync($db_host, $db_name, $db_user, $db_pass){
        $this->db_sync_host = $db_host;
        $this->db_sync_name = $db_name;
        $this->db_sync_user = $db_user;
        $this->db_sync_pass = $db_pass;

        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db_sync = new PDO(DB_TYPE . ':host=' . $this->db_sync_host . ';dbname=' . $this->db_sync_name . ';charset=' . DB_CHARSET, $this->db_sync_user, $this->db_sync_pass, $options);
        $this->db_sync->setAttribute(PDO::ATTR_TIMEOUT, 300);
        
    }

    public function changeDatabaseSync($db_host, $db_name, $db_user, $db_pass){
        $this->db_sync_host = $db_host;
        $this->db_sync_name = $db_name;
        $this->db_sync_user = $db_user;
        $this->db_sync_pass = $db_pass;
        $this->err_connection = false;

        try {
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

            // generate a database connection, using the PDO connector
            // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
            $this->db = new PDO(DB_TYPE . ':host=' . $this->db_sync_host . ';dbname=' . $this->db_sync_name . ';charset=' . DB_CHARSET, $this->db_sync_user, $this->db_sync_pass, $options);
            $this->db->setAttribute(PDO::ATTR_TIMEOUT, 300);
            
        } catch (\PDOException $e) {
            $this->err_connection = true;
        }
    }

    public function setDatabaseDist(){
        try {
            self::openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('Sem conexão com o Banco de Dados.');
        }
    }
}
