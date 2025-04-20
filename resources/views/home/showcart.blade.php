<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="home/home/images/favicon.png" type="">
        <title>Famms - Fashion HTML Template</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="home/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="home/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="home/css/responsive.css" rel="stylesheet" />

        <style type="text/css">
            .center {
                margin: auto;
                width: 50%;
                text-align: center;
                padding: 30px;
            }

            .center table {
                margin: auto;
                text-align: center;
                padding: 30px;
            }

            table,th,td {
                border: 1px solid grey;
            }

            .th_deg {
                font-size: 30px;
                padding: 5px;
                background: skyblue;
            }
        </style>
    </head>
    <body>
        <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            <!-- slider section -->
            
            <!-- end slider section -->
        </div>

        <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>

                @foreach ($cart as $carts)

                <tr>
                    <td>{{ $carts->product_title }}</td>
                    <td>{{ $carts->quantity }}</td>
                    <td>{{ $carts->price }}</td>
                    <td>
                        <img src="product/{{ $carts->image }}" alt="" style="width: 200px; object-fit: cover;">
                    </td>
                </tr>

                @endforeach
                
            </table>
        </div>
        
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
    </body>
</html>