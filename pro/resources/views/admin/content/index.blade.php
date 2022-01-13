@include('layouts/admin/head')

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layouts/admin/sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
    @include('layouts/admin/header')
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">หน้า content</h1>
            <ol class="breadcrumb">
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">หน้า content</h6>
                </div>
                <a href="{{route('add_content')}}" class="btn btn-sm btn-primary">เพิ่มข้อมูล</a>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>image</th>
                        <th>headtext</th>
                        <th>detail</th>
                        <th>ID_USERS</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($content as $Content)
                        <tr>
                          <td>{{$Content->id_content}}</td>
                          <td><img src="{{asset('admin/images/'.$Content->image)}}" alt="" style="width: 150px"></td>
                          <td>{{$Content->headtext}}</td>
                          <td>{{$Content->detail}}</td>
                          <td>{{$Content->user->name}}</td>
                          <td><a href="{{url('/Admin/edit_content/'.$Content->id_content)}}" class="btn btn-sm btn-primary">แก้ไข</a></td>
                          <td><a href="{{url('/Admin/content/delete/'.$Content->id_content)}}" class="btn btn-sm btn-danger">ลบ</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('layouts/admin/footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


</body>

</html>
