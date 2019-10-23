<script type="text/javascript">
    function funTambah(){
        document.location.href = "<?= site_url('sifat/formsifat') ?>"
    }
    function funUbah(element, id){
        document.location.href = "<?= site_url('sifat/formsifat') ?>/"+id
    }
    function funHapus(element, id){
        document.location.href = "<?= site_url('sifat/hapus_sifat') ?>/"+id
    }
</script>

<p class="text-muted font-13 m-b-30">
   <button type="button" class="btn btn-primary" onclick="funTambah()"><i class="fa fa-plus"></i> Tambah</button>
</p>
<table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Sifat Disposisi</th>
      <th>Aksi</th>
    </tr>
  </thead>


  <tbody>
        <?php
              $i = 0;
              foreach ($row->result() as $row){
                  $i++;
                  echo "<tr id='data' href='".$row->id_sifat."'>
                        <td class='text-right'>".$i."</td>
                        <td>".$row->nama_sifat."</td>                                    
                        <td>
                          <button type='button' class='btn btn-warning' onclick='funUbah(this, $row->id_sifat)'><i class='fa fa-edit'></i></button>
                          <button type='button' class='btn btn-danger' onclick='funHapus(this, $row->id_sifat)'><i class='fa fa-trash'></i></button>
                        </td>                                     
                        </tr>";
              }

        ?>
    
  </tbody>
</table>