@extends('layouts.admin')

@section('admin_container')
<main>
  <div class="admin_sidebar fs-5 text-light">
    <ul>
      <a href="{{ route('admin.dashboard') }}" class="text-light text-decoration-none"><li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/dashboard-svgrepo-com.png') }}" class="sidebar_img" alt="Dashboard Icon">  
        <span>Dashboard</span>
      </li></a>
      <a href="{{ route('admin.brands') }} " class="text-light text-decoration-none"><li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/money.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Brands</span>
      </li></a>
      <a href="{{ route('admin.products') }}" class="text-light text-decoration-none"><li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/product-sf-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Products</span>
      </li></a>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/report-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Report</span>
      </li>
      <a href="{{ route('admin.categories') }}" class="text-light text-decoration-none"><li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/category-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Categories</span>
      </li></a>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/activity-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Activity</span>
      </li>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/customers-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Customers</span>
      </li>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/management-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Management</span>
      </li>
    </ul>
  </div>

  <div class="admin_main_container p-4">
    <div class="dashboard_cards d-flex justify-content-between mb-4 mt-5 pt-3">
        <h3>Add Product</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class=" text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><span>><a href="{{ route('admin.products') }}" class=" text-decoration-none"><span class="text-tiny"> All Products&nbsp;</span></a></span></li>
          <li><span class="text-tiny">> Add Product</span></li>
        </ul>
    </div>
    <div class="poduct_content">
      <div class="d-flex justify-content-between">
        <form class="form-search">
          <fieldset>
            <input type="text" class="search rounded-5 px-3 fst-italic" name="name" tabindex="2" value="" aria-required="
              true" placeholder="Search Product...">
          </fieldset>
        </form>
        <button class="btn btn-primary">
          <a href="{{ route('admin.add.product') }}" class="text-light text-decoration-none">Add Product</a>
        </button>
      </div>
      <div class="w-100 d-flex justify-content-between align-items-center">
        <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data" class="mt-4 w-100">
          @csrf
          <div class="d-flex justify-content-between">
            <div class="w-50 bg-white p-3 me-3 rounded-2">
              <div class="m-3">
                <label for="name"><span class="text-danger ps-1">*&nbsp;</span>Product Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" tabindex="0" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Product Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
              </div>
              <div class="m-3">
                <label for="slug"><span class="text-danger ps-1">*&nbsp;</span>Product Slug:</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" tabindex="0" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Enter Product Slug">
                @error('slug')
                <span class="invalid-feedback" role="alert">
                  <p>{{ $message }}</p>
                </span>
                @enderror
              </div>
              <div class="d-flex">
                <div class="m-3 w-50">
                  <label for="category"><span class="text-danger ps-1">*&nbsp;</span>Category:</label>
                  <div class="select">
                    <select name="category_id" class="dropdown-select @error('category_id') is-invalid @enderror">
                      <option>--Select Category--</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('category')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
                <div class="m-3 w-50">
                  <label for="brand"><span class="text-danger ps-1">*&nbsp;</span>Brand:</label>
                  <div class="select">
                    <select name="brand_id" class="dropdown-select @error('brand_id') is-invalid @enderror">
                      <option>--Select Brand--</option>
                      @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('brand')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="d-flex">
                <div class="m-3 w-50">
                  <label for="stock_status">Stock Status:</label>
                  <div class="select">
                    <select name="stock_status" class="dropdown-select @error('stock_status') is-invalid @enderror">
                        <option value="instock">Instock</option>
                        <option value="outstock">Out of Stock</option>
                    </select>
                  </div>
                  @error('stock_status')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
                <div class="m-3 w-50">
                  <label for="featured">Featured:</label>
                  <div class="select">
                    <select name="featured" class="dropdown-select @error('featured') is-invalid @enderror">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                  </div>
                  @error('featured')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="m-3">
                <label for="short_description"><span class="text-danger ps-1">*&nbsp;</span>Short Description:</label>
                <textarea type="text" rows="5" class="form-control @error('short_description') is-invalid @enderror" tabindex="0" id="short_description" name="short_description" placeholder="Enter Short Description">{{ old('short_description') }}</textarea>
                @error('s_description')
                <span class="invalid-feedback" role="alert">
                  <p>{{ $message }}</p>
                </span>
                @enderror
              </div>
              <div class="m-3">
                <label for="description"><span class="text-danger ps-1">*&nbsp;</span>Description:</label>
                <textarea type="text" rows="7" class="form-control @error('description') is-invalid @enderror" tabindex="0" id="description" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <p>{{ $message }}</p>
                </span>
                @enderror
              </div>
            </div>
            <div class="w-50 bg-white p-3 ms-3 rounded-2">
              <div class="m-3">
                <label for="image"><span class="text-danger ps-1">*&nbsp;</span>Product Images:</label>
                <div class="w-100">
                  <div class="product_img py-3 rounded">
                    <label class="product_input rounded" id="p_upload_field">
                      <input type="file" class="@error('image') is-invalid @enderror" hidden id="image" name="image" accept="image/*">
                      <p class="text-center pt-3 mb-1"><i class="fa-solid fa-cloud-arrow-up"></i></p>
                      <p class="text-center mb-0">drag your image here
                      <p class="text-center mb-0">OR</p>
                      <p class="text-center text-primary">click to upload</p>
                    </label>
                  </div>
                  <div class="product_img rounded m-3 ms-0" id="p_preview_container">
                    <div class="product_input border-0 rounded" id="p_previewImage">
                      <img src="" alt="" class="img-fluid mx-auto d-block">
                    </div>
                  </div> 
                </div>
                    
                @error('image')
                <span class="invalid-feedback" role="alert">
                  <p>{{ $message }}</p>
                </span>
                @enderror
              </div>
              <div class="m-3">
                <label for="names">Product Gallery Images:</label>
                <div class="w-100">
                  <div class="product_img py-3 rounded">
                    <label class="product_input rounded" id="g_upload_field">
                      <input type="file" class="@error('images') is-invalid @enderror" hidden id="images" name="images[]" accept="image/*" multiple>
                      <p class="text-center pt-3 mb-1"><i class="fa-solid fa-cloud-arrow-up"></i></p>
                      <p class="text-center mb-0">drag your image here
                      <p class="text-center mb-0">OR</p>
                      <p class="text-center text-primary">click to upload</p>
                    </label>
                  </div>
                  <div class="product_img rounded m-3 ms-0" id="g_preview_container">
                    <div class="product_input border-0 rounded" id="g_previewImage">
                      <img src="" alt="" class="img-fluid mx-auto d-block">
                    </div>
                  </div> 
                </div>
                    
                @error('images')
                <span class="invalid-feedback" role="alert">
                  <p>{{ $message }}</p>
                </span>
                @enderror
              </div>
              <div class="d-flex">
                <div class="m-3 w-50">
                  <label for="regular_price"><span class="text-danger ps-1">*&nbsp;</span>Regular Price:</label>
                  <input type="text" class="form-control @error('regular_price') is-invalid @enderror" tabindex="0" id="regular_price" name="regular_price" value="{{ old('regular_price') }}" placeholder="Enter Regular Price">
                  @error('regular_price')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
                <div class="m-3 w-50">
                  <label for="sale_price"><span class="text-danger ps-1">*&nbsp;</span>Sale Price:</label>
                  <input type="text" class="form-control @error('sale_price') is-invalid @enderror" tabindex="0" id="sale_price" name="sale_price" value="{{ old('sale_price') }}" placeholder="Enter Sale Price">
                  @error('sale_price')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="d-flex">
                <div class="m-3 w-50">
                  <label for="SKU"><span class="text-danger ps-1">*&nbsp;</span>SKU:</label>
                  <input type="text" class="form-control @error('SKU') is-invalid @enderror" tabindex="0" id="SKU" name="SKU" value="{{ old('SKU') }}" placeholder="Enter SKU">
                  @error('SKU')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
                <div class="m-3 w-50">
                  <label for="quantity"><span class="text-danger ps-1">*&nbsp;</span>Quantity:</label>
                  <input type="text" class="form-control @error('quantity') is-invalid @enderror" tabindex="0" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Enter Quantity">
                  @error('quantity')
                  <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="m-3">
                <button type="submit" class="btn btn-primary">Add Product</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection

@push('scripts')
    <script>
        $(function() {
            $("#image").on("change", function(e) {
                const photoInp = $("#image");
                const [file] = this.files;
                if (file) {
                    $("#p_previewImage img").attr('src', URL.createObjectURL(file));
                    $("#p_preview_container").show();
                }
            });
            $("#images").on("change", function(e) {
                const photoInp = $("#images");
                const gphotos = this.files;
                
                $.each(gphotos, function(index, file) {
                        $("#g_previewImage").prepend(`<div class="item gitems"><img src="${URL.createObjectURL(file)}"</div>`);
                        $("#g_preview_container").show();
                });
            });
            $("input[name='name']").on("change", function() {
                $("input[name='slug']").val(StringToSlug($(this).val()));
            });
        });
        function StringToSlug (Text) {
            return Text.toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-');
        }
    </script>
@endpush