<!DOCTYPE html>
<html>


<body>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <!--Page wrapper-->
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div id="add" class="col-md-6 col-md-offset-3">
                        <div class="sidebar">
                            <div class="widget">
                                <?php echo form_open_multipart("Ad/editMemoAction"); ?>
                                <div class="form-group">
                                    <input value="<?php echo $memo->desa; ?>" type="text" name='desa' class="form-control" placeholder="Enter Desa">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $memo->setoran; ?>" type="text" name='setoran' class="form-control" placeholder="Enter Setoran">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $memo->fee; ?>" type="text" name='fee' class="form-control" placeholder="Enter Fee">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $memo->norekening; ?>" type="text" name='norek' class="form-control" placeholder="Enter Nomor Rekening">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $memo->bendahara; ?>" type="text" name='bendahara' class="form-control" placeholder="Enter Nama Bendahara">
                                </div>
                                <input type="hidden" value="<?php echo $memo->id; ?>" name="id" />
                                <input type="hidden" value="<?php echo $memo->permohonan; ?>" name="permohonan" />

                                <button type="submit" class="btn btn-danger">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button id="closeAdd" class="btn btn-default">close</button>

                                <?php echo form_close(); ?>

                            </div> <!-- widget end -->
                        </div> <!-- sidebar end -->
                    </div> <!-- kolom 8 end -->
                </div> <!-- row end -->

            </div>
        </div>
        <!--Wrapper Content-->
    </div>
    <!--Wrapper-->

</body>
<script src="<?php echo base_url(); ?>assetadmin/js/dataTables.bootstrap.js"></script>

</html>