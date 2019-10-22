<script type="text/javascript">
    function funTambah(){
        document.location.href = "<?= site_url('posisi/formposisi') ?>"
    }
    function funUbah(element, id){
        document.location.href = "<?= site_url('posisi/formposisi') ?>/"+id
    }
    function funHapus(element, id){
        document.location.href = "<?= site_url('posisi/hapus_posisi') ?>/"+id
    }
</script>

<p class="text-muted font-13 m-b-30">
   <button type="button" class="btn btn-primary" onclick="funTambah()"><i class="fa fa-plus"></i> Tambah</button>
</p>
<table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Posisi</th>
      <th>Aksi</th>
    </tr>
  </thead>


  <tbody>
        <?php
              $i = 0;
              foreach ($row->result() as $row){
                  $i++;
                  echo "<tr id='data' href='".$row->id_posisi."'>
                        <td class='text-right'>".$i."</td>
                        <td>".$row->nama_posisi."</td>                                    
                        <td>
                          <button type='button' class='btn btn-warning' onclick='funUbah(this, $row->id_posisi)'><i class='fa fa-edit'></i></button>
                          <button type='button' class='btn btn-danger' onclick='funHapus(this, $row->id_posisi)'><i class='fa fa-trash'></i></button>
                        </td>                                     
                        </tr>";
              }

        ?>
    
  </tbody>
</table>