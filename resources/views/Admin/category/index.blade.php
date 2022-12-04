<x-main>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Manage Category</h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Tables</a></li>
          <li class="active">Simple</li>
        </ol>
      </section>
    
      <!-- Main content -->
      <section class="content">
        
        <!-- /.row -->
       <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> 
                      <a class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                      <a class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                      <a class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
                </h3>
                <div class="box-tools">
                  <form action="/admin/categories" method="GET">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" name="search" class="form-control pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <input type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                @if (count($categories) > 0)
                  <table class="table table-bordered">
                    <thead style="background-color: #F8F8F8;">
                      <tr>
                        <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                        <th width="70%">Title</th>
                        <th width="10%">Manage</th>
                      </tr>
                    </thead>
                    @foreach ($categories as $category)
                      <tr>
                        <td><input type="checkbox" name="checkbox" value="{{ $category->id }}" id="" class="checkSingle"></td>
                        <td>{{$category->category}}</td>
                        <td>
                            <form action="/admin/category/{{ $category->id }}" method="post" name="formDelete" id="formDelete">
                              @csrf
                              {{ method_field('delete') }}
                              <a href="/admin/category/{{ $category->slug }}/update" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                              <button class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                      </tr>
                @endforeach
               </table>
               @else
                    <div class="alert alert-danger">Please add at least one record</div>
                @endif
              </div>
              <!-- /.box-body -->
                <div class="box-footer clearfix">
                          <div class="row">
                              <div class="col-sm-6">
                                  <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                      Showing 100 to 500 of 1000 entries</span>
                              </div>
                            <div class="col-sm-6 text-right">
                                {{ $categories->links() }}
                            </div>
                          </div>
                      </div>
            </div>
              <!-- /.box-body -->
            </div>
    
    
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </x-main>