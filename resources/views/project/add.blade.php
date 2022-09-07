<!DOCTYPE html>

<html lang="en">
<head>
   @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
  <!-- Wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-5">
          <div class="card">
          <div class="card-body">
            <h5 class="card-title"> Data Project</h5>
          </div>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Project</a></li>
              <li class="breadcrumb-item active">Data Project</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <div class="content">
        <div class="card card-info card-outline">
            <div class="box-header">     
              <div class="col-md-8 col-md-offset-2">
                <p>
                    <div class="pull-left">
                        <div class="pull-left">
                            <a href="{{ url('project')}}" class="btn btn-secondary btn-sm">
                               <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                         </div> 
                     </div>
                </p>
              </div>
          </div>         
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('project')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" name="project_name" class="form-control @error('project_name') is-invalid @enderror" autofocus>
                                    @error('project_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label>Client Name</label>
                                    <select  name="client_id" class="form-control select2 @error('client_id') is-invalid @enderror" >
                                        <option selected="" disabled="">Pilih Client</option>
                                        @foreach($client as $kt)
                                        <option value="{{ $kt->client_id }}">{{ $kt->client_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Project Start </label>
                                    <input type="date" name="project_start" class="form-control"  autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Project End </label>
                                    <input type="date" name="project_end" class="form-control"  autofocus>
                                </div>
                                <div class="form-group">
                                    <select type="text"class="form-control select2" name="project_status">
                                        <option value="">Pilih Status</option>
                                        <option value="OPEN">OPEN</option>
                                        <option value="DONE">DONE</option>
                                        <option value="DOING">DOING</option>
                                    </select>
                                </div>
                                 <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                  </div>
              </div>
            </div>
            
              </div>
             </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
 <footer class="main-footer">
    @include('Template.footer')
   </footer>
 </div>
 <!-- ./wrapper -->
 
 <!-- REQUIRED SCRIPTS -->
  @include('Template.script')
 </body>
 </html>
           

