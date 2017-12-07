<?php

/**
 * Created by PhpStorm.
 * User: matt
 * Date: 26/10/2017
 * Time: 14:02
 */

namespace Itb;


class StudentRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function dropTable()
    {
        $sql = "DROP TABLE IF EXISTS students";
        $this->connection->exec($sql);
    }

    public function createTable()
    {
        // drop table if it already exists
        // (removing all old data)
        $this->dropTable();

        $sql = "
            CREATE TABLE IF NOT EXISTS students (
            id integer not null primary key auto_increment,
            name text)
        ";

        $this->connection->exec($sql);
    }

    public function insert($description, $price)
    {
        // Prepare INSERT statement to SQLite3 file db
        $sql = 'INSERT INTO students (name) 
			VALUES (:name)';
        $stmt = $this->connection->prepare($sql);

        // Bind parameters to statement variables
        $stmt->bindParam(':name', $description);

        // Execute statement
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM students';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\Student');

        $products = $stmt->fetchAll();

        return $products;
    }


    public function getOne($id)
    {
        $sql = 'SELECT * FROM students WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);

        // Execute statement
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\Student');

        $product = $stmt->fetch();

        return $product;


    }


    public function deleteAll()
    {
        $sql = 'DELETE * FROM students';

        $stmt = $this->connection->exec($sql);
    }





}