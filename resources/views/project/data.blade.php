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
            <h5 class="card-title">Data Project</h5>
          </div>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Master Data</a></li>
              <li class="breadcrumb-item active">Data Project</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="animated fadeIn">  
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="card card-info card-outline">
            <div class="box-header">     
              <div class="col-md-8 col-md-offset-2">
                <p>
                    <div class="pull-left">
                         </div>
                         <form action="/project/cari" method="GET">
                          <div class="pull-left">
                             </div>
                          <strong>Filter</strong>
                            <input type="text" name="cari" placeholder="Cari Project..." value="{{ old('cari')}}">
                               <select type="text" name="project_status">
                                 <option value="">All Client</option>
                                 <option value="NEC">NEC</option>
                                 <option value="TAM">TAM</option>
                                 <option value="TUA">TUA</option>
                               </select>
                               <select type="text" name="project_status">
                                 <option value="">All Status</option>
                                 <option value="OPEN">OPEN</option>
                                 <option value="DONE">DONE</option>
                                 <option value="DOING">DOING</option>
                               </select>
                             <input type="submit" value="CARI" class="btn btn-primary">
                                <form action="/project" method="GET">
                                  <input type="submit" value="CLEAR" class="btn btn-warning">
                                </form>
                         </form>
                     </div>
                </p>
              </div>
          </div>         
        <div class="card">
          <div class="card-header">
            <div class="pull-left">
                <a href="{{ url('project/add')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i> New
                 </a>
                <a>
                <button style="margin-bottom: px" class="btn btn-danger delete_all" data-url="{{ url('projectDeleteAll')}}"><i class="fa fa-trash"></i>Delete</button>
                </a>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered bg-warning" id="table">
                    <thead class="bg-dark">
                      <tr>
                        <th>
                            <input type="checkbox"  id="master">
                        </th>
                          <th>Action</th> 
                          <th>Project Name</th>
                          <th>client</th>
                          <th>Project Start</th>
                          <th>Project End</th>
                          <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                         @foreach ($project as $item)

                         @php
                            $namaclient=
                            App\Models\Client::where('client_id', $item->client_id)->first()->client_name;
                        @endphp
                          <tr id="tr_{{$item->project_id}}">
                            <td style="width:10px; text-align:center ">
                                <input type="checkbox"  class="sub_chk" data-id="{{ $item->project_id }}">
                            </td>
                            <td class="text-center">
                                <a href="{{ url('project/edit/'.$item->project_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a></td>
                           <td>{{ $item->project_name}}</td>
                           <td>{{ $namaclient}}</td> 
                           <td>{{ date('d F Y',strtotime($item->project_start)) }}</td>
                           <td>{{ date('d F Y',strtotime($item->project_end)) }}</td>
                          <td>{{ $item->project_status}}</td>  
                          </tr>   
                        @endforeach 
                    </tbody>
                 </table>
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
           
