<?php 
  if ($row){
        $id = $row->id_posisi;
        $nama_posisi = $row->nama_posisi;
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>';
        $action     = "ubah";
    } else {
        $id =
        $nama_posisi = "";
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
        $action = "simpan";
    }
?>

<script type="text/javascript">
    function funBatal(){
        document.location.href = "<?= site_url('posisi') ?>"
    }
</script>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('posisi/simpan_posisi/'.$action)?>" method="POST">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Posisi <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nama_posisi" value="<?= $nama_posisi; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <!-- <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
      </div>
    </div> -->
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <!-- <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button> -->
        <?= $button; ?>
        <button class="btn btn-danger" type="button" onclick="funBatal()"><i class="fa fa-times"></i> Batal</button>
        
      </div>
    </div>

</form>