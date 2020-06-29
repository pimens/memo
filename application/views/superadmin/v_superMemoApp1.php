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
                                <?php
                                $u = base_url();
                                echo "<a class='btn btn-primary btn-sm' href='$u/ad/listMemo'><span class='glyphicon glyphicon-pencil'></span></a>";
                                ?>
                                <div class="table-responsive">
                                    <table id="tabelMemo" class="table table-striped table-bordered table-responsive tabelKomentar">
                                        <thead>
                                            <tr>
                                                <th>--</th>
                                                <th>Nomor</th>
                                                <th>Dari</th>
                                                <th>Approval 1</th>
                                                <th>Direktur</th>
                                                <th>Tanggal</th>
                                                <th>Perihal</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($permohonan as $c) {
                                                echo "<tr>";
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
                                            <td>$c->dari</td>		
											<td>$c->kepada</td>		
											<td>$c->direktur</td>			
                                            <td>$c->tanggal</td>		
                                            <td>$c->hal</td>		
                                            <td>$c->deskripsi</td>		
                                            <td>";
                                                echo "<a class='btn btn-primary btn-circle btn-sm btn-outline' href='" . $u .
                                                    "ad/detailMemo3/$c->id'><i class='fa fa-eye'></i></a>";
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
                                                <th>Approval 1</th>
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
    });
</script>
<script src="<?php echo base_url(); ?>assetadmin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assetadmin/js/dataTables.bootstrap.js"></script>

</html>