<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FeedbackController extends Controller
{
    public function index(){
        return view('page.admin.feedback.indexFeedback');
    }

    public function addFeedbackPage(){
        return view('page.admin.feedback.addFeedback');
    }

    public function editFeedbackPage(){
        return view('page.admin.feedback.editFeedback');
    }

    public function viewFormFeedback(){
        $userId = Auth::user()->id;
        return view('feedbackPage', compact('userId'));
    }

    public function showDetail($id){
        $data = Feedback::findOrFail($id);
        $resource = [];
        $resource['id'] = $data->id;
        // $resource['user_id'] = $data->user_id;
        $resource['nama_pengguna'] = $data->nama_pengguna;
        $resource['rating'] = $data->rating;
        $resource['alasan'] = $data->alasan;
        // $resource['alat'] = $data->alat;
        // $resource['langkah_tutorial'] = $data->langkah_tutorial;
        // $resource['foto'] = $data->foto;

        return response()->json([
            'data' => $resource,
            'response' => 200
        ]);
    }

    public function getDataFeedback(){
        $dataFeedback = Feedback::select(['id', 'user_id', 'nama_pengguna', 'rating', 'alasan']);
        return DataTables::of($dataFeedback)
        // ->addColumn('user_name', function ($feedback) {
        //     return $feedback->user->name;
        // })
        ->addColumn('action', function ($feedback) {
            // Tambahkan tombol aksi sesuai kebutuhan Anda
            return '<a href="'.route('feedback.editPage', 'id='.$feedback->id).'" class="btn btn-info">Detail</a><a class="hapusData btn btn-danger" data-id="'.$feedback->id.'" data-url="'.route('feedback.delete',$feedback->id).'">Hapus</a>';
        })
        ->make(true);
    }

    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'user_id' =>'required',
                'nama_pengguna' => 'required',
                'rating'=> 'required',
                'alasan'=> 'required',
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
        $feedback = Feedback::create($validatedData);
        if($request->user_id == 1){
            return redirect()->route('feedback.tambah')->with('status', 'data telah berhasil disimpan di database');
        }else {
            return redirect()->route('feedbackPage')->with('status', 'data feedback telah berhasil disimpan di database');
        }
    }

    public function editFeedback($id, Request $request){
        // dd($request);
        //fungsi untuk edit
        $dataFeedback = Feedback::findOrFail($id);
        $this->validate($request, [
            'user_id' =>'required',
            'nama_pengguna' => 'required',
            'rating'=> 'required',
            'alasan'=> 'required',
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
        $dataFeedback->update([
            'user_id' => $request->user_id,
            'nama_pengguna' => $request->nama_pengguna,
            'rating'=> $request->rating,
            'alasan'=> $request->alasan,
        ]);
        return redirect()->route('feedback.editPage')->with('status', 'Data telah tersimpan di database');
    }

    public function deleteFeedback($id){
        //fungsi untuk delete
        try{
            $destroy = Feedback::findOrFail($id);
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
