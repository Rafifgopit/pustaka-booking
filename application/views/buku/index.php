<div class="container-fluid">
    <?= $this->session->flashdata('pesam');?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan');?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bukuBaruModal"><i class="fas fa-file-alt"></i>Buku Baru</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Stok</th>
                        <th scope="col">DiPinjam</th>
                        <th scope="col">DiBooking</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($buku as $b) {?>
                    <tr>
                        <th scope="row"><?= $a++;?></th>
                        <td><?= $b['judul_buku'];?></td>
                        <td><?= $b['pengarang'];?></td>
                        <td><?= $b['penerbit'];?></td>
                        <td><?= $b['tahun_terbit'];?></td>
                        <td><?= $b['isbn'];?></td>
                        <td><?= $b['stok'];?></td>
                        <td><?= $b['dipinjam'];?></td>
                        <td><?= $b['dibooking'];?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['image'];?>" class="img-fluid img-thumbnail" alt="...">
                            </picture>
                        </td>
                        <td>
                            <a href="<?= base_url('buku/ubahBuku/').$b['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i>Ubah</a>
                            <a href="<?= base_url('buku/hapusBuku').$b['id'];?>" onclick="return confirm('kamu yakin akan menghapus <?= $judul.' '.$b['judul_buku'];?>?');" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
