@section('title', 'Kuota')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Kuota</h1>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('kuota.create') }}" class="btn btn-success mb-3"><i class="fas fa-sync-alt"></i> Refresh</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kuota</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kuota as $k)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}</td>
                                                <td>{{ $k->kuota_sisa }} / {{ $k->kuota_full }}</td>
                                                <td>
                                                    @if ($k->kuota_sisa === $k->kuota_full)
                                                        <span class="badge badge-danger">Penuh</span>
                                                    @else
                                                        <span class="badge badge-success">Tersedia</span>
                                                    @endif
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
