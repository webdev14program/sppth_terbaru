 <div class="alert alert-success" role="alert">
     <h5 class="text-center text-uppercase font-weight-bold">NOMOR INDUK SISWA</h5>
 </div>
 <div class="card mt-2">
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr class="text-center text-uppercase font-weight-bold">
                         <th>#</th>
                         <th>ID tahun ajaran kelas</th>
                         <th>tahun ajaran</th>
                         <th>jumlah kelas</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <?php
                            $no = 1;
                            foreach ($tahun_ajaran as $row) {
                            ?>
                             <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                             <td class="text-center text-uppercase font-weight-bold"><?= $row['id_tahun_ajaran']; ?></td>
                             <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                             <td class="text-center text-uppercase font-weight-bold"><?= $row['jumlah_kelas']; ?> Kelas</td>
                             <td>
                                 <h5 class="text-center">
                                     <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Peserta_didik/detail_nis_kelas_tahun_ajaran/<?= $row['id_tahun_ajaran']; ?>">Detail</a>
                                 </h5>
                             </td>
                     </tr>
                 <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>