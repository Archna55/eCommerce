@extends('layouts.admin')

@section('admin_container')

  <div class="admin_main_container p-4">
    <div class="dashboard_cards d-flex justify-content-between mb-4 mt-5 pt-3">
        <h3>Edit Brand</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class=" text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><span>><a href="{{ route('admin.brands') }}" class=" text-decoration-none"><span class="text-tiny"> Brands&nbsp;</span></a></span></li>
          <li><span class="text-tiny">> Edit Brand</span></li>
        </ul>
    </div>
    <div class="brand_content">
      <div class="brand_form_container mx-auto p-4 beauty border rounded-4 shadow">
        <form action="{{ route('admin.update.brand') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $brand->id }}">
          <div class=" d-flex mb-3">
            <label for="name" class="form-label fw-semibold w-25">Brand Name:</label>
            <input type="text" class="form-control w-25 @error('name') is-invalid @enderror" id="name" name="name" value="{{ $brand->name }}" placeholder="Enter Brand Name">
            @error('name')
              <span class="invalid-feedback" role="alert">
                  <p>{{ $message }}</p>
              </span>
            @enderror
          </div>
          <div class="d-flex mb-3">
            <label for="slug" class="form-label fw-semibold w-25">Brand Slug:</label>
            <input type="text" class="form-control w-25 @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $brand->slug }}" placeholder="Enter Brand Slug" readonly>
            @error('slug')
              <span class="invalid-feedback" role="alert">
                <p>{{ $message }}</p>
              </span>
            @enderror
          </div>
          <div class=" d-flex mb-3">
            <label for="image" class="form-label fw-semibold w-25">Brand Image:</label>
            <div class="w-75">
              <div class="brand_img bg-white p-3 rounded">
                <label class="brand_input rounded" id="upload_field">
                  <input type="file" class="@error('image') is-invalid @enderror" hidden id="image" name="image" accept="image/*">
                  <p class="text-center pt-3 mb-1"><i class="fa-solid fa-cloud-arrow-up"></i></p>
                  <p class="text-center mb-0">drag your image here
                  <p class="text-center mb-0">OR</p>
                  <p class="text-center text-primary">click to upload</p>
                </label>
              </div>
              <div class="brand_img bg-white p-3 rounded m-3 ms-0 visible" id="preview_container">
                @if ($brand->image)
                  <div class="brand_input border-0 rounded" id="previewImage">
                    <img src="{{ asset('images/brands') }}/{{ $brand->image }}" alt="{{$brand->name}}" class="img-fluid mx-auto d-block">
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
          <button type="submit" class="btn btn-primary">Edit Brand</button>
        </form>
      </div>
    </div>
  </div>
@endsection