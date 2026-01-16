@extends('layouts.admin')

@section('admin_container')

  <div class="admin_main_container p-4">
    <div class="dashboard_cards d-flex justify-content-between mb-4 mt-5 pt-3">
      <div class="card w-25 mx-3 p-3 rounded-4 bg-info border-0">
        <div class="d-flex justify-content-between">
            <div class="ps-2">
              <h5 class="fw-semibold text-light">Total Sales</h5>
              <p class="fs-4 fw-bold text-danger">$25,000</p>
            </div>
            <div class="p-3 pe-2">
              <i class="fa-solid fa-dollar-sign fs-1 text-light"></i>
            </div>
          </div>
        </div>
        <div class="card w-25 mx-3 p-3 rounded-4 bg-success border-0">
          <div class="d-flex justify-content-between">
            <div class="ps-2">
              <h5 class="fw-semibold text-light">Total Orders</h5>
              <p class="fs-4 fw-bold text-danger">1,200</p>
            </div>
            <div class="p-3 pe-2">
              <i class="fa-solid fa-cart-shopping fs-1 text-light"></i>
            </div>
          </div>
        </div>
        <div class="card w-25 mx-3 p-3 rounded-4 bg-primary border-0">
          <div class="d-flex justify-content-between">
            <div class="ps-2">
              <h5 class="fw-semibold text-light">Total Customers</h5>
              <p class="fs-5 fw-bold text-danger">800</p>
            </div>
            <div class="p-3 pe-2">
              <i class="fa-solid fa-users fs-1 text-light"></i>
            </div>
          </div>
        </div>
        <div class="card w-25 mx-3 p-3 rounded-4 bg-warning border-0">
          <div class="d-flex justify-content-between">
            <div class="ps-2">
              <h5 class="fw-semibold text-light">Total Products</h5>
              <p class="fs-4 fw-bold text-danger">350</p>
            </div>
            <div class="p-3 pe-2">
              <i class="fa-solid fa-boxes-packing fs-1 text-light"></i>
            </div>
          </div>
        </div>
    </div>
    <div class="charts_section">
      <div class="p-3 bg-white rounded-4 shadow-sm mb-4">
        <h3 class="fw-semibold mb-3">
          <i class="fa-brands fa-searchengin text-primary"></i>
          <span>Sales Overview by categories</span>
        </h3>
        <div class="d-flex justify-content-evenly">
          <div class="pie d-flex justify-content-center">
            <img src="{{ asset('images/piechart.png') }}" class="img-fluid" alt="Sales Overview">
          </div>
          <div class="pie_details">
            <div class="d-flex p-3">
              <div class="w-50 electronics detail_item me-3 p-3 rounded">
                <h5>Electronics</h5>
                <span>37.5%</span>
              </div>
              <div class="w-50 apparel detail_item me-3 p-3 rounded">
                <h5>Apparel</h5>
                <span>26.7%</span>
              </div>
            </div>
            <div class="d-flex p-3">
              <div class="home_goods w-50 detail_item me-3 p-3 rounded">
                <h5>Home goods</h5>
                <span>17.5%</span>
              </div>
              <div class="beauty w-50 detail_item me-3 p-3 rounded">
                <h5>Beauty</h5>
                <span>11.7%</span>
              </div>
            </div>
            <div class="d-flex p-3">
              <div class="books w-50 p-3 detail_item me-3 rounded">
                <h5>Books</h5>
                <span>6.7%</span>
              </div>
              <div class="bookses w-50 p-3 detail_item me-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-between gap-4">
        <div class="border border-2 p-3 rounded">
          <h3>
            <i class="fa-solid fa-chart-line"></i>
            <span>Sucess Rate%</span>
          </h3>
          <img src="{{ asset('images/sucess_graph.png') }}" class="img-fluid" alt="Sucess Graph">
        </div>
        <div class="border border-2 p-3 rounded">
          <h3>
            <i class="fa-solid fa-chart-line"></i>
            <span>Globle Sucess Rate%</span>
          </h3>
          <img src="{{ asset('images/globle.png') }}" class="img-fluid" alt="Sucess Graph">
        </div>
    </div>
  </div>
@endsection
