@extends('layouts.admin')

@section('admin_container')
<main>
  <div class="admin_sidebar fs-5 text-light">
    <ul>
      <a href="{{ route('admin.dashboard') }}" class="text-light text-decoration-none"><li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/dashboard-svgrepo-com.png') }}" class="sidebar_img" alt="Dashboard Icon">  
        <span>Dashboard</span>
      </li></a>
      <a href="{{ route('admin.brands') }}" class="text-light text-decoration-none"><li class="d-flex justify-content-start align-items-center">
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
        <h3>Brands</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><span class="text-tiny">> Brands</span></li>
        </ul>
    </div>
    <div class="brand_content">
      <div class="d-flex justify-content-between">
        <form class="form-search">
          <fieldset>
            <input type="text" class="search rounded-5 px-3 fst-italic" name="name" tabindex="2" value="" aria-required="
            true" placeholder="Search Brands...">
          </fieldset>
        </form>
        <button class="btn btn-primary">
          <a href="{{ route('admin.add.brand') }}" class="text-light text-decoration-none">Add Brand</a>
        </button>
      </div>
      <div class="brand_table mt-4">
        @if (Session::has('status'))
          <p class="alert alert-success">{{ Session::get('status') }}</p>
        @endif
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Brand Name</th>
              <th scope="col">Brand Slug</th>
              <th scope="col">Products</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($brands as $brand)
              <tr>
                <td scope="row">{{ $brand->id }}</td>
                <td>
                  <img src="{{ asset('images/brands') }}/{{ $brand->image }}" class="brand_image" alt="{{ $brand->name }}">
                  <a href="#" class="text-decoration-none">{{ $brand->name }}</a>
                </td>
                <td>{{ $brand->slug }}</td>
                <td><a href="#" target="_blank" class="text-decoration-none">0</a></td>
                <td>
                  <div class="d-flex m-3">
                    <a href="{{ route('admin.edit.brand', ['id' => $brand->id]) }}" class="btn btn-sm btn-warning m-3 text-light"><i class="fa-solid fa-edit"></i>Edit</a>
                    <form action="{{ route('admin.delete.brand', ['id' => $brand->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-sm btn-danger m-3 delete"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="divider"></div>
      <div class="flex items-center justify-between flex-wrap gap10 mt-4 brand-pagination">
        {{ $brands->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
</main>
@endsection

@push('scripts')
  <script>
    $(function() {
      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        const form = $(this).closest('form');
        if (!form.length) return;

        Swal.fire({
          title: 'Are you sure?',
          text: 'Once deleted, you will not be able to recover this brand!',
          icon: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#6c757d',
          cancelButtonText: 'Cancel',
          confirmButtonColor: '#dc3545',
          confirmButtonText: 'Delete'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  </script>
@endpush