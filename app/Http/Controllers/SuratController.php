<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use Illuminate\Support\Facades\Storage;


class SuratController extends Controller
{

  public function home() //Controller ke halaman home
  {
     $data = DB::table('data')->get();
     return view('home', compact('data'));
  }

  public function about() //Controller ke halaman About
  {
      return view('about');
  }

  public function tambahSurat() //Controller ke halaman tambah surat
  {
      return view('tambah');
  }

  public function storeSurat(Request $request) //Controller menyimpan data surat
  {

      $this ->validate($request, [
          'file' => 'required|mimes:pdf',
      ],[
          'file.required' => 'File harus di isi !',
          'file.mimes' => 'File harus berformat .Pdf !',
      ]);

      $data = new data();

      $file = $request->file;
      $filename = time()."_".$file->getClientOriginalName();
      $request->file->move('assets',$filename);
      $data->file=$filename;

      $data->nomor=$request->nomor;
      $data->kategori=$request->kategori;
      $data->judul=$request->judul;
      $data->save();

      return redirect()->back()->with('status', 'Data berhasil disimpan !');
  }

    public function lihatSurat($id) //Controller melihat surat by id
    {
        $data = data::find($id);
        return view('lihat', compact('data'));
    }

    public function editSurat($id) //Controller ke halaman edit
    {
        $data = DB::table('data')->where('id', $id)->first();
        return view('edit', compact('data'));
    }
    public function updateSurat(Request $request, $id) //Controller mengubah data surat
    {
        $file = $request->file('file');

        $filename = time()."_".$file->getClientOriginalName();

          // mengisi nama folder tempat tujuan file
        $tujuan_upload = 'assets';
        $file->move($tujuan_upload,$filename);

        DB::table('data')->where('id', $id)
        ->update([
            'nomor' => $request->nomor,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'file' => $filename
        ]);

        return redirect()->back()->with('status', 'Data berhasil diupdate !');
    }

  public function hapus($id) //Controller menghapus data surat
  {
    DB::table('data')->where('id',$id)->delete();
    return redirect('home')->with('status', 'Data berhasil dihapus !');
  }

  public function downloadSurat(Request $request,$file) //Controller mendownload surat
  {
      return response()->download(public_path('assets/'.$file));
  }
}
