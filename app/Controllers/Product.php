<?php

namespace App\Controllers;
use App\Models\BarangModel;
use App\Models\KategoriModel;
class Product extends BaseController
{

    public function __construct()
    { 
          helper('form'); 
          $this->session = session();
          $this->validation = \Config\Services::validation();
          $this->barang = new BarangModel();
          $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $barang = $this->barang->select('barang.*, kategori.nama AS kategori')->join('kategori', 'barang.id_kategori=kategori.id')->findAll();
        // dd($barang);
        // dd($barang);
        return view('product/index',[
            'barangs'=>$barang
        ]);
    }

    public function add()
    {
        $kategori = $this->kategori->findAll();
        // dd($kategori);
        return view('product/add',[
            'kategoris' => $kategori,
        ]);
    }

    public function create()
    {
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $gambar = $this->request->getFile('gambar');
            $gambar->move('uploads/');
            $namaGambar = $gambar->getName();

            $this->validation->run($data, 'barang');
            $errors = $this->validation->getErrors();
            if(!$errors){
                
                $barangModel = new \App\Models\BarangModel();
                $barangentity = new \App\Entities\Barang();
                $data['gambar'] = $namaGambar;
                // $gambar->move('uploads/', $data['gambar']);
                // $filepath = WRITEPATH . 'uploads/' . $gambar->store();
                // $uploadgambar = ['uploaded_fileinfo' => new File($filepath)];
                $barangentity->fill($data);
                $barangModel->save($data); 
                // dd($data);
                return redirect()->to('product');
            }
            dd($errors);
        }

        // return view('product');
    }

    public function edit()
    {   
        $id = $this->request->uri->getSegment(3);
        $barang=$this->barang->select('*')->where('id',$id)->findAll();
        // dd($barang[0]->id);
        return view('product/edit',[
            'barang'=>$barang
        ]);
    }

    public function update()
    {
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $gambar = $this->request->getFile('gambar');
            $gambar->move('uploads/');
            $namaGambar = $gambar->getName();
            // dd($data['id']);
            // $barangModel = new \App\Models\BarangModel();
            $db = \Config\Database::connect();
            $builder =  $db->table('barang');
            $builder->select('*')->where('id', $data['id']);
            // dd($builder->get()->getResult());
            $this->validation->run($data, 'barang');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $db = \Config\Database::connect();
                $builder =  $db->table('barang');
                $reqData = [
                    'nama' => $data['nama'],
                    'harga'  => $data['harga'],
                    'stok'  =>$data['stok'],
                    'gambar'  => $namaGambar,
                    'id_kategori'  => $data['id_kategori'],
                ];
                $builder->update($reqData,['id'=>$data['id']]);
                // $builder->select('*')->where('id', $data['id']);
                // dd($builder->get()->getResult()); 
                return redirect()->to('product');
            }
            dd($errors);
        }
    }

    public function delete()
    {

            $id = $this->request->uri->getSegment(3);
            $db = \Config\Database::connect();

            $builder =  $db->table('barang');
            $builder->where('id', $id);
            $builder->delete();

            // dd($builder->get()->getResult());
            return redirect()->to('product');
        
        
        // return view('product');
    }
}
