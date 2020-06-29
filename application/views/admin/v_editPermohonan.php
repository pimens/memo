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
                                <?php echo form_open_multipart("Ad/editPermohonanAction"); ?>
                                <div class="form-group">
                                    <input type="text" name='nomor' value="<?php echo $permohonan->nomor; ?>" class="form-control" id="name" placeholder="Enter Judul">
                                </div>
                                <div class="form-group">
                                    <select name="kepada" id="input" class="form-control">
                                        <?php
                                        foreach ($user as $c) {
                                            echo "<option value='$c->id'";
                                            if ($permohonan->kpd == $c->id) {
                                                echo "selected";
                                            }
                                            echo ">-- $c->nama/$c->jabatan --</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="dir" id="input" class="form-control">
                                        <option value="x">-- Pilih Direktur --</option>
                                        <?php
                                        foreach ($user as $c) {
                                            echo "<option value='$c->id'";
                                            if ($permohonan->dir == $c->id) {
                                                echo "selected";
                                            }
                                            echo ">-- $c->nama/$c->jabatan --</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name='tanggal' value="<?php echo $permohonan->tanggal; ?>" required="required" class="form-control" id="name" placeholder="Enter Tanggal">
                                </div>
                                <div class="form-group">
                                    <textarea name="hal" class="form-control" rows="3" required="required"><?php echo $permohonan->hal; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea name="deskripsi" id="inputdeskripsi" class="form-control" rows="3" required="required"><?php echo $permohonan->deskripsi; ?></textarea>
                                </div>
                                <input type="hidden" value="<?php echo $permohonan->id; ?>" name="id" />

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