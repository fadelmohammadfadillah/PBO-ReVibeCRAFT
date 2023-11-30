@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Tambah FeedBack')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Feedback</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Feefback</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- ... (bagian yang sama seperti sebelumnya) ... -->
<section class="content">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        {{ session('status') }}
      </div>
    @endif
    <form method="post" action="{{route('feedback.store')}}" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Feedback</h3>
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
                            class="form-control @error('nama_pengguna') is-invalid @enderror" 
                            placeholder="Masukkan Nama"
                            value="{{ old('nama_pengguna') }}" 
                            required="required"
                            autocomplete="nama_pengguna">
                        @error('nama_pengguna')
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

<!-- ... (bagian yang sama seperti sebelumnya) ... -->
