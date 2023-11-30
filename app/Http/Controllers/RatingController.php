<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ratingcontroller extends Controller
{
    public function index(){
        return view('page.admin.rating.indexRating');
    }

    public function addRatingPage(){
        return view('page.admin.rating.addRating');
    }

    public function editRatingPage(){
        return view('page.admin.rating.editRating');
    }

    public function showDetail($id){
        $data = rating::findOrFail($id);
        $resource = [];
        $resource['id'] = $data->id;
        $resource['user_id'] = $data->user_id;
        $resource['rating_id'] = $data->rating_id;
        $resource['rating'] = $data->rating;
        $resource['deskripsi'] = $data->deskripsi;
        // $resource['alat'] = $data->alat;
        // $resource['langkah_tutorial'] = $data->langkah_tutorial;
        // $resource['foto'] = $data->foto;

        return response()->json([
            'data' => $resource,
            'response' => 200
        ]);
    }

    public function getDataRating(){
        $dataRating = Rating::select(['id', 'user_id', 'rating_id', 'rating', 'deskripsi']);
        return DataTables::of($dataRating)
        // ->addColumn('user_name', function ($feedback) {
        //     return $feedback->user->name;
        // })
        ->addColumn('action', function ($Rating) {
            // Tambahkan tombol aksi sesuai kebutuhan Anda
            return '<a href="'.route('rating.editPage', 'id='.$Rating->id).'" class="btn btn-info">Detail</a><a class="hapusData btn btn-danger" data-id="'.$Rating->id.'" data-url="'.route('rating.delete',$Rating->id).'">Hapus</a>';
        })
        ->make(true);
    }

    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'user_id' =>'required',
                'rating_id' => 'required',
                'rating'=> 'required',
                'deskripsi'=> 'required',
            ]);
        }catch(ValidationException $e){
            $response = [];
            $response['message'] = 'Validasi gagal';
            $response['errors'] = $e->errors();
            // dd($response);
        }
        // $thumbnailName = NULL;
        // if ($request->hasFile('foto')){
        //     $thumbnailName = Str::random(20) . '.webp';
        //     $webpImageData = Image::make($request->foto);
        //     $webpImageData->encode('webp');
        //     $webpImageData->resize(200, 250);
        //     Storage::put('public/assets/fotos/' . $thumbnailName, (string) $webpImageData);
        // }
        // $validatedData['foto'] = $thumbnailName;
        $feedback = Rating::create($validatedData);
        return redirect()->route('rating.tambah')->with('status', 'data telah berhasil disimpan di database');
    }

    public function editRating($id, Request $request){
        // dd($request);
        //fungsi untuk edit
        $dataRating = Rating::findOrFail($id);
        $this->validate($request, [
            'user_id' =>'required',
            'rating_id' => 'required',
            'rating'=> 'required',
            'deskripsi'=> 'required',
        ]);
        // $thumbnailName = $dataFeedback->foto;
        // if ($request->hasFile('foto')) {
        //     # delete old img
        //     if ($thumbnailName && file_exists(public_path().$thumbnailName)) {
        //         unlink(public_path().$thumbnailName);
        //     }
        //     $thumbnailName = Str::random(20) . '.webp';
        //     $webpImageData = Image::make($request->foto);
        //     $webpImageData->encode('webp');
        //     $webpImageData->resize(200, 250);
        //     Storage::put('public/assets/fotos/' . $thumbnailName, (string) $webpImageData);
        // }
        $dataRating->update([
            'user_id' => $request->user_id,
            'rating_id' => $request->rating_id,
            'rating'=> $request->rating,
            'deskripsi'=> $request->deskripsi,
        ]);
        return redirect()->route('rating.editPage')->with('status', 'Data telah tersimpan di database');
    }

    public function deleteRating($id){
        //fungsi untuk delete
        try{
            $destroy = Rating::findOrFail($id);
            $destroy->delete();

            return response()->json([
                'message'   => 'Tutorial deleted successfully',
                'status'    => 200
            ]);;
        }catch(\Exception){
            return response()->json([
                'message'   => 'Not Found',
                'status'    => 404
            ]);
        }
    }
}