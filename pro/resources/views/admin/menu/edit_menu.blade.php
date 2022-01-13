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
            <h1 class="h3 mb-0 text-gray-800">แก้ไขหน้า menus</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">แก้ไขหน้า menus</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">แก้ไขหน้า menus</h6>
                </div>
                <div class="card-body">
                  <form action="{{url('/Admin/menu/update/'.$menu_->id_menus)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="exampleInputEmail1">เนื้อหา</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$menu_->text}}">
                      
                      @error('name')
                        <span class="text-danger">{{$message}}</span>
                      @enderror

                    </div>

                    <div class="form-group">

                      <select class="form-control" name="type" id="type">
                          @foreach ($type_ as $rows)
                              <option value="{{$rows->id_types}}">{{$rows->name}}</option>
                          @endforeach
                      </select>

                      @error('type')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                   
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>

                      @error('image')
                        <span class="text-danger">{{$message}}</span>
                      @enderror

                      <img id="showImage" src="{{asset('admin/images/'.$menu_->image)}}" alt="" style="width: 150px; padding-bottom: 20px; padding-top: 20px;">
                      <br>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                  </form>
                </div>
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

  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
  </script>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
</body>

</html>