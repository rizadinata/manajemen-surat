<?php 
  if ($row){
        $id = $row->id_instansi;
        $nama_instansi = $row->nama_instansi;
        $alamat = $row->alamat;
        $email = $row->email;
        $telp = $row->telp;
        $nama_pimpinan = $row->nama_pimpinan;
        $nik_pimpinan = $row->nik_pimpinan;
        $logo = $row->logo;
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>';
        $action     = "ubah";
    } else {
        $id =
        $nama_instansi =
        $alamat =
        $email = 
        $telp =
        $nama_pimpinan =
        $nik_pimpinan =
        $logo = "";
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
        $action = "simpan";
    }
?>

<script type="text/javascript">
    function funBatal(){
        document.location.href = "<?= site_url('instansi/hapus_instansi/'.$id); ?>"
    }
</script>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('instansi/simpan_instansi/'.$action)?>" method="POST">
  <input type="hidden" name="idlama" value="<?= $id; ?>">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Instansi <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nama_instansi" value="<?= $nama_instansi; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Alamat <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="alamat" value="<?= $alamat; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="email" name="email" value="<?= $email; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nomor Telepon <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="tel" name="telp" value="<?= $telp; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Pimpinan <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nama_pimpinan" value="<?= $nama_pimpinan; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >NIK Pimpinan<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nik_pimpinan" value="<?= $nik_pimpinan; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Logo<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="logo" value="<?= $logo; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <?= $button; ?>
        <button class="btn btn-danger" type="button" onclick="funBatal()"><i class="fa fa-times"></i> Hapus
        </button>
        
      </div>
    </div>

</form>