@section('title', 'Detail Data')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Detail Data Pengguna</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('storage/identitas/' . $user->foto_identitas ) }}" alt="" class="img-fluid" style="width: 150px; height: 150px;">
                                <h4>Kode Pendaki : {{ $user->kode_pendaki }}</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    @php
                                        $kewarganegaraan = \App\Models\Kewarganegaraan::find($user->id_kewarganegaraan);
                                        $identitas = \App\Models\Identitas::find($user->id_identitas);
                                    @endphp
                                    <dl>
                                        <dt>Kewarganegaraan</dt>
                                        <dd>{{ $kewarganegaraan->jenis_kewarganegaraan }}</dd>
                                        <dt>Identias</dt>
                                        <dd>{{ $identitas->jenis_identitas }}</dd>
                                        <dt>Nama Lengkap</dt>
                                        <dd>{{ $user->nama_lengkap }}</dd>
                                        <dt>Usia</dt>
                                        <dd>{{ $user->usia }}</dd>
                                        <dt>Tinggi Badan</dt>
                                        <dd>{{ $user->tinggi_badan }}</dd>
                                        <dt>Berat Badan</dt>
                                        <dd>{{ $user->berat_badan }}</dd>
                                    </dl>
                                </div>
                                <div class="col">
                                    <dl>
                                        <dt>Nomor KTP</dt>
                                        <dd>{{ $user->nomor_ktp }}</dd>
                                        <dt>No. Telepon</dt>
                                        <dd>{{ $user->no_telepon }}</dd>
                                        <dt>Email</dt>
                                        <dd>{{ $user->email }}</dd>
                                        <dd>Alamat</dd>
                                        <dt>{{ $user->alamat }}</dt>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                @include('admin.template.footer')
