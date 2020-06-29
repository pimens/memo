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
                                <?php echo form_open_multipart("Ad/editUser"); ?>
                                <div class="form-group">
                                    <input value="<?php echo $user->nama; ?>" type="text" name='nama' class="form-control" placeholder="Enter Nama">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $user->jabatan; ?>" type="text" name='jabatan' class="form-control" placeholder="Enter Jabatan">
                                </div>
                                <div class="form-group">
                                    <input value="Password Baru" type="text" name='password' class="form-control" placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $user->password; ?>" type="hidden" name='lama' class="form-control" placeholder="Enter New Password">
                                </div>
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
</html>