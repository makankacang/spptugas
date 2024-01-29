<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\order;
use App\Models\customer;
use App\Models\siswa;
use App\Models\spp;
use App\Models\pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\Histori; // Make sure to import the Histori model

class TransaksiController extends Controller
{
    public function homes(){
        $rec = histori::all();
        return view('tampil/home',compact('rec'));
    }






    public function siswa()
    {
        $siswa = siswa::all();
        $kelas = kelas::all();
        return view('tampil/siswa', compact('siswa', 'kelas'));
    }
    public function kelas()
    {
        $kelas = kelas::all();
        return view('tampil/kelas', compact('kelas'));
    }
    public function pembayaran()
    {
        $pembayaran = pembayaran::all();
        $siswa = siswa::all();
        return view('tampil/pembayaran', compact('pembayaran', 'siswa'));
    }

    public function create()
    {
        // Add logic to fetch required data for dropdowns, if any
        return view('siswa.create');
    }










    public function customer(){
        $ang = customer::all();
        return view('tampil/customer',compact('ang'));
    }
    public function histori(){
        $his = histori::all();
        return view('tampil/histori',compact('his'));
        return view('tampil/home',compact('rec'));
    }
    public function datau(){
        return view('tampil/datauser', [
            'users' => User::all()
        ]);
    }
    public function order(){
        $ord = order::all();
        $ang = customer::all();
        return view('tampil/order',compact('ord','ang'));
    }


    public function custinput(Request $gaquest){
        customer::create($gaquest->all());
        return redirect()->route('customer')->with('success','Data berhasil di Tambah');
    }
    public function ordinput(Request $gaquest){
        order::create($gaquest->all());
        return redirect()->route('order')->with('success','Data berhasil di Tambah');
    }
    public function kelasinput(Request $gaquest){
        kelas::create($gaquest->all());
        return redirect()->route('kelas')->with('success','Data berhasil di Tambah');
    }
    public function pembayaraninput(Request $gaquest)
{
    $pembayaran = new pembayaran;

    // Assuming $siswa is the selected student from the dropdown
    $siswa = siswa::find($gaquest->nisn);

    $pembayaran->id_pembayaran = $gaquest->id_pembayaran;
    $pembayaran->admin = $gaquest->admin;
    $pembayaran->nisn = $gaquest->nisn;
    $pembayaran->tgl_bayar = $gaquest->tgl_bayar;
    $pembayaran->bulan_dibayar = $gaquest->bulan_dibayar;
    $pembayaran->tahun_dibayar = $gaquest->tahun_dibayar;
    $pembayaran->semester = $gaquest->semester;

    // Calculate jumlah_bayar based on semester (assuming 330,000 is multiplied by the semester)
    $pembayaran->jumlah_bayar = 330000 * $gaquest->semester;

    // Update the id_spp in the pembayaran table using the value from $siswa->nis
    $pembayaran->id_spp = $siswa->nis;

    $pembayaran->save();

    return redirect()->route('pembayaran')->with('success', 'Data berhasil di Tambah');
}



public function tambahpembayaran($id_pembayaran)
{
    // Retrieve the pembayaran record
    $pembayaran = pembayaran::find($id_pembayaran);

    // Assuming $siswa is the related student
    $siswa = siswa::where('nisn', $pembayaran->nisn)->first();

    // Create a new record in histori
    histori::create([
        'id_pembayaran' => $pembayaran->id_pembayaran,
        'nisn' => $pembayaran->nisn,
        'tgl_bayar' => $pembayaran->tgl_bayar,
        'bulan_dibayar' => $pembayaran->bulan_dibayar,
        'tahun_dibayar' => $pembayaran->tahun_dibayar,
        'id_spp' => $pembayaran->id_spp,
        'jumlah_bayar' => $pembayaran->jumlah_bayar,
        'semester' => $pembayaran->semester,
        'admin' => $pembayaran->admin,
        'created_at' => $pembayaran->created_at,
        'updated_at' => $pembayaran->updated_at,
        // Add other fields as needed
    ]);

    // Assuming $siswa is the related student
    $siswa = siswa::where('nisn', $pembayaran->nisn)->first();

    // Update the spp table
    $spp = spp::where('id_spp', $siswa->nis)->first();
    $spp->nominal += $pembayaran->jumlah_bayar; // Adjust the logic based on your needs
    $spp->semester += $pembayaran->semester; // Adjust the logic based on your needs
    $spp->save();

    // Delete the Pembayaran record
    $pembayaran->delete();

    // Redirect or return a response...
    return redirect()->route('pembayaran')->with('success', 'Nominal berhasil diupdate');
}


public function generateFaktur($id_pembayaran)
{
    // Retrieve the Pembayaran record
    $pembayaran = Pembayaran::find($id_pembayaran);

    // Pass the $pembayaran data to a faktur.blade.php view
    return view('tampil/faktur', ['pembayaran' => $pembayaran]);
}


    public function siswainput(Request $request)
{
    // Validate input data...

    // Save new siswa
    $siswa = siswa::create($request->all());

    // Create corresponding spp record
    $spp = new spp;
    $spp->tahun = date('Y'); // You may need to adjust this based on your requirements
    $spp->nominal = 0; // You can set the default value as needed
    $spp->id_spp = $siswa->nis; // Assuming nisn is the primary key
    
    $spp->save();

    $siswa->update(['id_spp' => $siswa->nis]);

    

    // Redirect or return a response...
    return redirect()->route('siswa')->with('success', 'Data berhasil di Tambah');
}


    
    public function custedit(Request $reqquest, $idc){
        $ang= customer::find($idc);
        $ang->update($reqquest->all());
        return redirect()->route('customer')->with('ubah','Data berhasil di Ubah');
    }
    public function siswaedit(Request $reqquest, $nisn){
        $nisn= siswa::find($nisn);
        $nisn->update($reqquest->all());
        return redirect()->route('siswa')->with('ubah','Data berhasil di Ubah');
    }
    public function kelasedit(Request $reqquest, $id_kelas){
        $id_kelas= kelas::find($id_kelas);
        $id_kelas->update($reqquest->all());
        return redirect()->route('kelas')->with('ubah','Data berhasil di Ubah');
    }
    public function ordedit(Request $reqquest, $id){
        $org= order::find($id);
        $org->update($reqquest->all());
        return redirect()->route('order')->with('ubah','Data berhasil di Ubah');
    }
    
    public function sppedit(Request $request, $id_spp)
{
    // Find the spp record
    $spp = spp::find($id_spp);

    // Update the spp record with the form data
    $spp->update($request->all());

    // Calculate the new nominal based on semester and a fixed value
    $fixedValue = 330000;

    $newNominal = $spp->semester * $fixedValue;

    // Update the nominal field in the spp table
    $spp->update(['nominal' => $newNominal]);

   

    // Redirect to the desired route with a success message
    return redirect()->route('siswa')->with('ubah', 'Data berhasil di Ubah');
}



    public function custhapus($idc){
        $ang = customer::find($idc);
        $ang->delete();
        return redirect()->route('customer')->with('hapus','Data berhasil di Hapus');
    }
    public function ordhapus($id){
        $ord = order::find($id);
        $ord->delete();
        return redirect()->route('order')->with('hapus','Data berhasil di Hapus');
    }
    public function siswahapus($nisn){
        $siswa = siswa::find($nisn);
        $siswa->delete();
        return redirect()->route('siswa')->with('hapus','Data berhasil di Hapus');
    }
    public function kelashapus($id_kelas){
        $kelas = kelas::find($id_kelas);
        $kelas->delete();
        return redirect()->route('kelas')->with('hapus','Data berhasil di Hapus');
    }
    public function pembayaranhapus($id_pembayaran){
        $pembayaran = pembayaran::find($id_pembayaran);
        $pembayaran->delete();
        return redirect()->route('pembayaran')->with('hapus','Data berhasil di Hapus');
    }
}
