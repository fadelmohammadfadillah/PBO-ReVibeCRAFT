@extends('layouts.base_admin.base_dashboard') @section('judul', 'report Tutorial')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Report Tutorial</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">laporkan tutorial</li>
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
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Laporkan Tutorial</h3>
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
                            <label for="inputName">Judul</label>
                            <input
                                type="text"
                                id="inputJudul"
                                name="judul_tutorial"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan Judul"
                                value="{{ old('judul_tutorial') }}"
                                required="required"
                                autocomplete="name">
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputDeskripsi">Deskripsi kesalahan</label>
                            <textarea
                                id="inputDeskripsi"
                                name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan Deskripsi"
                                required="required"
                                autocomplete="deskripsi"
                            >{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
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
                <a href="{{ route('tutorial.index') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Laporkan" class="btn btn-danger float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->

@endsection @section('script_footer')
<script>
    console.log(window.location.search);
    let queryURL = new URLSearchParams(window.location.search);
    const idTutorial = queryURL.get('id');
    console.log('/tutorialReport/'+idTutorial);
    $(document).ready(function(){
        $.ajax({
            url: '/dashboard/admin/report/tutorialReport/'+idTutorial,
            type: 'GET',
            success: function(response){
                $('#inputJudul').val(response.data.judul_tutorial);
                $('form').attr('action', '/dashboard/admin/report/'+idTutorial+'/report');
            },
            error: function(error){
                console.error('error', error);
            }
        });
    });

</script>
@endsection
