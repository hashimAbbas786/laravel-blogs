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
    
            <form action="/admin/blog/{{ $blog->id }}/update" method="post" enctype="multipart/form-data" name="formAdd" id="formAdd">
              @csrf
              {{ method_field("PUT") }}
            <div class="row"> 
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="title">Blog <span class="text text-red">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ $blog->title }}" id="blog" placeholder="title">
                        @error("title")  
                          <div class="text-danger"><p>Please Fill the title</p></div>
                        @enderror
                      </div>
    
                      <div class="form-group">
                      <label for="slug">Slug <span class="text text-red">*</span></label>
                        <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}" id="slug" placeholder="Slug">
                        @error("slug")
                          <div class="text-danger"><p>Please Fill the slug</p></div>
                        @enderror
                      </div>
            
                      
                      <div class="form-group">
                        <label for="slug">Keywords <span class="text text-red">*</span></label>
                        <input type="text" name="keywords" class="form-control" id="slug" value="{{ $blog->keywords }}" placeholder="keywords">
                        @error("keywords")  
                          <div class="text-danger"><p>Please Fill the keywords</p></div>
                        @enderror
                      </div>
                  </div>
                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      <label for="author_img">Blog Image <span class="text text-red">*</span></label>
                      <input type="file" name="blog_img" class="form-control" id="blog_img">
                      @error("blog_img")
                        <div class="text-danger">Please upload file</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="categories">categories <span class="text text-red">*</span></label>
                      <ul style="list-style: none">
                        @foreach($categories as $category)
                          <li id="category-{{ $category->id }}" onclick="addCategory({{ $category->id }})" style="cursor: pointer;display: inline; padding: 5px 10px 5px 10px; border-radius: 10px; border: 1px solid blue;">{{ $category->category }}</li>
                        @endforeach
                        <input type="text" name="categories" value="{{ $blog->categories }}" id="categories">
                        @error("categories")
                          <div class="text-danger">Please select at least one category</div>
                        @enderror
                      </ul>
                    </div>
                    
                    <div class="form-group">
                      <label for="slug">Description <span class="text text-red">*</span></label>
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ...">{{ $blog->description }}</textarea>
                      @error("description")
                        <div class="text-danger"><p>Please Fill the description</p></div>
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
    <script>
      const categoriesList = document.getElementById("categories").value;
      const ids = categoriesList.split(", ");
      const numbers = ids.map(id => parseInt(id));  
      
      ids.forEach(id => {
        const el = document.getElementById(`category-${id}`);
        el.classList.add("selected");
      })
    </script>
    </x-main>