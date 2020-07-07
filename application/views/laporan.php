<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetadmin/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    hr.solid {
        border-top: 3px solid #000;
    }
</style>

<body>
    <div class="row">
        <div class="col-md-3 col-md-offset-5"><br>
            <b style="text-align-last: center;">Memo</b>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <hr class="solid">          
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-md-offset-2">
            <?php
            $u = base_url();
            echo "Dari<br>";
            echo  "<b>" . $permohonan->dari . "</b><br>";
            echo  $permohonan->fromJabatan . "<br>";
            echo  $permohonan->fromEmail . "<br>";
            echo  $permohonan->fromLokasi . "<br>";
            echo "Status :";
            if ($permohonan->status == 0) {
                echo "
                                    <span class='label label-success'>Pending</span>
                                    ";
            } else if ($permohonan->status == 1) {
                echo "
                                   <span class='label label-warning'>Approve X</span>
                                    ";
            } else if ($permohonan->status == 2) {
                echo "
                                    <span class='label label-primary'>Approve XX</span>
                                    ";
                echo "<a class='label label-primary' href='$u/ad/reportBarang/$permohonan->id'>Report</a>";
            } else if ($permohonan->status == 3) {
                echo "
                                    <span class='label label-danger'>Rejected X</span>
                                    ";
            } else {
                echo "
                                    <span class='label label-danger'>Rejected XX</span>
                                    ";
            }
            ?>

        </div> <!-- kolom 6 end -->
        <div class="col-md-3">
            <?php
            $u = base_url();
            echo "Kepada<br>";
            echo  "<b>" . $permohonan->kepada . "</b><br>";
            echo  $permohonan->toJabatan . "<br>";
            echo  $permohonan->toEmail . "<br>";
            echo  $permohonan->toLokasi . "<br>";


            echo "Status :";
            if ($permohonan->status == 0) {
                echo "
                                    <span class='label label-success'>Pending</span>
                                    ";
            } else if ($permohonan->status == 1) {
                echo "
                                   <span class='label label-warning'>Approve X</span>
                                    ";
            } else if ($permohonan->status == 2) {
                echo "
                                    <span class='label label-primary'>Approve XX</span>
                                    ";
                echo "<a class='label label-primary' href='$u/ad/reportBarang/$permohonan->id'>Report</a>";
            } else if ($permohonan->status == 3) {
                echo "
                                    <span class='label label-danger'>Rejected X</span>
                                    ";
            } else {
                echo "
                                    <span class='label label-danger'>Rejected XX</span>
                                    ";
            }
            ?>
        </div> <!-- kolom 6 end -->
        <div class="col-md-3">
            <?php
            $u = base_url();
            echo "E-Document # " . $permohonan->nomor . "<br><br>";
            echo "Perihal :" . $permohonan->hal . "<br>";
            echo "tanggal :" . $permohonan->tanggal . "<br>";
            ?>

        </div> <!-- kolom 6 end -->
    </div>
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <hr class="solid">          
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <?php
            $u = base_url();
            echo '<img src="' . $u . 'data/bismillah.jpg"></img><br>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <hr class="solid">          
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12">
            
            <?php
            // $u = base_url();
            // echo '<img src="' . $u . 'data/garis.png"></img><br>';
            ?>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            Dengan ini meyatakan bahwa bla bla
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Desa</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>iman</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>iman</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>iman</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Desa</th>

                    </tr>
                </tfoot>
            </table>
            Demikian perihal ini terimakasih
        </div>
    </div>
</body>

</html>