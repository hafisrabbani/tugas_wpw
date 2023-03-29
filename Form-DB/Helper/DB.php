<?php
class DB
{
    private $db;
    protected $config = [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'database' => 'tugas_wpw',
    ];
    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['database'], $this->config['user'], $this->config['pass']);
    }
    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }
    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}
