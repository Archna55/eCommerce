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
        <h3>Edit Category</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class=" text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><span>><a href="{{ route('admin.categories') }}" class=" text-decoration-none"><span class="text-tiny"> Categories&nbsp;</span></a></span></li>
          <li><span class="text-tiny">> Edit Category</span></li>
        </ul>
    </div>
    <div class="brand_content">
      <div class="brand_form_container mx-auto p-4 beauty border rounded-4 shadow">
        <form action="{{ route('admin.update.category') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $category->id }}">
          <div class=" d-flex mb-3">
            <label for="name" class="form-label fw-semibold w-25">Category Name:</label>
            <input type="text" class="form-control w-25 @error('name') is-invalid @enderror" id="name" name="name" value="{{ $category->name }}" placeholder="Enter Category Name">
            @error('name')
              <span class="invalid-feedback" role="alert">
                  <p>{{ $message }}</p>
                </span>
            @enderror
          </div>
          <div class="d-flex mb-3">
            <label for="slug" class="form-label fw-semibold w-25">Category Slug:</label>
            <input type="text" class="form-control w-25 @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $category->slug }}" placeholder="Enter Category Slug" readonly>
            @error('slug')
              <span class="invalid-feedback" role="alert">
                <p>{{ $message }}</p>
              </span>
            @enderror
          </div>
          <div class=" d-flex mb-3">
            <label for="image" class="form-label fw-semibold w-25">Category Image:</label>
            <div class="w-75">
              <div class="brand_img bg-white p-3 rounded">
                <label class="brand_input rounded" id="upload_field">
                  <input type="file" class="@error('image') is-invalid @enderror" hidden id="image" name="image" accept="image/*">
                  <p class="text-center pt-3 mb-1"><i class="fa-solid fa-cloud-arrow-up"></i></p>
                  <p class="text-center mb-0">drag your image here</p>
                  <p class="text-center mb-0">OR</p>
                  <p class="text-center text-primary">click to upload</p>
                </label>
              </div>
              <div class="brand_img bg-white p-3 rounded m-3 ms-0 visible" id="preview_container">
                @if ($category->image)
                  <div class="brand_input border-0 rounded" id="previewImage">
                    <img src="{{ asset('images/categories') }}/{{ $category->image }}" alt="" class="img-fluid mx-auto d-block">
                  </div>
                @endif
              </div>

            </div>
                    
            @error('image')
              <span class="invalid-feedback" role="alert">
                <p>{{ $message }}</p>
              </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Edit Category</button>
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
                    $("#previewImage img").attr('src', URL.createObjectURL(file));
                    $("#preview_container").show();
                    $("#previewImage").show();
                }
                
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