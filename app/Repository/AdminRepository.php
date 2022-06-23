<?php


namespace BasisData\Project\Repository;


use BasisData\Project\config\Database;
use BasisData\Project\Domain\Admin;
use PDO;

class AdminRepository
{
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function save(Admin $admin)
    {
        $statement = $this->connection->prepare("INSERT INTO admin(nama_admin, password) VALUES (?,?)");
        $statement->execute([$admin->namaAdmin, $admin->password]);
    }

    public function getByName(Admin $admin):?Admin
    {
        $statement = $this->connection->prepare("SELECT * FROM admin WHERE nama_admin = ?");
        $statement->execute([$admin->namaAdmin]);

        if($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $admin = new Admin();
            $admin->namaAdmin = $row['nama_admin'];
            $admin->password = $row['password'];
            $admin->idAdmin = $row['id_admin'];
            return $admin;
        }

        return null;
    }
}