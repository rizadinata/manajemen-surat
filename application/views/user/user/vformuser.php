<?php 
  if ($row){
        $id = $row->id_user;
        $nama_user = $row->nama_user;
        $nik = $row->nik;
        $foto = $row->foto;
        $id_jabatan = $row->id_jabatan;
        $id_role = $row->id_role;
        $password = "";
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>';
        $action     = "ubah";
    } else {
        $id =
        $nama_user = 
        $nik =
        $foto =
        $id_jabatan =
        $id_role = "";
        $password = '<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="password" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>';
        $button = '<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
        $action = "simpan";
    }
?>

<script type="text/javascript">
    function funBatal(){
        document.location.href = "<?= site_url('user') ?>"
    }
</script>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('user/simpan_user/'.$action)?>" method="POST">
  <input type="hidden" name="idlama" value="<?= $id; ?>">
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">NIK <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nik" value="<?= $nik; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama User <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nama_user" value="<?= $nama_user; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <?= $password; ?>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Foto <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="foto" value="<?= $foto; ?>" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Jabatan <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="id_jabatan" required="required" class="form-control col-md-7 col-xs-12">
          <?php
            foreach ($jabatan->result() as $j){
              if ($id_jabatan == $p->id_jabatan) $selected = "selected"; else $selected = "";
              echo "<option value='$j->id_jabatan' ".$selected.">".$j->nama_jabatan."</option>";
            }
          ?>
          
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Role <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="id_role" required="required" class="form-control col-md-7 col-xs-12">
          <?php
            foreach ($role->result() as $r){
              if ($id_role == $r->id_role) $selected = "selected"; else $selected = "";
              echo "<option value='$r->id_role' ".$selected.">".$r->nama_role."</option>";
            }
          ?>
          
        </select>
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