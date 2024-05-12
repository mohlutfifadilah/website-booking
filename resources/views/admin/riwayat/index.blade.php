@section('title', 'Riwayat')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Riwayat</h1>

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
                                            <th>No Identitas</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Naik</th>
                                            <th>Tanggal Turun</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayat as $r)
                                            <tr>
                                                <td>{{ $r->kode_pendaki }}</td>
                                                <td>{{ $r->nama }}</td>
                                                @php
                                                    $user = \App\Models\User::where('kode_pendaki', $r->kode_pendaki)->first();
                                                    $identitas = \App\Models\Identitas::where('id', $user->id_identitas)->first();
                                                @endphp
                                                <td>&#91; {{ $identitas->jenis_identitas }} &#93; {{ $user->nomor_identitas }}</td>
                                                <td>{{ $r->alamat }}</td>
                                                <td>{{ $r->tanggal_naik }}</td>
                                                <td>{{ $r->tanggal_turun }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-sm btn-info" href="{{ route('riwayat.show', $r->id) }}"><i class="fas fa-info-circle"></i> Detail</a>
                                                        {{-- <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $p->id) }}"><i class="fas fa-edit"></i> Ubah</a>
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
