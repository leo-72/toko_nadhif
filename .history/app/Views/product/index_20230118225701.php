<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
    <div class="container mt-5">
   
    <div class="d-flex justify-content-end mb-4">
        <a href="<?= site_url('/product/add') ?>">
            <button class="btn btn-outline-primary block me-auto" >Tambah Produk</button>
        </a>
    </div>

    <div class="table-responsive text-center">
        <table class="table table-striped table-bordered border-dark table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">File Gambar</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
                <tbody>
                    <?php foreach($barangs as $index=>$barang): ?>
                    <tr>
                        <td><?= $barang->id ?></td>
                        <td><?= $barang->nama ?></td>
                        <td><?= $barang->harga ?></td>
                        <td><?= $barang->stok ?></td>
                        <td>
                        <img src="<?= base_url('uploads/'.$barang->gambar.'') ?>" alt=""/>
                        </td>
                        <td><?= $barang->kategori ?></td>
                        <td>
                            <a href="<?= site_url('/product/edit/'.$barang->id) ?>"><button class="btn btn-outline-warning">Edit</button></a>
                            <a href="<?= site_url('/product/delete/'.$barang->id) ?>"><button class="btn btn-outline-danger">Hapus</button></a>
                        </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>