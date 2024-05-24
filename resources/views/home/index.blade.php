<!-- resources/views/master/index.blade.php -->
@extends('layouts.master')
@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-4">
            <img src="https://png.pngtree.com/png-clipart/20200721/original/pngtree-digital-shop-logo-design-icon-png-image_4825243.jpg"
                 class="d-block mx-lg-auto img-fluid shadow-lg rounded" alt="Bootstrap Themes" width="340" height="150"
                 loading="lazy">
        </div>
        <div class="col-lg-8">
            <h4>Rasakan Perbedaan Belanja Di Toko Kami</h4>
            <h4 class="display-5 fw-bold lh-1 mb-3">Welcome To The Digital Shop </h4>
            <p class="lead">
                Di [Nama Toko Anda], kami bangga menjadi pilihan utama bagi pelanggan yang mencari produk berkualitas dengan harga terjangkau. Kami menawarkan berbagai macam produk yang memenuhi kebutuhan dan keinginan Anda, mulai dari fashion terkini, elektronik canggih, peralatan rumah tangga, hingga produk kecantikan dan kesehatan.
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 me-md-2">Buy Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
