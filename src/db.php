<?php 


class DBConn {
    public static function makeDBConn()
    {
        $host     = 'localhost';
        $dbname   = 'bookstore';
        $username = 'postgres';
        $password = 'kali';
    
        try {
            $db = new PDO("pgsql:host=$host;dbname=$dbname;", $username, $password);
            return $db;


        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return NULL;
    }
}


class DumpDebugger {
    public static function dumper($objectToInspect) {
        echo '<div class="w3-panel w3-red w3-padding-16">';
            echo '<p>Debugging Mode Inspector:</p>';
            echo "<pre>";
                var_dump($objectToInspect);
            echo "</pre>";
        echo "</div>";
    }
}