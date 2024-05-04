@section('title', 'Tambah Data')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Tambah Data Identitas</h1>

                    <form action="{{ route('identitas.store') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="identitas" placeholder="Jenis identitas" name="identitas" aria-describedby="identitas">
                            @if (session('error'))
                                <small id="identitas" class="text-danger ml-2">
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
