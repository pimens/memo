<!DOCTYPE html>
<html>

<body>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <!--Page wrapper-->
            <div class="wrapper wrapper-content">
                <div class="row">
                    <?php
                    echo $this->session->flashdata('notif'); ?>
                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Daftar Permohonan yang diajukan</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table id="tabelMemo" class="table table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>--</th>
                                                <th>Nomor</th>
                                                <th>Dari</th>
                                                <th>Direktur</th>
                                                <th>Tanggal</th>
                                                <th>Perihal</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $u = base_url();
                                            foreach ($permohonan as $c) {
                                                if($c->jenis==1){
                                                    continue;
                                                }
                                                echo "<tr>";
                                                if ($c->status == 0) {
                                                    echo "
                                                <td><p><span class='label label-success'>Pending</span></p></td>
                                                ";
                                                } else if ($c->status == 1) {
                                                    echo "
                                                <td><p><span class='label label-warning'>Approve X</span></p>
                                                $c->komentar
                                                </td>
                                                ";
                                                } else if ($c->status == 2) {
                                                    echo "
                                                <td><p><span class='label label-primary'>Approve XX</span></p>
                                                $c->komentar
                                                </td>
                                                ";
                                                } else if ($c->status == 3) {
                                                    echo "
                                                <td><p><span class='label label-danger'>Rejected X</span></p>
                                                $c->komentar
                                                </td>
                                                ";
                                                } else {
                                                    echo "
                                                <td><p><span class='label label-danger'>Rejected XX</span></p>
                                                $c->komentar
                                                </td>
                                                ";
                                                }
                                                echo "<td>$c->nomor</td>										
											<td>$c->dari</td>		
											<td>$c->direktur</td>			
                                            <td>$c->tanggal</td>		
                                            <td>$c->hal</td>		
                                            <td>$c->deskripsi</td>		
                                            <td>";
                                                echo "<a class='btn btn-primary btn-circle btn-sm btn-outline' href='" . $u . "ad/detailMemo/$c->id'><i class='fa fa-eye'></i></a>";
                                                echo "<a class='btn btn-primary btn-circle btn-sm btn-outline' href='" . $u . "ad/pdfMemo/$c->id'><i class='fa fa-report'></i>PDF</a>";
                                                if ($c->status == 0) {
                                                    echo "<a class='btn btn-success btn-circle btn-sm btn-outline' href='" . $u . "ad/detailMemo/$c->id'><i class='fa fa-check-square-o'></i></a>";
                                                    echo "<a class='btn btn-danger btn-circle btn-sm btn-outline' href='" . $u . "ad/detailMemo/$c->id'><i class='fa fa-minus-square'></i></a>";
                                                } else if ($c->status == 1 || $c->status == 3) {
                                                    echo "<a class='btn btn-success btn-circle btn-sm btn-outline' href='" . $u . "ad/approve/$c->id/0'>X</a>";
                                                }
                                                echo "</td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>--</th>
                                                <th>Nomor</th>
                                                <th>Dari</th>
                                                <th>Direktur</th>
                                                <th>Tanggal</th>
                                                <th>Perihal</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- kolom 6 end -->


                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Daftar Permohonan Barang yang diajukan</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table id="tabelBarang" class="table table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>--</th>
                                                <th>Nomor</th>
                                                <th>Dari</th>
                                                <th>Direktur</th>
                                                <th>Tanggal</th>
                                                <th>Perihal</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $u = base_url();
                                            foreach ($permohonan as $c) {
                                                if($c->jenis==0){
                                                    continue;
                                                }
                                                echo "<tr>";
                                                if ($c->status == 0) {
                                                    echo "
                                                <td><p><span class='label label-success'>Pending</span></p></td>
                                                ";
                                                } else if ($c->status == 1) {
                                                    echo "
                                                <td><p><span class='label label-warning'>Approve X</span></p><br>$c->komentar</td>
                                                ";
                                                } else if ($c->status == 2) {
                                                    echo "
                                                <td><p><span class='label label-primary'>Approve XX</span></p><br>$c->komentar</td>
                                                ";
                                                } else if ($c->status == 3) {
                                                    echo "
                                                <td><p><span class='label label-danger'>Rejected X</span></p>
                                                $c->komentar
                                                </td>
                                                ";
                                                } else {
                                                    echo "
                                                <td><p><span class='label label-danger'>Rejected XX</span></p><br>
                                                $c->komentar
                                                </td>
                                                ";
                                                }
                                                echo "<td>$c->nomor</td>										
											<td>$c->dari</td>		
											<td>$c->direktur</td>			
                                            <td>$c->tanggal</td>		
                                            <td>$c->hal</td>		
                                            <td>$c->deskripsi</td>		
                                            <td>";
                                                echo "<a class='btn btn-primary btn-circle btn-sm btn-outline' href='" . $u . "ad/detailBarang/$c->id'><i class='fa fa-eye'></i></a>";
                                                echo "<a class='btn btn-primary btn-circle btn-sm btn-outline' href='" . $u . "ad/pdf/$c->id'><i class='fa fa-report'></i>PDF</a>";
                                                if ($c->status == 0) {
                                                    echo "<a class='btn btn-success btn-circle btn-sm btn-outline' href='" . $u . "ad/detailBarang/$c->id'><i class='fa fa-check-square-o'></i></a>";
                                                    echo "<a class='btn btn-danger btn-circle btn-sm btn-outline' href='" . $u . "ad/detailBarang/$c->id'><i class='fa fa-minus-square'></i></a>";
                                                } else if ($c->status == 1 || $c->status == 3) {
                                                    echo "<a class='btn btn-success btn-circle btn-sm btn-outline' href='" . $u . "ad/approve/$c->id/0'>X</a>";
                                                }
                                                echo "</td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>--</th>
                                                <th>Nomor</th>
                                                <th>Dari</th>
                                                <th>Direktur</th>
                                                <th>Tanggal</th>
                                                <th>Perihal</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- kolom 6 end -->

                </div> <!-- row end -->

            </div>
        </div>
        <!--Wrapper Content-->
    </div>
    <!--Wrapper-->

</body>
<script type="text/javascript">
    $(function() {
        $('#tabelMemo').dataTable();
        $('#tabelBarang').dataTable();

    });
</script>
<script>
    function hapus(id) {
        swal({
                title: 'Konfirmasi?',
                text: "Apakah anda yakin ingin menghapus data ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                closeOnConfirm: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo site_url('Ad/deletePermohonan') ?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status) //if success close modal and reload ajax table
                            {

                                swal({
                                    title: "Data Berhasil dihapus",
                                    type: "success",
                                });
                                window.location.reload();
                            }

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error adding / update data');
                        }
                    });
                }
            });
    }
</script>
<script>
    $(document).ready(function() {
        $("#add").hide(1000);
        $("#addButton").click(function() {
            $("#add").show(1000);
        });
        $("#closeAdd").click(function() {
            $("#add").hide(1000);
        });
    });
</script>
<script src="<?php echo base_url(); ?>assetadmin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assetadmin/js/dataTables.bootstrap.js"></script>

</html>