<?php
//include tiap dependency dan model yang diperlukan
namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    //membuat method untuk menampilkan halaman index di home
    public function index()
    {
        return view('home.index', [
            //define variable yang menyimpan model/data mahasiswa dengan berdasarkan NIM yang terurut secara descending
            'mahasiswas' => Mahasiswa::orderBy('nim', 'DESC')->get()
        ]);
    }
}
