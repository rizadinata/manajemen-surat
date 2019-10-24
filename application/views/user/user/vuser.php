<script type="text/javascript">
    function funTambah(){
        document.location.href = "<?= site_url('user/formuser') ?>"
    }
    function funUbah(element, id){
        document.location.href = "<?= site_url('user/formuser') ?>/"+id
    }
    function funHapus(element, id){
        document.location.href = "<?= site_url('user/hapus_user') ?>/"+id
    }
</script>

<p class="text-muted font-13 m-b-30">
   <button type="button" class="btn btn-primary" onclick="funTambah()"><i class="fa fa-plus"></i> Tambah</button>
</p>
<table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama User</th>
      <th>Jabatan</th>
      <th>Role</th>
      <th>Aksi</th>
    </tr>
  </thead>


  <tbody>
        <?php
              $i = 0;
              foreach ($row->result() as $row){
                  $i++;
                  echo "<tr id='data' href='".$row->id_user."'>
                        <td class='text-right'>".$i."</td>
                        <td>".$row->nik."</td>                                    
                        <td>".$row->nama_user."</td>  
                        <td>".$row->nama_jabatan."</td>                                    
                        <td>".$row->nama_role."</td>                                                                      
                        <td>
                          <button type='button' class='btn btn-warning' onclick='funUbah(this, $row->id_user)'><i class='fa fa-edit'></i></button>
                          <button type='button' class='btn btn-danger' onclick='funHapus(this, $row->id_user)'><i class='fa fa-trash'></i></button>
                        </td>                                     
                        </tr>";
              }

        ?>
    
  </tbody>
</table>