<?php


namespace BasisData\Project\Controller;


use BasisData\Project\App\View;
use BasisData\Project\Domain\Customer;
use BasisData\Project\Domain\Transaksi;
use BasisData\Project\Exception\ValidationException;
use BasisData\Project\Model\LoginAdminRequest;
use BasisData\Project\Model\SavePaketRequest;
use BasisData\Project\Service\AdminService;

class AdminController
{
    private AdminService $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService();
    }

    public function login()
    {
        View::show("Admin/login", [
            'title' => 'Login Admin'
        ]);
    }

    public function postLogin()
    {
        $request = new  LoginAdminRequest();
        $request->namaAdmin = $_POST['nama'];
        $request->password = $_POST['password'];

        try{
            $this->adminService->loginAdminRequest($request);
            View::redirect("/dashboard");
        }catch (ValidationException $e){
            View::show("Admin/login", [
                'title' => 'Login Admin',
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function dashboard()
    {
        session_start();
        $data = $this->adminService->getAllPaket();
        View::show("Admin/dashboard", [
            'title' => 'Dashboard',
            'data' => $data,
            'cust' => $this->adminService->getCustomers()
        ]);
    }

    public function postDashboard()
    {
        session_start();
        try {
            if(isset($_POST['namaPaket'])){
                $request = new SavePaketRequest();
                $request->namaPaket = $_POST['namaPaket'];
                $request->jumlahHarga = $_POST['hrgPaket'];
                $request->jumlahPaket = $_POST['jmlPaket'];
                $this->adminService->insertPaket($request);
            }

            View::show("Admin/dashboard", [
                'title' => 'Dashboard',
                'sukses' => "Berhasil tambah data",
                'data' => $this->adminService->getAllPaket()
            ]);
        }catch (ValidationException $e){
            View::show("Admin/dashboard", [
                'title' => 'Dashboard',
                'error' => $e->getMessage()
            ]);
        }
        
        View::redirect("/dashboard");
    }

    public function customers()
    {
        View::show("Admin/customer", [
            'title' => 'Manage Customer',
            'data' => $this->adminService->getCustomers()
        ]);
    }

    public function postCustomers()
    {
        try {
            if(isset($_POST['saveCust'])){
                $cust = new Customer();
                $cust->namaCust = $_POST['username'];
                $cust->noSeri = $_POST['noSeri'];
                $this->adminService->addCustomer($cust);
            }
            View::show("Admin/customer", [
                'title' => 'Manage Customer',
                'data' => $this->adminService->getCustomers(),
                'sukses' => 'Berhasil tambah customer'
            ]);
        }catch (ValidationException $e){

        }
    }

    public function transaksi(int $id)
    {
        View::show("Admin/transaksi", [
            'title' => 'Transaksi',
            'paket' => $this->adminService->getPaketById($id),
            'customers' => $this->adminService->getCustomers()
        ]);
    }

    public function postTransaksi(int $id)
    {
        session_start();
        $prod = $this->adminService->getPaketById($id);
        $transaksi = new Transaksi();
        $transaksi->idCustomer = $_POST['idcustomer'];
        $transaksi->idAdmin = 1;
        $transaksi->totalHarga = $prod->jumlahHarga;
        $transaksi->idPaket = $id;
        try {
            $this->adminService->insertTransaksi($transaksi);
            $_SESSION['status'] = 'sukses';
        }catch (ValidationException $e){
            $_SESSION['status'] = 'gagal';
        }
        View::redirect("/dashboard");
    }
}