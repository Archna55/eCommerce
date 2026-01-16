@extends('layouts.admin')


  <div class="admin_main_container p-4">
    <div class="dashboard_cards d-flex justify-content-between mb-4 mt-5 pt-3">
        <h3>Orders</h3>
        <ul class="breadcrumbs list-unstyled w-25 d-flex justify-content-end align-items-center">
          <li><a href="{{ route('admin.dashboard') }}" class=" text-decoration-none"><span class="text-tiny">Dashboard&nbsp;</span></a></li>
          <li><a href="{{ route('admin.orders') }}" class=" text-decoration-none"><span class="text-tiny">Orders&nbsp;</span></a></li>
          <li><span class="text-tiny">> Order-detail</span></li>
        </ul>
    </div>
    <div class="brand_content">
      <div class="d-flex justify-content-between">
        <form class="float-end">
            <h5>Order Details</h5>
          <button class="btn btn-primary">
          Back
        </button>
        </form>
      </div>
      <div class="brand_table mt-4">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Order No.</th>
              <td scope="col">{{ $order->id }}</td>
              <th scope="col">Phone No.</th>
              <td scope="col">{{ $order->phone }}</td>
              <th scope="col">Zip</th>
              <td scope="col">{{ $order->zip }}</td>
            </tr>
            <tr>
              <th scope="col">Customer Name</th>
              <td scope="col">{{ $order->name }}</td>
              <th scope="col">Order Date</th>
              <td scope="col">{{ $order->created_at }}</td>
              <th scope="col">Delivered On</th>
              <td scope="col">{{ $order->delivery_date }}</td>
            </tr>
            <tr>
              <th scope="col">Cancelled Date</th>
              <td scope="col">{{ $order->cancelled_date }}</td>
              <th scope="col">Order Status</th>
              <td scope="col">{{ $order->status }}</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td class="text-center">{{ $order->id }}</th>
              <td class="text-center">{{ $order->name }}</th>
              <td class="text-center">{{ $order->phone }}</th>
              <td class="text-center">{{ $order->subtotal }}</th>
              <td class="text-center">{{ $order->tax }}</th>
              <td class="text-center">{{ $order->total }}</th>
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
