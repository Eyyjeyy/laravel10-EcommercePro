<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        @include('admin.css')
        <style type="text/css">
            * {
                box-sizing: border-box;
            }

            .div_center {
                text-align: center;
                padding-top: 40px;
            }

            .font_size {
                text-align: center;
                font-size: 40px;
                padding-top: 20px;
            }
            
            .text_color {
                color: black;
                padding-bottom: 20px;
            }

            label {
                display: inline-block;
                width: 200px;
            }

            .div_design {
                padding-bottom: 15px;
            }

            .center {
                margin: auto;
                width: 50%;
                border: 2px solid white;
                text-align: center;
                margin-top: 40px;
            }

            .img_size {
                width: 150px;
                height: 150px;
                object-fit: cover;
            }

            .th_color {
                background: skyblue;
            }

            .th_deg {
                padding: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                @include('admin.header')
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        @if(session()->has('message'))

                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session()->get('message') }}
                            </div>

                        @endif

                        <div class="row">
                            <h2 class="mx-auto font_size">All Products</h2>
                        </div>
                        <table class="center">
                            <tr class="th_color">
                                <th class="th_deg">Product Title</th>
                                <th class="th_deg">Description</th>
                                <th class="th_deg">Quantity</th>
                                <th class="th_deg">Category</th>
                                <th class="th_deg">Price</th>
                                <th class="th_deg">Discount Price</th>
                                <th class="th_deg">Product Image</th>
                                <th class="th_deg">Delete</th>
                                <th class="th_deg">Edit</th>
                            </tr>

                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->discount_price }}</td>
                                    <td>
                                        <img src="/product/{{ $data->image }}" class="img-fluid img_size mx-auto" alt="">
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ url('delete_product', $data->id) }}?token={{ csrf_token() }}">Delete</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('update_product', $data->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>
