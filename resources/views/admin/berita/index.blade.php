@section('title', 'Berita')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Berita</h1>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('berita.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Isi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berita as $b)
                                            <tr>
                                                @if ($b->gambar)
                                                    <td><img src="{{ asset('storage/gambar/' . $b->gambar ) }}" alt="" class="img-fluid" style="width: 150px; height: 150px;"></td>
                                                @else
                                                    <td class="text-secondary">Belum ada gambar</td>
                                                @endif
                                                <td>{{ $b->judul }}</td>
                                                <td>{!! $b->isi !!}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-sm btn-warning" href="{{ route('berita.edit', $b->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                                        <form action="{{ route('berita.destroy', $b->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button href="{{ route('berita.destroy', $b->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapusnya ?');"><i class="fas fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                @include('admin.template.footer')
