<x-main>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Manage blog</h1>
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
                  <form action="/admin/blogsSearch" method="GET">
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
                @if (count($blogs) > 0)
                  <table class="table table-bordered">
                    <thead style="background-color: #F8F8F8;">
                      <tr>
                        <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                        <th width="70%">Title</th>
                        <th width="10%">Thumbnail</th>
                        <th width="5%">Status</th>
                        <th width="10%">Manage</th>
                      </tr>
                    </thead>
                    @foreach ($blogs as $blog)
                      <tr>
                        <td><input type="checkbox" name="checkbox" value="{{ $blog->id }}" id="" class="checkSingle"></td>
                        <td>{{$blog->title }}</td>
                        <td>
                            @if (!$blog->image)
                                <img src="/assets/admin/dist/img/noimg.png" alt="No image found" height="60">
                            @else
                                <img src="/uploads/{{ $blog->image }}" alt="{{ $blog->title }}" height="60">
                            @endif
                        </td>
                        <td>
                            <form action="/admin/blog/{{ $blog->id }}/status" method="post" name="formStatus" id="formStatus">
                                @csrf
                                {{ method_field('put') }}
                                @if (!$blog->status)
                                    <button class="singleStatus btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></button>
                                @else
                                    <button class="singleStatus btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i></button>
                                @endif
                            </form>
                        </td>
                        <td>
                          <a href="/admin/{{ $blog->slug }}/blog" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                            <form style="display: inline;" action="/admin/blog/{{ $blog->id }}/delete" method="POST" name="formDelete" id="formDelete">
                              @csrf
                              {{ method_field('delete') }}
                              <button type="submit" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </table>
                @else 
                    <div class="alert alert-danger">Please add at least one record</div>
                @endif
                {{ $blogs->links() }}
              </div>
              <!-- /.box-body -->
                <div class="box-footer clearfix">
                          <div class="row">
                              <div class="col-sm-6">
                                  <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                      Showing 100 to 500 of 1000 entries</span>
                              </div>
                            <div class="col-sm-6 text-right">
                                {{ $blogs->links() }}
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