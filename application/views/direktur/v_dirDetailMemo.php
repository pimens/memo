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
                                <?php echo form_open_multipart("Ad/reject"); ?>
                                <div class="form-group">
                                    <textarea name="komentar" id="editor1" class="form-control" rows="3" required="required">Komentar</textarea>
                                </div>
                                <input type="hidden" value="<?php echo $permohonan->id; ?>" name="id" />
                                <input type="hidden" value="33" name="status" />

                                <button type="submit" class="btn btn-danger">Reject</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <?php echo form_close(); ?>
                                <button id="closeAdd" class="btn btn-default">close</button>
                            </div> <!-- widget end -->
                        </div> <!-- sidebar end -->
                    </div> <!-- kolom 8 end -->
                    <div id="apr" class="col-md-6 col-md-offset-3">
                        <div class="sidebar">
                            <div class="widget">
                                <?php echo form_open_multipart("Ad/reject"); ?>
                                <div class="form-group">
                                    <textarea name="komentar" id="editor2" class="form-control" rows="3" required="required">Komentar</textarea>
                                </div>
                                <input type="hidden" value="<?php echo $permohonan->id; ?>" name="id" />
                                <input type="hidden" value="2" name="status" />

                                <button type="submit" class="btn btn-primary">Approve</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <?php echo form_close(); ?>
                                <button id="closeApr" class="btn btn-default">close</button>
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
                                echo "<i class='fa fa-users'></i> Nomor :" . $permohonan->nomor . "<br>";
                                echo "Perihal :" . $permohonan->hal . "<br>";
                                echo "Deskripsi :" . $permohonan->deskripsi . "<br>";
                                echo "tanggal :" . $permohonan->tanggal . "<br>";
                                echo "Direktru :" . $permohonan->direktur . "<br>";
                                echo "Status : ";
                                if ($permohonan->status == 0) {
                                    echo "
                                    <span class='label label-success'>Pending</span>";
                                } else if ($permohonan->status == 1) {
                                    echo "
                                    <span class='label label-warning'>Approve X</span>
                                    ";
                                    echo "<br><br>
                                    <a id='aprButton' type='submit' class='btn btn-primary btn-sm'>Approve</a>
                                    <a id='addButton' type='submit' class='btn btn-danger btn-sm'>Rejected</a>
                                    ";
                                } else if ($permohonan->status == 2) {
                                    echo "
                                    <span class='label label-primary'>Approve XX</span>
                                    ";
                                    echo "<a class='label label-primary' href='$u/ad/report/$permohonan->id'>Report</a>";
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
                                <div class="table-responsive">
                                    <table id="tabelMemo" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Desa</th>
                                                <th>Setoran</th>
                                                <th>Fee</th>
                                                <th>Nomor Rekening</th>
                                                <th>Bendahara</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $total = 0;
                                            foreach ($memo as $c) {
                                                $i++;
                                                $total = $total + $c->setoran;
                                                echo "<tr>
                                            <td>$i</td>										
                                            <td>$c->desa</td>										
                                        	<td>$c->setoran</td>			
                                            <td>$c->fee</td>		
                                            <td>$c->norekening</td>		
                                            <td>$c->bendahara</td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Desa</th>
                                                <th>Setoran</th>
                                                <th>Fee</th>
                                                <th>Nomor Rekening</th>
                                                <th>Bendahara</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <?php
                                echo "Total Setoran : " . $total;
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
    $(document).ready(function() {
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');

        $("#add").hide(1000);
        $("#addButton").click(function() {
            $("#add").show(1000);
        });
        $("#closeAdd").click(function() {
            $("#add").hide(1000);
        });
        $("#apr").hide(1000);
        $("#aprButton").click(function() {
            $("#apr").show(1000);
        });
        $("#closeApr").click(function() {
            $("#apr").hide(1000);
        });
    });
</script>
<script src="<?php echo base_url(); ?>assetadmin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assetadmin/js/dataTables.bootstrap.js"></script>

</html>