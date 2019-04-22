<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class CrudController extends Controller
{
  public function index()
  {
    $buku = Buku::all();
    return view('home', ['buku' => $buku]);
  }

  public function add(Request $request)
    {
      $this->validate($request, [
        'judul' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'pengarang' => 'required'

      ]);
      $buku = new Buku;
      $buku->judul=$request->input('judul');
      $buku->penerbit=$request->input('penerbit');
      $buku->tahun_terbit=$request->input('tahun_terbit');
      $buku->pengarang=$request->input('pengarang');
      $buku->save();
      return redirect('')->with('info', 'Buku Baru Telah Ditambahkan');
    }
}
