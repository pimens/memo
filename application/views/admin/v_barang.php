<!DOCTYPE html>
<html>

<body>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <!--Page wrapper-->
            <div class="wrapper wrapper-content">
                <?php
                echo $this->session->flashdata('notif'); ?>
                <div class="row">
                    <div id="add" class="col-md-6 col-md-offset-3">
                        <div class="sidebar">
                            <div class="widget">
                                <?php echo form_open_multipart("Ad/insertBarang"); ?>
                                <div class="form-group">
                                    <input type="text" name='nama' class="form-control" placeholder="Enter nama barang" required="required">
                                </div>
                                <div class="form-group">
                                    <input id="x" type="text" name='unit' class="form-control" placeholder="Enter Jumlah" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" name='total' class="form-control" placeholder="Enter Satuan" required="required">
                                </div>
                                <div class="form-group">
                                    <input id="y" type="text" name='harga' class="form-control" placeholder="Enter harga">
                                </div>
                                <div class="form-group">
                                    <input id="z" type="text" class="form-control" placeholder="Total" required="required" disabled>
                                </div>
                                <div class="form-group">
                                    <textarea ID="editor1" name="keterangan" class="form-control" rows="3" required="required">keterangan</textarea>
                                </div>
                                <input type="hidden" value="<?php echo $permohonan->id; ?>" name="id" />
                                <button type="submit" class="btn btn-danger">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button id="closeAdd" class="btn btn-warning">close</button>
                                <?php echo form_close(); ?>

                            </div> <!-- widget end -->
                        </div> <!-- sidebar end -->
                    </div> <!-- kolom 8 end -->
                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Daftar Rincian</h5>
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
                                <?php
                                $u = base_url();
                                echo "Nomor :" . $permohonan->nomor . "<br>";
                                echo "Perihal :" . $permohonan->hal . "<br>";
                                echo "Deskripsi :" . $permohonan->deskripsi . "<br>";
                                echo "tanggal :" . $permohonan->tanggal . "<br>";
                                echo "Kepada :" . $permohonan->kepada . "<br>";
                                echo "Direktur :" . $permohonan->direktur . "<br>";
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
                            </div>
                        </div>
                    </div> <!-- kolom 6 end -->

                    <div class="col-md-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Daftar Rincian</h5>
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
                                <?php
                                if ($permohonan->status == 0) {
                                    echo "
                                    <button id='addButton' type='button' class='btn btn-md btn-info'><span class='glyphicon glyphicon-plus'></span>Tambah Rincian</button>";
                                }
                                ?>
                                <div class="table-responsive">
                                    <table id="tabelMemo" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Unit</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $total = 0;
                                            foreach ($barang as $c) {
                                                $i++;
                                                $j = 0;
                                                $j = $c->unit * $c->harga;
                                                $total = $total + $j;
                                                echo "<tr>
                                            <td>$i</td>										
                                            <td>$c->nama_barang</td>										
                                        	<td>$c->unit/$c->satuan</td>			
                                            <td>$c->harga</td>		
                                            <td>$j</td>		
                                            <td>$c->keterangan</td>		
                                            <td>";
                                                if ($permohonan->status == 0) {
                                                    echo "<a class='btn btn-primary btn-sm' href='$u/ad/editBarang/$c->id'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                    echo "<a class='btn btn-danger btn-sm' onclick='hapus($c->id)' href='javascript:void(0)'><span class='glyphicon glyphicon-trash'></span></a>";
                                                } else {
                                                    echo "-";
                                                }

                                                echo "</td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Unit</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <?php
                                echo "Total : " . $total;
                                ?>
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
                        url: "<?php echo site_url('Ad/deleteBarang') ?>/" + id,
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
        CKEDITOR.replace('editor1');
        $("#add").hide(1000);
        $("#addButton").click(function() {
            $("#add").show(1000);
        });
        $("#closeAdd").click(function() {
            $("#add").hide(1000);
        });
        $("#x").change(function() {
            var x = $("#x").val();
            var y = $("#y").val();

            $("#z").val(x * y);
        });
        $("#y").change(function() {
            var x = $("#x").val();
            var y = $("#y").val();
            $("#z").val(x * y);
        });
    });
</script>
<script src="<?php echo base_url(); ?>assetadmin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assetadmin/js/dataTables.bootstrap.js"></script>

</html>