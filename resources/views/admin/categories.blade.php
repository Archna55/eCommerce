@extends('layouts.admin')

@section('admin_container')

  <div class="admin_main_container p-4">
    <div class="dashboard_cards d-flex justify-content-between mb-4 mt-5 pt-3">
        <h3>Categories</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><span class="text-tiny">> Categories</span></li>
        </ul>
    </div>
    <div class="brand_content">
      <div class="d-flex justify-content-between">
        <form class="form-search">
          <fieldset>
            <input type="text" class="search rounded-5 px-3 fst-italic" name="name" tabindex="2" value="" aria-required="
            true" placeholder="Search Categories...">
          </fieldset>
        </form>
        <button class="btn btn-primary">
          <a href="{{ route('admin.add.category') }}" class="text-light text-decoration-none">Add Category</a>
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
              <th scope="col">Category Name</th>
              <th scope="col">Category Slug</th>
              <th scope="col">Products</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td scope="row">{{ $category->id }}</td>
                <td>
                  <img src="{{ asset('images/categories') }}/{{ $category->image }}" class="brand_image" alt="{{ $category->name }}">
                  <a href="#" class="text-decoration-none">{{ $category->name }}</a>
                </td>
                <td>{{ $category->slug }}</td>
                <td><a href="#" target="_blank" class="text-decoration-none">0</a></td>
                <td>
                  <div class="d-flex m-3">
                    <a href="{{ route('admin.edit.category', ['id' => $category->id]) }}" class="btn btn-sm btn-warning m-3 text-light"><i class="fa-solid fa-edit"></i>Edit</a>
                    <form action="{{ route('admin.delete.category', ['id' => $category->id]) }}" method="POST">
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
        {{ $categories->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
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