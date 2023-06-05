@extends('layout.admin')
@section('content')
    <section class="content">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="container">
                        <!--
               <div class="row g-3 align-items-center mt-2">
                 <div class="col-auto">
                   <label for="inputPassword6" class="col-form-label">Cari Nama Dokter</label>
                 </div>
                   <div class="col-auto">
                      <input type="search" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
                   </div>
               </div>-->
                        <div class="row">
                            <a href="/exportgurupdf" class="btn btn-outline-info mb-3">Export PDF</a>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Data Pasien
                                        </h3>
                                        <div class="card-tools">
                                            <a href="{{ route('formPasien') }}" class="btn btn-outline-success btn-sm">Tambah Data Pasien</a>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nomer</th>
                                                        <th scope="col">Kode Pasien</th>
                                                        <th scope="col">Nama Pasien</th>
                                                        <th scope="col">Alamat Pasien</th>
                                                        <th scope="col">Umur Pasien</th>
                                                        <th scope="col">Jenis Kelamin</th>
                                                        <th scope="col">Golongan Darah</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($pasien as $key)
                                                        <tr>
                                                            <th scope="row">{{ $no++ }}</th>
                                                            <td>{{ $key->kode_pasien }}</td>
                                                            <td>{{ $key->Nama_pasien }}</td>
                                                            <td>{{ $key->Alamat_Pasien }}</td>
                                                            <td>{{ $key->Umur_pasien }}</td>
                                                            <td>{{ $key->Jenis_kelamin }}</td>
                                                            <td>{{ $key->gol_darah }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info btn-sm mx-1">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                    <form action="{{ route('deletePasien', $key->kode_pasien) }}" method="post" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                            <button class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure delete?')">
                                                                              <i class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                      </form>
                                                            </td>
                                                        <tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </section>
@endsection