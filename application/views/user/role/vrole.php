<script type="text/javascript">
    function funTambah(){
        document.location.href = "<?= site_url('role/formrole') ?>"
    }
    function funUbah(element, id){
        document.location.href = "<?= site_url('role/formrole') ?>/"+id
    }
    function funHapus(element, id){
        document.location.href = "<?= site_url('role/hapus_role') ?>/"+id
    }
</script>

<p class="text-muted font-13 m-b-30">
   <button type="button" class="btn btn-primary" onclick="funTambah()"><i class="fa fa-plus"></i> Tambah</button>
</p>
<table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Role</th>
      <th>Aksi</th>
    </tr>
  </thead>


  <tbody>
        <?php
              $i = 0;
              foreach ($row->result() as $row){
                  $i++;
                  echo "<tr id='data' href='".$row->id_role."'>
                        <td class='text-right'>".$i."</td>
                        <td>".$row->nama_role."</td>                                    
                        <td>
                          <button type='button' class='btn btn-warning' onclick='funUbah(this, $row->id_role)'><i class='fa fa-edit'></i></button>
                          <button type='button' class='btn btn-danger' onclick='funHapus(this, $row->id_role)'><i class='fa fa-trash'></i></button>
                        </td>                                     
                        </tr>";
              }

        ?>
    
  </tbody>
</table>