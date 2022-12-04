<x-main>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Author
      <small>All * field required</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <!-- form start -->
    <div class="box box-primary">
      <!-- /.box-header -->
          
      <div class="box-body">
        <!-- row start -->

        <form action="/admin/category" method="post" enctype="multipart/form-data" name="formAdd" id="formAdd">
          @csrf
        <div class="row"> 
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="title">Category <span class="text text-red">*</span></label>
                    <input type="text" name="category" class="form-control" value="{{ old("category") }}" id="category" placeholder="category">
                    @error("category")  
                      <div class="text-danger"><p>Please Fill the Category</p></div>
                    @enderror
                  </div>

                  <div class="form-group">
                  <label for="slug">Slug <span class="text text-red">*</span></label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old("slug") }}" placeholder="Slug">
                    @error("slug")
                      <div class="text-danger"><p>Please Fill the slug</p></div>
                    @enderror
                  </div>
          </div>
        

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
    </div>
    <!-- /.box -->
  </form>
    <!-- form end -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</x-main>