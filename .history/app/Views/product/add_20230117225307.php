<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
	$nama = [
		'name' => 'nama',
		'id' => 'nama',
		'type' => 'text',
        'class' => 'form-control',
    ];
    $harga = [
		'name' => 'harga',
		'id' => 'harga',
		'type' => 'text',
        'class' => 'form-control',
    ];
    $stok = [
		'name' => 'stok',
		'id' => 'stok',
		'type' => 'text',
        'class' => 'form-control',
    ];
    $gambar = [
		'name' => 'gambar',
		'id' => 'gambar',
		'type' => 'file',
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
        <h3>Form Tambah Produk</h3>
        <?= form_open_multipart('product/create') ?>
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
                <?= form_upload($gambar) ?>
            </div>
            <div class="form-group">
            <?= form_label('Kategori Produk', 'kategori') ?>
            <div class="block">
                <?=form_dropdown('id_kategori',$options,'1')?>
            </div>
            </div>
            <div class="text-right">
                <?= form_submit($submit) ?>
            </div>
        <?= form_close() ?>
    </div>

<?= $this->endSection() ?>