@section('title', 'Tambah Data')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Tambah Data Berita</h1>

                    <form action="{{ route('berita.store') }} " method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Upload Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" aria-describedby="gambar">
                            @if (session('error'))
                                <small id="gambar" class="text-danger ml-2">
                                    {{ session('error') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" aria-describedby="judul">
                            @if (session('error'))
                                <small id="judul" class="text-danger ml-2">
                                    {{ session('error') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="isi" rows="6" placeholder="Isi berita" name="isi" aria-describedby="isi"></textarea>
                            @if (session('error'))
                                <small id="isi" class="text-danger ml-2">
                                    {{ session('error') }}
                                </small>
                            @endif
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mb-3">Tambah</button>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

                @include('admin.template.footer')
