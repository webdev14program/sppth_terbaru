<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">tahun ajaran</h5>
</div>

<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center text-uppercase font-weight-bold">
                        <th>#</th>
                        <th>ID</th>
                        <th>tahun ajaran</th>
                        <th>status</th>
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
                            <td class="text-center text-uppercase font-weight-bold">Tahun Ajaran <?= $row['tahun_ajaran']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['status_tahun_ajaran']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>