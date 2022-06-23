<?php


namespace BasisData\Project\Domain;


class Transaksi
{
    public ?int $idTransaksi;
    public ?int $idCustomer;
    public int $idPaket;
    public ?int $idAdmin;
    public int $totalHarga;
    public ?string $tglPesan;
    public ?int $status;
}