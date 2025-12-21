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
        <h3>All Products</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><span class="text-tiny">> All Products</span></li>
        </ul>
    </div>
    <div class="brand_content">
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
      <div class="brand_table mt-4">
        @if (Session::has('status'))
          <p class="alert alert-success">{{ Session::get('status') }}</p>
        @endif
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Price</th>
              <th scope="col">Sale Price</th>
              <th scope="col">SKU</th>
              <th scope="col">Category</th>
              <th scope="col">Brand</th>
              <th scope="col">Featured</th>
              <th scope="col">Stock</th>
              <th scope="col">Quantity</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td scope="row">{{ $product->id }}</td>
                <td scope="row">
                  <div class="d-flex">
                    <img src="{{ asset('images/products') }}/{{ $product->image }}" class="brand_image" alt="{{ $product->name }}">
                    <span>
                      <p>{{ $product->name }}</p>
                      <p>{{ $product->slug }}</p>
                    </span>
                  </div>
                </td>
                <td scope="row">&#8377;{{ $product->regular_price }}</td>
                <td scope="row">&#8377;{{ $product->sale_price }}</td>
                <td scope="row">{{ $product->SKU }}</td>
                <td scope="row">{{ $product->category->name }}</td>
                <td scope="row">{{ $product->brand->name }}</td>
                <td scope="row">{{ $product->featured == 0 ? "NO":"YES" }}</td>
                <td scope="row">{{ $product->stock_status }}</td>
                <td scope="row">{{ $product->quantity }}</td>
                <td>
                  <div class="d-flex m-3">
                    <a href="{{ route('admin.edit.product', ['id' => $product->id]) }}" class="btn btn-sm btn-warning m-3 text-light"><i class="fa-solid fa-edit"></i>Edit</a>
                    <form action="{{ route('admin.delete.product', ['id' => $product->id]) }}" method="POST">
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
        {{ $products->links('pagination::bootstrap-5') }}
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