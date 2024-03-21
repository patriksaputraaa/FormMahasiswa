<?php
class Tabel
{
    private $table_name;
    private $connection;

    function __construct($host, $user, $pass, $database, $tabel)
    {
        $this->connection = new mysqli($host, $user, $pass, $database);
        $this->table_name = $tabel;
    }

    function executeSql($query)
    {
        $this->connection->query($query);
    }

    function showTable()
    {
        $table = $this->connection->query("SELECT * FROM $this->table_name");
        echo "<table border='1'>\n";
        $associate = $table->fetch_assoc();

        echo "<tr>\n";
        foreach ($associate as $field => $value) {
            echo "<th>" . ucwords($field) . "</th>";
        }
        echo "</tr>\n";

        $table->data_seek(0);
        while($row = $table->fetch_assoc()){
            echo "<tr>\n";
            foreach($row as $value){
                echo "<td>$value</td>";
            }
            echo "</tr>\n";
        }
        echo "</table>";
    }
}
