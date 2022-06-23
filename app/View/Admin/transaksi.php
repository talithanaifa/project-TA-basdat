<style>
    body {
        background: #f2f2f2;
    }

    .selectdiv {
        position: relative;
        /*Don't really need this just for demo styling*/

        float: left;
        min-width: 200px;
        margin: 50px 33%;
    }

    /* IE11 hide native button (thanks Matt!) */
    select::-ms-expand {
        display: none;
    }

    .selectdiv:after {
        content: '<>';
        font: 17px "Consolas", monospace;
        color: #333;
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        right: 11px;
        /*Adjust for position however you want*/

        top: 18px;
        padding: 0 0 2px;
        border-bottom: 1px solid #999;
        /*left line */

        position: absolute;
        pointer-events: none;
    }

    .selectdiv select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        /* Add some styling */

        display: block;
        width: 100%;
        max-width: 420px;
        height: 50px;
        float: right;
        margin: 5px 0px;
        padding: 0px 24px;
        font-size: 16px;
        line-height: 1.75;
        color: #333;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #cccccc;
        -ms-word-break: normal;
        word-break: normal;
    }
</style>

<link rel="stylesheet" href="/assets/transaksi-admin/fonts/icomoon/style.css">


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/assets/transaksi-admin/css/bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href="/assets/transaksi-admin/css/style.css">

<title>Contact Form #10</title>
</head>
<body>


<div class="content">
    <div class="container">
        <div class="row align-items-stretch justify-content-center no-gutters">
            <div class="col-md-7">
                <div class="form h-100 contact-wrap p-5">
                    <h3 class="text-center">Detail</h3>
                    <form class="mb-5" method="POST">
                        <div class="row" style="color: black">
                            <table class="table border-success">
                                <tbody>
                                    <tr>
                                        <th>Nama Paket</th>
                                        <td> <?= $model['paket']->namaPaket ?? ''?> </td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Paket</th>
                                        <td> <?= $model['paket']->jumlahPaket ?? ''?> </td>
                                    </tr>
                                    <tr>
                                        <th>Harga Paket</th>
                                        <td> <?= $model['paket']->jumlahHarga ?? ''?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="selectdiv">
                            <label>
                                <select name="idcustomer">
                                    <option selected value="-1"> Pilih Customer </option>
                                    <?php foreach ($model['customers'] as $item) { ?>
                                        <option value="<?=$item['id']?>" > <?=$item['s_num'] . " - " . $item['username'] ?> </option>
                                    <?php } ?>
                                </select>
                            </label>
                        </div>


                        <div class="row justify-content-center">
                            <div class="col-md-5 form-group text-center">
                                <input type="submit" value="Send" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                                <span class="submitting"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="/assets/transaksi-admin/js/jquery-3.3.1.min.js"></script>
<script src="/assets/transaksi-admin/js/popper.min.js"></script>
<script src="/assets/transaksi-admin/js/bootstrap.min.js"></script>
<script src="/assets/transaksi-admin/js/jquery.validate.min.js"></script>
<script src="/assets/transaksi-admin/js/main.js"></script>