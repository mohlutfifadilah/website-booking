@section('title', 'Detail Data')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Detail Data Riwayat</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @foreach ($riwayat as $r)
                                <div class="mb-3">
                                    <h4 class="mt-3">Pendaki {{ $loop->iteration }}</h4>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <dl>
                                            <dt>Nama</dt>
                                            <dd>{{ $r->nama }}</dd>
                                            <dt>Usia</dt>
                                            <dd>{{ $r->usia }}</dd>
                                            <dt>Alamat</dt>
                                            <dd>{{ $r->alamat }}</dd>
                                        </dl>
                                    </div>
                                    <div class="col">
                                        <dl>
                                            <dt>No. Telepon</dt>
                                            <dd>{{ $r->no_telepon }}</dd>
                                            <dt>No. Telepon Darurat</dt>
                                            <dd>{{ $r->no_telepon_darurat }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                @include('admin.template.footer')
