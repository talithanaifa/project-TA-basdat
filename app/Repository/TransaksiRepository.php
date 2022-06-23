<?php


namespace BasisData\Project\Repository;


use BasisData\Project\config\Database;
use BasisData\Project\Domain\Transaksi;

class TransaksiRepository
{
    private \PDO $connection;
    
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function insertTransaksi(Transaksi $transaksi)
    {
        $statement = $this->connection->prepare("INSERT INTO transaksi(id_customer, id_paket, id_admin, total_harga) 
                                       VALUES (?,?,?,?)");

        $statement->execute([$transaksi->idCustomer, $transaksi->idPaket, $transaksi->idAdmin, $transaksi->totalHarga]);

    }
}