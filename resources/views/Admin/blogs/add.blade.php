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
            <form action="/admin/blogs" method="post" enctype="multipart/form-data" name="formAdd" id="formAdd">
              @csrf
            <div class="row"> 
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="title">Blog <span class="text text-red">*</span></label>
                        <input type="text" name="title" value="{{ old("title") }}" class="form-control" id="blog" placeholder="title">
                        @error("title")
                          <div class="text-danger"><p>Please Fill the title</p></div>
                        @enderror
                      </div>
    
                      <div class="form-group">
                      <label for="slug">Slug <span class="text text-red">*</span></label>
                        <input type="text" name="slug" class="form-control" value="{{ old("slug") }}" id="slug" placeholder="Slug">
                        @error("slug")  
                          <div class="text-danger"><p>Please Fill the slug</p></div>
                        @enderror
                      </div>
            
                      
                      <div class="form-group">
                        <label for="slug">Keywords <span class="text text-red">*</span></label>
                        <input type="text" name="keywords" class="form-control" value="{{ old("keywords") }}" id="slug" placeholder="keywords">
                        @error("keywords")  
                          <div class="text-danger"><p>Please Fill the keywords</p></div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}" id="slug" placeholder="keywords">
                      </div>
                  </div>
                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      <label for="author_img">Blog Image <span class="text text-red">*</span></label>
                      <input type="file" name="blog_img" class="form-control" id="blog_img">
                      @error("blog_img")
                        <div class="text-danger">Please upload an image</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="categories">categories <span class="text text-red">*</span></label>
                      <ul style="list-style: none">
                        @foreach($categories as $category)
                          <li id="category-{{ $category->id }}" onclick="addCategory({{ $category->id }})" style="cursor: pointer;display: inline; padding: 5px 10px 5px 10px; border-radius: 10px; border: 1px solid blue;">{{ $category->category }}</li>
                        @endforeach
                        <input type="hidden" name="categories" id="categories" value="{{ old("categories") }}">
                      </ul>
                      @error("categories")
                        <div class="text-danger">Please select at least one category</div>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="slug">Description <span class="text text-red">*</span></label>
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ...">{{ old("description") }}</textarea>
                      @error("description")
                        <div class="text-danger"><p>Please Fill the Description</p></div>
                      @enderror
                    </div>
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