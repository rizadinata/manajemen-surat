<?php 
  if ($row){
        $id = $row->id_role;
        $nama_role = $row->nama_role;
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>';
        $action     = "ubah";
    } else {
        $id =
        $nama_role = "";
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
        $action = "simpan";
    }
?>

<script type="text/javascript">
    function funBatal(){
        document.location.href = "<?= site_url('role') ?>"
    }
</script>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('role/simpan_role/'.$action)?>" method="POST">
  <input type="hidden" name="idlama" value="<?= $id; ?>">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Role <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nama_role" value="<?= $nama_role; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <?= $button; ?>
        <button class="btn btn-danger" type="button" onclick="funBatal()"><i class="fa fa-times"></i> Batal</button>
        
      </div>
    </div>

</form>