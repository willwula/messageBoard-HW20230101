<?php

namespace models;

use Core\Database;

class Guestbook
{
    public $connection;
    public $name;
    public $subject;
    public $content;
    public $result;
    public $row_result;
    public $total_pages;
    public $find;
    public $row;

    // 在建構子將 Database 物件實例化
    public function __construct()
    {
        $config = require base_path('config.php');
        $this->connection = new Database($config['database']);
//        var_dump($this->connection);
    }

    public function getAllmessage($startRow_records,$pageRow_records)
    {
        $sql_query = "SELECT * FROM guestbook";
        $sql_query_limit = $sql_query." LIMIT ".$startRow_records.",".$pageRow_records;
        $this->result = $this->connection->query_execute($sql_query_limit);
        $total_records = $this->connection->query($sql_query)->rowCount();
        $this->total_pages = ceil($total_records/$pageRow_records);
        $this->row_result = $this->connection->query_execute($sql_query)->fetch();
    }
    public function getAllmessageByName($name)
    {
        $sql = "SELECT * FROM guestbook WHERE  name=:name";
        $result = $this->connection->query_execute($sql,[
            'name' => $name
        ]);
        $this->row = $result->fetch();
    }
    public function getAllmessageByNo($no)
    {
        $sql = "SELECT * FROM guestbook WHERE  no=:no";
        $result = $this->connection->query_execute($sql,[
            'no' => $no
        ]);
        $this->row = $result->fetch();
    }
    public function insert($name, $subject, $content)
    {

        $sql = "INSERT INTO guestbook(no,name,subject,content,time) values (null,:name,:subject,:content,now())";
        $this->result = $this->connection->query_execute($sql, [
            "name" => $name,
            "subject" => $subject,
            "content" => $content
        ]);
    }

    public function update($subject, $content,$no)
    {
        $sql = "UPDATE guestbook SET subject=:subject,content=:content WHERE no=:no ";
        $this->result = $this->connection->query_execute($sql, [
            "subject" => $subject,
            "content" => $content,
            "no" => $no
        ]);
    }

    public function delete($no)
    {
        $sql = "DELETE FROM guestbook WHERE no =:no";
        $this->result = $this->connection->query_execute($sql, [
            'no' => $no
        ]);


    }
}