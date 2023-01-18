<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
	$nama = [
		'name' => 'nama',
		'id' => 'nama',
        'type' => 'text',
        'value'=>$barang[0]->nama,
        'class' => 'form-control',
    ];
    $harga = [
		'name' => 'harga',
		'id' => 'harga',
        'type' => 'text',
        'value'=>$barang[0]->harga,
        'class' => 'form-control',
    ];
    $stok = [
		'name' => 'stok',
		'id' => 'stok',
        'type' => 'text',
        'value'=>$barang[0]->stok,
        'class' => 'form-control',
    ];
    $gambar = [
		'name' => 'gambar',
		'id' => 'gambar',
        'type' => 'file',
        'value'=>$barang[0]->gambar,
        'class' => 'form-control',
    ];
    $kategori = [
		'name' => 'kategori',
		'id' => 'kategori',
        'type' => 'text',
        'class' => 'form-control',
    ];
    $submit = [
		'name' => 'submit',
		'id' => 'submit',
		'type' => 'submit',
		'value' => 'Beli', 
        'class' => 'btn btn-primary'
    ];
    $options = [
        '1'  => 'Men',
        '2'    => 'Women',
        '3'  => 'Kid',
    ];
?>
    <div class="container mt-5">
        <h3>Form Edit Produk</h3>
        <?= form_open_multipart('product/update') ?>
        <?= form_hidden('id', $barang[0]->id); ?>
            <div class="form-group">
                <?= form_label('Nama Produk', 'nama') ?>
                <?= form_input($nama) ?>
            </div>
            <div class="form-group">
                <?= form_label('Harga Produk', 'harga') ?>
                <?= form_input($harga) ?>
            </div>
            <div class="form-group">
                <?= form_label('Stok Produk', 'stok') ?>
                <?= form_input($stok) ?>
            </div>
            <div class="form-group">
                <?= form_label('Gambar Produk', 'gambar') ?>
                <?= form_input($gambar) ?>
            </div>
            <div class="form-group">
            <?= form_label('Kategori Produk', 'kategori') ?>
            <div class="block">
                <?=form_dropdown('id_kategori',$options,$barang[0]->id)?>
            </div>
            </div>
            <div class="text-right">
                <?= form_submit($submit) ?>
            </div>
        <?= form_close() ?>
    </div>

<?= $this->endSection() ?>