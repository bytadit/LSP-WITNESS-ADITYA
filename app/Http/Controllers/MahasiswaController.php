<?php

//include tiap dependency yang dibutuhkan
namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MahasiswaController extends Controller
{
    //membuat method index untuk menampilkan halaman utama/index pada laman admin
    public function index()
    {
        //membuat variabel mahasiswa yang menyimpan data dari model Mahasiswa yang terurut secara decsending berdasarkan kolom nim
        $mahasiswas  =  Mahasiswa::orderBy('nim', 'DESC')->get();
//        menampilakan halaman/view index mahasiswa dan mengirim variabel mahasiswas yang menyimpan variable mahasiswas yang telah dibuat sebelumnya
        return view('admin.mahasiswa.index', [
            'mahasiswas' => $mahasiswas
        ]);
    }
//    membuat method store yang digunakan untuk menyimpan data baru
    public function store(Request $request)
    {
//        melakukan validasi input
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required'
        ]);
//        membuat variabel usia yang akan menghitung usia sampai hari ini berdasarkan nilai dari tgl_lahir. digunakan library carbon
        $usia =  Carbon::parse($request->tgl_lahir)->age;
//        menyimpan data baru kedalam database dengan method create
        $data = Mahasiswa::create([
            'nim' => $request->nim,
            'nama'=> $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'usia' => $usia
        ]);
//        mereturn / kembali ke halaman sebelumnya dan mengembalikan pesan sukses jika data sukses disimpan
        return redirect()->back()->with('message', 'Data Mahasiswa Baru Berhasil Dibuat!');
    }
//    membuat method untuk mengupdate perubahan pada data
    public function update(Request $request, string $id)
    {
//        melakukan validasi input
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required'
        ]);
//        membuat variabel usia yang otomatis menghitung tahun sampai dengan hari ini, berdasarkan nilai tgl_lahir
        $usia =  Carbon::parse($request->tgl_lahir)->age;
//        mengupdate data dengan id sesuai data yang dipilih
        $data = Mahasiswa::where('id', $id)->update([
            'nim' => $request->nim,
            'nama'=> $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'usia' => $usia
        ]);
//        kembali ke halaman sebelumnya dengan membawa pesan sukses jika data berhasil diubah
        return redirect()->back()->with('message', 'Data Mahasiswa Berhasil Diubah!');
    }
//    membuat method destroy untuk menghapus data dari database berdasarkan id
    public function destroy(string $id)
    {
//        menghapus data mahasiswa berdasarkan id
        Mahasiswa::destroy(($id));
//        kembali ke halaman sebelumnya dengan pesan sukses jika data berhasil terhapus
        return redirect()->back()->with('success', 'Data Mahasiswa Berhasil Dihapus!');
    }
}
