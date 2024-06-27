<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $dataSistem = $this->profileModel->findAll();
        $data = [
            'title' => 'Dashboard',
            'dataSistem' => $dataSistem,
            'kode_peminjaman' => $this->generateKodePeminjaman(),
            'tgl_peminjaman' => $this->tglPeminjaman(),

        ];
        return view('dashboard/index', $data);
    }
    public function generateKodePeminjaman()
    {
        // Ambil data terakhir dari tabel peminjaman
        $kodeTerakhir = $this->peminjamanModel->getKode();

        // Jika ada data terakhir, ambil indeks dan tanggal
        if ($kodeTerakhir) {
            $lastIndex = intval(substr($kodeTerakhir->kode_peminjaman, -3));
            $tglTerakhir = substr($kodeTerakhir->kode_peminjaman, 1, 8);
        } else {
            // Jika tidak ada data terakhir, mulai dari indeks 1
            $lastIndex = 0;
            $tglTerakhir = date('Ymd'); // Tanggal hari ini
        }

        // Hitung indeks baru
        $newIndex = $lastIndex + 1;

        // Bentuk kode peminjaman
        $kodePeminjaman = 'P' . $tglTerakhir . str_pad($newIndex, 3, '0', STR_PAD_LEFT);

        return $kodePeminjaman;
    }



    public function keranjangBarang()
    {
        $kode_barang = $this->request->getPost('kode_barang');
        $dataBarang = $this->barangModel->where('kode_barang', $kode_barang)->find();

        if (empty($dataBarang)) {
            // Jika data barang tidak ditemukan
            session()->setFlashdata('warning', 'Data barang tidak ditemukan.');
        } else {
            // Jika data barang ditemukan
            $sesKodeBarang = $dataBarang[0]['kode_barang'];
            $sesNamaBarang = $dataBarang[0]['nama_barang'];

            // Mengambil session cart atau inisialisasi jika belum ada
            $cart = session('cart') ?? [];

            // Periksa apakah kode barang sudah ada dalam session
            $barangExists = false;
            foreach ($cart as $item) {
                if ($item['kode_barang'] === $sesKodeBarang) {
                    $barangExists = true;
                    break;
                }
            }

            if (!$barangExists) {
                // Jika belum ada, tambahkan ke session
                $cart[] = [
                    'kode_barang' => $sesKodeBarang,
                    'nama_barang' => $sesNamaBarang,
                ];
                session()->set('cart', $cart);
                session()->setFlashdata('success', 'Barang telah ditambahkan.');
            } else {
                // Jika sudah ada, tampilkan flash data
                session()->setFlashdata('warning', 'Barang sudah ada dalam keranjang.');
            }
        }

        // Hapus data POST setelah menambahkan ke session
        unset($_POST['kode_barang']);
        return redirect()->to(base_url('dashboard'));
    }


    public function resetCart()
    {
        session()->remove('cart');
        return redirect()->to(base_url('dashboard'));
    }
    public function resetKaryawan()
    {
        session()->remove('dataKaryawan');
        session()->setFlashdata('pesan', 'Data peminjam berhasil dihapus');
        return redirect()->to(base_url('dashboard'));
    }

    public function tglPeminjaman()
    {
        $nama_bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $bulan_sekarang = date('n'); // Angka bulan saat ini (1-12)
        $tgl = date('d') . " " . $nama_bulan[$bulan_sekarang] . " " . date('Y');
        return $tgl;
    }

    public function getDataKaryawan()
    {
        if ($this->request->getPost('id_karyawan')) {
            $id = $this->request->getPost('id_karyawan');
            $dataKaryawan = $this->karyawanModel->where('id_karyawan', $id)->find();
            if ($dataKaryawan) {
                session()->set('dataKaryawan', $dataKaryawan);
            } else {
                session()->setFlashdata('warning', 'Karyawan tidak ditemukan!');
            }
        }

        return redirect()->to(base_url('dashboard'));
    }

    public function cart()
    {

        $kode_peminjaman = $this->request->getPost('kode_peminjaman');
        $tgl_peminjaman = $this->request->getPost('tgl_peminjaman');
        $id_admin = $this->request->getPost('id_admin');
        $id_karyawan = $this->request->getPost('id_karyawan');
        $status = 'dipinjam';

        $kode_barang = $this->request->getPost('kode_barang[]');

        if (!empty($kode_barang) && !empty($tgl_peminjaman) && !empty($id_admin) && !empty($id_karyawan) && !empty($kode_barang)) {
            $this->peminjamanModel->insert([
                'kode_peminjaman' => $kode_peminjaman,
                'id_admin' => $id_admin,
                'id_karyawan' => $id_karyawan,
                'status' => $status,
                'tgl_peminjaman' => $tgl_peminjaman
            ]);

            if (is_array($kode_barang)) {
                // insert ke detail jika kode barang lebih dari 1
                foreach ($kode_barang as $kode) {
                    $this->detailPeminjamanModel->insert([
                        'kode_peminjaman' => $kode_peminjaman,
                        'kode_barang' => $kode,
                    ]);
                }
            } else {
                // insert ke detail jika kode barang = 1
                $this->detailPeminjamanModel->insert([
                    'kode_peminjaman' => $kode_peminjaman,
                    'kode_barang' => $kode_barang,
                ]);
            }
            session()->remove('cart');
            session()->remove('dataKaryawan');

            session()->setFlashdata('pesan', 'Insert data berhasil!');
            return redirect()->to(base_url('dashboard'));
        } else {
            session()->setFlashdata('warning', 'Semua kolom Input Tidak Boleh kosong');
            return redirect()->to(base_url('dashboard'));
        }
    }
}
