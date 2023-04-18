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
                  <form class="forms-sample"  method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Judul</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Judul">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kegiatan</label>
                      <input type="email" class="form-control" id="tags" name="tags" placeholder="Jenis Kegiatan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi Singkat</label>
                      <input type="password" class="form-control" id="caption" name="caption" placeholder="Deskripsi Singkat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Photo</label>
                      <input type="file" class="form-control" id="thumbnail" name="thumbnail" placeholder="Photo">
                    </div>
                    <div class="form-group"></div>
                      <label for="exampleInputPassword1">Keterangan</label>
                      <textarea class="form-control" id="description" name="description" size="50" placeholder="Keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
                       
        <!-- partial -->
      </div>
{{-- Script for input tags --}}
  <script src="https://unpkg.com/@yaireo/tagify"></script>
  <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
  <script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=tags]');
    var tagify = new Tagify(input, {
      keepInvalidTags: true,
      whitelist: ['Artikel', 'Berita', 'Beasiswa', 'Pengumuman'],
      hooks: {
        beforeRemoveTag: (tags) => {
          tags[0].node.classList.add('tagify__tag');
          return new Promise((resolve, reject) => {
            confirm(`Are you sure to delete ${tags[0].data.value} tag ?`) ?
              resolve() :
              reject();
          });
        },
      },
    });
  </script>
  {{-- Script for TinyMCE --}}
      @include('admindashboard.templateadmin.footer')