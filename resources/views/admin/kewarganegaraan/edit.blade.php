@section('title', 'Edit Data')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Edit Data Kewarganegaraan</h1>

                    <form action="{{ route('kewarganegaraan.update', $kw->id) }} " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" id="kewarganegaraan" placeholder="Jenis Kewarganegaraan" name="kewarganegaraan" aria-describedby="kewarganegaraan" value="{{ $kw->jenis_kewarganegaraan }}">
                            @if (session('error'))
                                <small id="kewarganegaraan" class="text-danger ml-2">
                                    {{ session('error') }}
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
