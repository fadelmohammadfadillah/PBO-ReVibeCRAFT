@extends('layouts.base_admin.base_dashboard') @section('judul', 'Tambah FeedBack')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Rating</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Rating</li>
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
    <form method="post" action="{{route('rating.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Rating</h3>
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
                            <label for="inputRatingId">Tutorial Id </label>
                            <input
                                type="text"
                                id="inputratingid"
                                name="rating_id"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan Rating Id"
                                value="{{ old('rating_id') }}"
                                required="required"
                                autocomplete="rating_id">
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
                                <option value="" disabled selected>Masukkan Rating  </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            @error('rating')
                            <span class="invalid-rating" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputDeskripsi">deskripsi</label>
                            <textarea
                                id="inputdeskripsi"
                                name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan Deskripsi"
                                required="required"
                                autocomplete="deskripsi"
                            >{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <span class="invalid-deskripsi" role="alert">
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
                <input type="submit" value="Tambah Rating" class="btn btn-success float-right">
            </div>
        </div>
        <input type="hidden" name="user_id" id="userId" value="">
    </form>
</section>

<!-- /.content -->
@endsection @section('script_footer')
<script>
    inputFoto.onchange = evt => {
        const [file] = inputFoto.files
        if (file) {
            prevImg.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    $(document).ready(function(){
        $.ajax({
        url: '{{ route("akun.getUserId")}}',
        type: 'GET',
        success: function(response){
            let userId = response.user_id;
            console.log('user id', userId);
            $('#userId').val(userId);
        },
        error: function(error){
            console.error('error', error);
        }
    })
    })
</script>
@endsection