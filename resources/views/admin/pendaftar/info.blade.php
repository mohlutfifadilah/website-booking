@section('title', 'Detail Data')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Detail Data Pendaftar</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @foreach ($pendaftar as $p)
                                <div class="mb-3">
                                    <h4 class="mt-3">Pendaki {{ $loop->iteration }}</h4>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <dl>
                                            <dt>Nama</dt>
                                            <dd>{{ $p->nama }}</dd>
                                            <dt>Usia</dt>
                                            <dd>{{ $p->usia }}</dd>
                                            <dt>Alamat</dt>
                                            <dd>{{ $p->alamat }}</dd>
                                        </dl>
                                    </div>
                                    <div class="col">
                                        <dl>
                                            <dt>No. Telepon</dt>
                                            <dd>{{ $p->no_telepon }}</dd>
                                            <dt>No. Telepon Darurat</dt>
                                            <dd>{{ $p->no_telepon_darurat }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            @endforeach
                            @if ($p->status != TRUE)
                                <form action="{{ route('is_success', $p->id) }}" method="get">
                                    @csrf
                                    <div class="d-flex justify-content-end mb-3">
                                        <button href="{{ route('is_success', $p->id) }}" class="btn btn-sm btn-warning ml-auto" onclick="return confirm('Registrasi selesai ?');"><i class="fas fa-check-circle"></i> Selesai</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                @include('admin.template.footer')
