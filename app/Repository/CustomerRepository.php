<?php


namespace BasisData\Project\Repository;


use BasisData\Project\config\Database;
use BasisData\Project\Domain\Customer;
use Exception;
use PDO;

class CustomerRepository
{
    private \PDO $connection;
    
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }
    
    public function getCustomers():array 
    {
        try {
            $statement = $this->connection->prepare("SELECT id_customer 'id', serial_number 's_num', username FROM customer");
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            return [];
        }   
    }
    
    public function save(Customer $customer){
        $statement =  $this->connection->prepare("INSERT INTO customer(serial_number, username) VALUES (?,?)");

        $statement->execute([$customer->noSeri, $customer->namaCust]);
    }
}