<?php
class Tabel
{
    private $table_name;
    private $connection;
    private $delete;
    private $update;

    function __construct($host, $user, $pass, $database, $tabel, $update="update.php", $delete="delete.php")
    {
        $this->connection = new mysqli($host, $user, $pass, $database);
        $this->table_name = $tabel;
        $this->delete = $delete;
        $this->update = $update;
    }

    function executeSql($query)
    {
        $this->connection->query($query);
    }

    function getRow($sql){
        $tabel = $this->connection->query($sql);
        return $tabel->fetch_assoc();
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
        echo "<th>Option</th></tr>\n";

        $table->data_seek(0);
        while ($row = $table->fetch_assoc()) {
            echo "<tr>\n";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            $nis = $row["nis"];
            echo "<td> <a href='".$this->delete."?delete=$nis'> Hapus  / </a>";
            echo "<a href='".$this->update."?update=$nis'> Ubah </a></td>";
            echo "</tr>\n";
        }
        echo "</table>";
    }
}
