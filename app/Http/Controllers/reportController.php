<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class reportController extends Controller
{
    public function index()
    {
        
        return view('page.admin.tutorial.report');
    }

    public function list()
    {
        return view('page.admin.tutorial.tutorialReport');
    }

    public function store(Request $request,$id)
    {
        $data = Tutorial::findOrFail($id);
        try{
            $validatedData = $request->validate([
                'judul_tutorial' => 'required',
                'deskripsi'=> 'required',
            ]);
        }catch(ValidationException $e){
            $response = [];
            $response['message'] = 'Validasi gagal';
            $response['errors'] = $e->errors();
            dd($response);
        }
        $validatedData['tutorial_id'] = $data->id;
        $report = Report::create($validatedData);

        return redirect()->route('tutorial.index')->with('report', 'data telah berhasil dilaporkan');
    }

    public function getDataReport()
    {
        try {
            $dataReport = Report::select(['id', 'tutorial_id', 'judul_tutorial', 'deskripsi']);
            // dd($dataReport); 
    
            return DataTables::of($dataReport)
            ->addColumn('action', function ($report) {
                return '<a class="hapusData btn btn-danger" data-id="'.$report->id.'" data-url="'.route('report.delete', $report->id).'">Hapus</a>';
            })
            ->make(true);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    


    public function deleteReport($id){
        //fungsi untuk delete
        try{
            $destroy = Report::findOrFail($id);
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

    public function showReport($id){
        $data = Tutorial::findOrFail($id);
        $resource = [];
        $resource['id'] = $data->id;
        $resource['user_id'] = $data->user_id;
        $resource['judul_tutorial'] = $data->judul_tutorial;

        return response()->json([
            'data' => $resource,
            'response' => 200
        ]);
    }
}
