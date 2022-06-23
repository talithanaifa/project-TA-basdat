
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
<link rel="stylesheet" href="/assets/dashboard-admin/spur.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
</head>

<body>


<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <header>
            <a class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
                <span></span></a>
        </header>
        <nav class="dash-nav-list">
            <a href="/dashboard" class="dash-nav-item">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="/customer" class="dash-nav-item">
                <i class="fas fa-user"></i>
                Customers
            </a>
        </nav>
    </div>
    <div class="dash-app">
        <header class="dash-toolbar">
            <a class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a class="searchbox-toggle">
                <i class="fas fa-search"></i>
            </a>
            <div class="tools">
                <div class="dropdown tools-item">
                    <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="/admin">Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="dash-content">
            <div class="container">
                <div class="container w-50">
                    <?php if(isset($model['sukses'])) {?>
                        <div class="alert alert-success" role="alert">
                            <?= $model['sukses'] ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="container w-50">
                    <?php if(isset($model['error'])) {?>
                        <div class="alert alert-danger" role="alert">
                            <?= $model['error'] ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-11 col-sm-12">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-title">
                                    <button class="btn btn-outline-primary btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#tambahPaket">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                        Tambah Customer
                                    </button>

                                    <!-- Modal -->
                                    <form action="" method="POST">
                                        <div class="modal fade" id="tambahPaket" tabindex="-1" aria-labelledby="modalTambahCust" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTambahCust">Tambah Customer Baru</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" aria-describedby="username" name="username" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="noSeri" class="form-label">Nomor Seri</label>
                                                            <input type="text" class="form-control" id="noSeri" aria-describedby="noSeri" name="noSeri" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="saveCust">Save changes</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body ">
                                <table class="table table-hover table-in-card">
                                    <thead>
                                    <tr>
                                        <th scope="col">Serial Number</th>
                                        <th scope="col" class="text-center">Username</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                    </thead>
                                    <?php if(isset($model['data'])) { ?>
                                        <?php foreach ($model['data'] as $row) { ?>
                                            <tbody>
                                            <tr>
                                                <th scope="row"><?= $row['s_num'] ?></th>
                                                <td class="text-center"><?= $row['username'] ?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" style="border-radius: 0.5rem">
                                                           <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                                  <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                                                  <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                                                </svg>
                                                           </span>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="updateModal">Update Customer</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            </tbody>
                                        <?php } ?>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="assets/dashboard-admin/js/spur.js"></script>

<!--    <script type="text/javascript">-->
<!--        let nama, noSeri, hrgPaket;-->
<!--        function savePaket(){-->
<!--            nama = document.getElementById('username').value;-->
<!--            noSeri = document.getElementById('noSeri').value;-->
<!--            hrgPaket = document.getElementById('hrgPaket').value;-->
<!---->
<!--        console.log(nama);-->
<!--        console.log(noSeri);-->
<!--        console.log(hrgPaket);-->
<!--        }-->
<!--    </script>-->
<!--    </script>-->

