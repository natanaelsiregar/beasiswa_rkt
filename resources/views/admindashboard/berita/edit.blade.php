@include('admindashboard.templateadmin.header')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            {{-- <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic Table</h4>
                  <p class="card-description">
                    Add class <code>.table</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Profile</th>
                          <th>VatNo.</th>
                          <th>Created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>53275532</td>
                          <td>15 May 2017</td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>53275533</td>
                          <td>14 May 2017</td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>53275534</td>
                          <td>16 May 2017</td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td>20 May 2017</td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hoverable Table</h4>
                  <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Sale</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>Premier</td>
                          <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> --}}
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data</h4>
                  <p class="card-description">
                    Berita Beasiswa
                  </p>
                  <form class="forms-sample" action="{{route('berita.ubah',$update->id)}}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-control @error('title') is-invalid @enderror" value="{{$update->title}}">
                      <label for="exampleInputUsername1">Judul</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Judul">
                      @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                    </div>
                    {{-- <div class="form-control">
                      <label for="exampleInputEmail1">Jenis Kegiatan</label>
                      <input type="email" class="form-control" id="tags" name="tags" placeholder="Jenis Kegiatan" value="{{$update->tags}}">
                    </div> --}}
                    <div class="form-control @error('caption') is-invalid @enderror">
                      <label for="exampleInputPassword1">Deskripsi Singkat</label>
                      <input type="password" class="form-control" id="caption" name="caption" placeholder="Deskripsi Singkat" value="{{$update->caption}}">
                      @error('caption')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Photo</label>
                     <div class="col-sm-9">
                                            <img class="img-preview img-fluid mb-3 col-sm-5" alt="" src="{{url('images/eventwisata/'.$update->file_foto)}}">

                                            <div class="custom-file">

                                                <input type="file" class="custom-file-input" id="gambarevent" onchange="previewImage()" name="file_foto" value="{{$update->file_foto}}">

                                                <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                                <br/><label style="color:red">Maks. Ukuran: 5MB <br/> Maks. Lebar: 1200 Pixel</label>
                                            </div>
                                        </div>
                    </div> --}}
                    {{-- <div class="form-group">
                      <label for="exampleInputPassword1">Keterangan</label>
                      <textarea class="form-control" id="description" name="description" size="50" placeholder="Keterangan">
                    </div> --}}
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
                       
        <!-- partial -->
      </div>

  {{-- Script for TinyMCE --}}
      @include('admindashboard.templateadmin.footer')