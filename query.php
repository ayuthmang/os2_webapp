<?php
    class ConnectionDetail {
        public $servername;
        public $username;
        public $password;
        public $databaseName;
    }

    function createConnectionDetail() {
        $connectionDetail = new ConnectionDetail();
        $connectionDetail->servername = "osdb.c6tnvaeewkyj.ap-southeast-1.rds.amazonaws.com";
        $connectionDetail->username = "root";
        $connectionDetail->password = "1234asdf";
        $connectionDetail->databaseName = "os_db";

        return $connectionDetail;
    }

    function createConnection() {
        $connectionDetail = createConnectionDetail();
        $connection = new mysqli(
            $connectionDetail->servername,
            $connectionDetail->username,
            $connectionDetail->password,
            $connectionDetail->databaseName
        );

        return $connection;
    }

    function isConnectionError($connection) {
        if($connection->connect_error) {
            die("Connection failed: ". $connection.connect_error);
        }
    }

    function readMembers() {
        $connection = createConnection();
        isConnectionError($connection);
        $queryStatement = "SELECT * FROM Members";
        $result = $connection->query($queryStatement);

        return $result;
    }
?>