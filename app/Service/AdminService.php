<?php


namespace BasisData\Project\Service;


use BasisData\Project\Domain\Admin;
use BasisData\Project\Domain\Customer;
use BasisData\Project\Domain\Paket;
use BasisData\Project\Domain\Transaksi;
use BasisData\Project\Exception\ValidationException;
use BasisData\Project\Model\LoginAdminResponse;
use BasisData\Project\Repository\AdminRepository;
use BasisData\Project\Repository\CustomerRepository;
use BasisData\Project\Repository\PaketRepository;
use BasisData\Project\Repository\TransaksiRepository;

class AdminService
{
    private AdminRepository $adminRepository;
    private PaketRepository $paketRepository;
    private CustomerRepository $customerRepository;
    private TransaksiRepository $transaksiRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
        $this->paketRepository = new PaketRepository();
        $this->customerRepository = new CustomerRepository();
        $this->transaksiRepository = new TransaksiRepository();
    }

    public function loginAdminRequest(Admin $request): ?LoginAdminResponse
    {
        $this->loginAdminValidation($request);

        $user = $this->adminRepository->getByName($request);

        if($user == null){
            throw new ValidationException("Nama atau password salah");
        }

        if(password_verify($request->password, $user->password)){
            $response = new LoginAdminResponse();
            $response->namaAdmin = $user->namaAdmin;
            $response->password = $user->password;
            return $response;
        }
        return null;
    }

    private function loginAdminValidation(Admin $request)
    {
        if($request->namaAdmin == null || $request->password == null
            || trim($request->namaAdmin) == "" || trim($request->password) == ""){
            throw new ValidationException("Nama dan password tidak boleh kosong");
        }
    }

    public function getAllPaket(): array
    {
        return $this->paketRepository->getAll();
    }

    public function insertPaket(Paket $paket){
        $this->paketRepository->save($paket);
    }

    public function getCustomers():array
    {
        return $this->customerRepository->getCustomers();
    }

    public function addCustomer(Customer $customer)
    {
        try {
            $this->customerRepository->save($customer);
        }catch (ValidationException $e){

        }
    }

    public function getPaketById(int $id){
        return $this->paketRepository->get($id);
    }

    public function insertTransaksi(Transaksi $transaksi)
    {
        $this->transaksiRepository->insertTransaksi($transaksi);
    }

}