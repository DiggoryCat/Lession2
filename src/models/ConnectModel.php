<?php
class ConnectModel
{
    var $db = null;
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=lession2';
        $user = 'root';
        $pass = '';
        $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    //	lấy đúng 1 ID nên lấy fetch vô luôn
    public function getInstance($select)
    {
        $results = $this->db->query($select);
        // echo $select;
        $result = $results->fetch();
        return $result;
    }

    //	Lấy nhiều rows
    public function getList($select)
    {
        $results = $this->db->query($select);
        // echo $results;
        return ($results);
    }

    //execute
    public function exec($query)
    {
        $results = $this->db->exec($query);
        return ($results);
    }

    public function insert($table, $data)
    {

        $keys = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table($keys) VALUES ($values)";
        $statement = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }
}
