@section('title', 'Blacklist')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Blacklist</h1>

                    {{-- <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('users.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah</a>
                    </div> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Pendaki</th>
                                            <th>Nama Lengkap</th>
                                            <th>Deskripsi</th>
                                            <th>Lama Hari</th>
                                            <th>Jangka Waktu</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                            <tr>
                                                <td>{{ $u->kode_pendaki }}</td>
                                                <td>{{ $u->nama_lengkap }}</td>
                                                <td>{{ $u->deskripsi }}</td>
                                                <td>{{ $u->lama }} hari</td>
                                                <td>{{ $u->jangka }}</td>
                                                @if ($u->status != TRUE)
                                                    <td><span class="badge badge-danger">Blacklist</span></td>
                                                @else
                                                    {{-- <td><span class="badge badge-success">Verifikasi</span></td> --}}
                                                @endif
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-sm btn-info" href="{{ route('users.show', $u->id) }}"><i class="fas fa-info-circle"></i> Detail</a>
                                                        {{-- <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $u->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                                        <form action="{{ route('users.destroy', $u->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button href="{{ route('users.destroy', $u->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapusnya ?');"><i class="fas fa-trash"></i> Hapus</button>
                                                        </form> --}}
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
