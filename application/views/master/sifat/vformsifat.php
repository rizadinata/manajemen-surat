<?php 
  if ($row){
        $id = $row->id_sifat;
        $nama_sifat = $row->nama_sifat;
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>';
        $action     = "ubah";
    } else {
        $id =
        $nama_sifat = "";
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
        $action = "simpan";
    }
?>

<script type="text/javascript">
    function funBatal(){
        document.location.href = "<?= site_url('sifat') ?>"
    }
</script>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('sifat/simpan_sifat/'.$action)?>" method="POST">
  <input type="hidden" name="idlama" value="<?= $id; ?>">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Sifat Disposisi <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nama_sifat" value="<?= $nama_sifat; ?>" required="required" class="form-control col-md-7 col-xs-12">
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