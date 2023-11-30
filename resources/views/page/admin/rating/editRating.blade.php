@extends('layouts.base_admin.base_dashboard') @section('judul', 'Tambah FeedBack')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Feedback</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Feedback</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        {{ session('status') }}
      </div>
    @endif
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Informasi FeedBack</h3>
                        <div class="card-tools">
                            <button
                                type="button"
                                class="btn btn-tool"
                                data-card-widget="collapse"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Nama</label>
                            <input
                                type="text"
                                id="inputnama"
                                name="nama_pengguna"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan Nama"
                                value="{{ old('judul_feedback') }}"
                                required="required"
                                autocomplete="name">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputRating">Rating Aplikasi</label>
                            <select
                                id="inputrating"
                                name="rating"
                                class="form-control @error('rating') is-invalid @enderror"
                                required="required"
                            >
                                <option value="" disabled selected></option>
                                <option value="Bagus Sekali">Bagus Sekali</option>
                                <option value="Bagus">Bagus</option>
                                <option value="Buruk">Buruk</option>
                            </select>
                            @error('rating')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAlasan">Alasan</label>
                            <textarea
                                id="inputalasan"
                                name="alasan"
                                class="form-control @error('alasan') is-invalid @enderror"
                                placeholder="Masukkan Alasan"
                                required="required"
                                autocomplete="alasan"
                            >{{ old('alasan') }}</textarea>
                            @error('alasan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Tambah Feedback" class="btn btn-success float-right">
            </div>
        </div>
        <input type="hidden" name="user_id" id="userId" value="">
    </form>
</section>

{{-- @endsection @section('script_footer')
<script>
    inputFoto.onchange = evt => {
        const [file] = inputFoto.files
        if (file) {
            prevImg.src = URL.createObjectURL(file)
        }
    }
</script> --}}

<script>
    console.log(window.location.search);
    let queryURL = new URLSearchParams(window.location.search);
    const idFeedback = queryURL.get('id');
    // /tutorialDetail/{id}
    console.log('/feedbackDetail/'+idFeedback);
    $(document).ready(function(){
        $.ajax({
            url: '/dashboard/admin/feedback/feedbackDetail/'+idFeedback,
            type: 'GET',
            success: function(response){
                // console.log(`storage/assets/fotos/${response.data.foto}`);
                $('#userId').val(response.data.user_id);
                $('#inputnama').val(response.data.nama_pengguna);
                $('#inputrating').val(response.data.rating);
                $('#inputalasan').val(response.data.alasan);
                // $('#prevImg').attr("src", `{{ asset('storage/assets/fotos/${response.data.foto}')}}`);
                $('form').attr('action', '/dashboard/admin/feedback/'+idFeedback+'/edit');
            },
            error: function(error){
                console.error('error', error);
            }
        });
    });

</script>
@endsection
