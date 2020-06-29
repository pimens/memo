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
                                <?php echo form_open_multipart("Ad/editBarangAction"); ?>
                                <div class="form-group">
                                    <input value="<?php echo $barang->nama_barang; ?>" type="text" name='nama' class="form-control" placeholder="Enter Desa">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $barang->unit; ?>" type="text" name='unit' class="form-control" placeholder="Enter Setoran">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $barang->harga; ?>" type="text" name='harga' class="form-control" placeholder="Enter Fee">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $barang->total; ?>" type="text" name='total' class="form-control" placeholder="Enter Nomor Rekening">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $barang->keterangan; ?>" type="text" name='keterangan' class="form-control" placeholder="Enter Nama Bendahara">
                                </div>
                                <input type="hidden" value="<?php echo $barang->id; ?>" name="id" />
                                <input type="hidden" value="<?php echo $barang->permohonan; ?>" name="permohonan" />

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