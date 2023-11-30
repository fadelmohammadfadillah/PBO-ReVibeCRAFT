@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Tambah FeedBack')
@section('content')
<!-- ... (bagian yang sama seperti sebelumnya) ... -->
    <form method="post" action="{{route('feedback.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- ... (bagian yang sama seperti sebelumnya) ... -->
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
            <!-- ... (bagian yang sama seperti sebelumnya) ... -->
        </div>
        <input type="hidden" name="user_id" id="userId" value="">
    </form>
</section>

<!-- ... (bagian yang sama seperti sebelumnya) ... -->
