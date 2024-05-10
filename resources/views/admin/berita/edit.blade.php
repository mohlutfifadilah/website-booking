@section('title', 'Edit Data')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Edit Data Berita</h1>

                    <form action="{{ route('berita.update', $berita->id) }} " method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="gambar">Upload Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" aria-describedby="gambar">
                            @if (session('gambar'))
                                <small id="gambar" class="text-danger ml-2">
                                    {{ session('gambar') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" aria-describedby="judul" value="{{ $berita->judul }}">
                            @if (session('judul'))
                                <small id="judul" class="text-danger ml-2">
                                    {{ session('judul') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="isi" rows="6" placeholder="Isi berita" name="isi" aria-describedby="isi">{{ $berita->isi }}</textarea>
                            @if (session('isi'))
                                <small id="isi" class="text-danger ml-2">
                                    {{ session('isi') }}
                                </small>
                            @endif
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-warning mb-3">Edit</button>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

                @include('admin.template.footer')
