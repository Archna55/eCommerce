@extends('layouts.admin')

@section('admin_container')

  <div class="admin_main_container p-4">
    <div class="dashboard_cards d-flex justify-content-between mb-4 mt-5 pt-3">
        <h3>Orders</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class=" text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><span class="text-tiny">> Orders</span></li>
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
      </div>
      <div class="brand_table mt-4">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Order No.</th>
              <th scope="col">Name</th>
              <th scope="col">Phone No.</th>
              <th scope="col">Subtotal</th>
              <th scope="col">Tax</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
              <th scope="col">Order Date</th>
              <th scope="col">Total Items</th>
              <th scope="col">Delivered On</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td class="text-center">{{ $order->id }}</th>
              <td class="text-center">{{ $order->name }}</th>
              <td class="text-center">{{ $order->phone }}</th>
              <td class="text-center">&#8377;{{ $order->subtotal }}</th>
              <td class="text-center">&#8377;{{ $order->tax }}</th>
              <td class="text-center">&#8377;{{ $order->total }}</th>
              <td class="text-center">{{ $order->status }}</th>
              <td class="text-center">{{ $order->created_at }}</th>
              <td class="text-center">{{ $order->orderItems->count() }}</th>
              <td class="text-center">{{ $order->delivery_date }}</th>
              <td class="text-center">
                <div>
                    <button type="button" class="btn btn-sm btn-primary m-3"><i class="fa-solid fa-eye"></i> View</button>
                </div>
              </th>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="divider"></div>
      <div class="flex items-center justify-between flex-wrap gap10 mt-4 brand-pagination">
        {{ $orders->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
@endsection