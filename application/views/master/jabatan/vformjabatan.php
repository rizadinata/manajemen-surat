<?php 
  if ($row){
        $id = $row->id_jabatan;
        $nama_jabatan = $row->nama_jabatan;
        $id_posisi = $row->id_posisi;
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>';
        $action     = "ubah";
    } else {
        $id =
        $nama_jabatan = 
        $id_posisi= "";
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
        $action = "simpan";
    }
?>

<script type="text/javascript">
    function funBatal(){
        document.location.href = "<?= site_url('jabatan') ?>"
    }
</script>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('jabatan/simpan_jabatan/'.$action)?>" method="POST">
  <input type="hidden" name="idlama" value="<?= $id; ?>">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Jabatan <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nama_jabatan" value="<?= $nama_jabatan; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Posisi <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="id_posisi" required="required" class="form-control col-md-7 col-xs-12">
          <?php
            foreach ($posisi->result() as $p){
              if ($id_posisi == $p->id_posisi) $selected = "selected"; else $selected = "";
              echo "<option value='$p->id_posisi' ".$selected.">".$p->nama_posisi."</option>";
            }
          ?>
          
        </select>
        <!-- <input type="text" name="nama_jabatan" value="<?= $nama_jabatan; ?>" required="required" class="form-control col-md-7 col-xs-12"> -->
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