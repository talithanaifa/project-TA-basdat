<?php


namespace BasisData\Project\Repository;


use BasisData\Project\config\Database;
use BasisData\Project\Domain\Paket;
use PDO;

class PaketRepository
{
    private \PDO $connection;
    
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }
    
    public function getAll():array 
    {
        $statement = $this->connection->prepare("SELECT id_paket AS 'id', nama_produk 'nama',
                                jumlah_harga 'harga', jumlah_paket 'jml_paket' FROM paket");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function save(Paket $paket){
        $statement = $this->connection->prepare("INSERT INTO paket(nama_produk, jumlah_paket, jumlah_harga) VALUES (?,?,?)");

        $statement->execute([$paket->namaPaket, $paket->jumlahPaket, $paket->jumlahHarga]);
    }
    
    public function get(int $id):?Paket
    {
        $statement = $this->connection->prepare("SELECT nama_produk 'nama', jumlah_paket 'jml', 
                                        jumlah_harga 'harga' FROM paket WHERE id_paket = ?");
        $statement->execute([$id]);

        if($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $paket = new Paket();
            $paket->namaPaket = $row['nama'];
            $paket->jumlahPaket = $row['jml'];
            $paket->jumlahHarga = $row['harga'];
            return $paket;
        }
        return null;
    }
}