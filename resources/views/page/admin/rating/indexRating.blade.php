@extends('layouts.base_admin.base_dashboard')
@section('judul', 'List Rating')
@section('script_head')

<link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Rating</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Akun</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Data berhasil dihapus!</h4>
        {{ session('status') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Data gagal dihapus!</h4>
        {{ session('error') }}
    </div>
    @endif
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="remove"
                    title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0" style="margin: 20px">
            <table
                id="previewRating"
                class="table table-striped table-bordered display"
                style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        {{-- <th>UserId</th> --}}
                        <th>Tutorial id</th>
                        <th>Rating</th>
                        <th>deksripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection @section('script_footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#previewRating').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: '{!! route('rating.dataRating') !!}',

            error: function(xhr, error, thrown) {
                alert('DataTables error: ' + thrown + ' (Status: ' + xhr.status + ')');
            }
        },
            columns: [
                { data: 'id', name: 'id' },
                //{ data: 'user_id', name: 'user.id' },
                { data: 'rating_id', name: 'rating.id' },
                { data: 'rating', name: 'rating' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
<script>
   $('#previewRating').on('click', '.hapusData', function () {
    var id = $(this).data("id");
    var url = $(this).data("url");
    Swal
        .fire({
            title: 'Apa kamu yakin?',
            text: "Kamu tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        })
        .then((result) => {
            if (result.isConfirmed) {
                // console.log();
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": "{{csrf_token()}}"
                    },
                    success: function (response) {
                        // console.log();
                        Swal.fire('Terhapus!', response.msg, 'success');
                        $('#previewAkun').DataTable().ajax.reload();
                    }
                });
            }
        })
});
</script>
@endsection
