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
                    <div id="add" class="col-md-6 col-md-offset-3">
                        <div class="sidebar">
                            <div class="widget">
                                <?php echo form_open_multipart("Ad/insertPermohonan"); ?>
                                <div class="form-group">
                                    <input type="text" name='nomor' class="form-control" id="name" placeholder="Enter Nomor">
                                </div>
                                <div class="form-group">
                                    <select name="kepada" id="input" class="form-control">
                                        <option value='1'>-- Pilih Kacab/SPV --</option>
                                        <?php
                                        foreach ($user as $c) {
                                            echo "<option value='$c->id'>-- $c->nama/$c->jabatan --</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="dir" id="input" class="form-control">
                                        <option value='1'>-- Pilih Direktur --</option>
                                        <?php
                                        foreach ($user as $c) {
                                            echo "<option value='$c->id'>-- $c->nama/$c->jabatan --</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="jenis" id="input" class="form-control">
                                        <option value='0'>-- Jenis Memo --</option>
                                        <option value='0'>Memo</option>
                                        <option value='1'>Barang</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name='tanggal' class="form-control" id="name" placeholder="Enter Tanggal">
                                </div>
                                <div class="form-group">
                                    <textarea name="hal" class="form-control" rows="3" required="required"></textarea>
                                </div>

                                <div class="form-group">
                                    <textarea name="deskripsi" id="editor1" class="form-control" rows="3" required="required"></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button id="closeAdd" class="btn btn-default">close</button>

                                <?php echo form_close(); ?>
                            </div> <!-- widget end -->
                        </div> <!-- sidebar end -->
                    </div> <!-- kolom 8 end -->

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
                                <button id="addButton" type="button" class="btn btn-md btn-info"><span class='glyphicon glyphicon-plus'></span>Buat Permohonan</button>
                                <div class="table-responsive">
                                    <table id="tabelMemo" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>--</th>
                                                <th>Nomor</th>
                                                <th>Kepada</th>
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
                                                if ($c->status == 0) {
                                                    echo "
                                                <td><p><span class='label label-success'>Pending</span></p></td>
                                                ";
                                                } else if ($c->status == 1) {
                                                    echo "
                                                <td><p><span class='label label-warning'>Approve X</span></p></td>
                                                ";
                                                } else if ($c->status == 2) {
                                                    echo "
                                                <td><p><span class='label label-primary'>Approve XX</span></p></td>
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
                                            <td>$c->kepada</td>	
											<td>$c->direktur</td>			                                            		
                                            <td>$c->tanggal</td>		
                                            <td>$c->hal</td>		
                                            <td>$c->deskripsi</td>		
                                            <td>";
                                                echo "<a class='btn btn-info btn-sm' href='" . $u . "ad/memo/$c->id'><span class='glyphicon glyphicon-plus'></span></a>";
                                                if ($c->status == 0) {
                                                    echo "<a class='btn btn-primary btn-sm' href='$u/ad/editPermohonan/$c->id'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                    echo "<a class='btn btn-danger btn-sm' onclick='hapus($c->id)' href='javascript:void(0)'><span class='glyphicon glyphicon-trash'></span></a>";
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
                                                <th>Kepada</th>
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
                                    <table id="tabelBarang" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>--</th>
                                                <th>Nomor</th>
                                                <th>Kepada</th>
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
                                            foreach ($barang as $c) {
                                                if ($c->status == 0) {
                                                    echo "
                                                <td><p><span class='label label-success'>Pending</span></p></td>
                                                ";
                                                } else if ($c->status == 1) {
                                                    echo "
                                                <td><p><span class='label label-warning'>Approve X</span></p></td>
                                                ";
                                                } else if ($c->status == 2) {
                                                    echo "
                                                <td><p><span class='label label-primary'>Approve XX</span></p></td>
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
                                            <td>$c->kepada</td>	
											<td>$c->direktur</td>			                                            		
                                            <td>$c->tanggal</td>		
                                            <td>$c->hal</td>		
                                            <td>$c->deskripsi</td>		
                                            <td>";
                                                echo "<a class='btn btn-info btn-sm' href='" . $u . "ad/barang/$c->id'><span class='glyphicon glyphicon-plus'></span></a>";
                                                if ($c->status == 0) {
                                                    echo "<a class='btn btn-primary btn-sm' href='$u/ad/editPermohonan/$c->id'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                    echo "<a class='btn btn-danger btn-sm' onclick='hapus($c->id)' href='javascript:void(0)'><span class='glyphicon glyphicon-trash'></span></a>";
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
                                                <th>Kepada</th>
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
        CKEDITOR.replace('editor1');

        // $(".textarea").wysihtml5();
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