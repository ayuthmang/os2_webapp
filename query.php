<?php
    function readMember() {
        $servername = "osdb.c6tnvaeewkyj.ap-southeast-1.rds.amazonaws.com";
        $username = "root";
        $password = "1234asdf";
        $dbname = "os_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT * FROM Members";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "name: " . $row["firstname"]. " " . $row["lastname"]. "(" . $row["nickname"]. ")";
                echo "<img src='". $row["imageURL"] ."'></img><hr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
?>