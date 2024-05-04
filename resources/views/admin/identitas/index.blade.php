@section('title', 'Identitas')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Identitas</h1>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('identitas.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jenis Identitas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($identitas as $i)
                                            <tr>
                                                <td>{{ $i->jenis_identitas }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-sm btn-warning" href="{{ route('identitas.edit', $i->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                                        <form action="{{ route('identitas.destroy', $i->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button href="{{ route('identitas.destroy', $i->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapusnya ?');"><i class="fas fa-trash"></i> Hapus</button>
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
