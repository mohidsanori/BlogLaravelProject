<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<x-app-layout>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Untree.co">
        <link rel="shortcut icon" href="favicon.png">

        <meta name="description" content="" />
        <meta name="keywords" content="bootstrap, bootstrap5" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/tiny-slider.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/glightbox.min.css">
        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="css/flatpickr.min.css">


        <title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
    </head>

    <body>



        <div class="site-cover site-cover-sm same-height overlay single-page"
            style="background-image: url('images/hero_5.jpg');">
            <div class="container">
                <div class="row same-height justify-content-center">
                    <div class="col-md-6">
                        <div class="post-entry text-center">
                            <h1 class="mb-4">All Content of {{ $category->name }}</h1>
                            <div class="post-meta align-items-center text-center">

                                <span>&nbsp;&nbsp;Blog</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container">

                <div class="row blog-entries element-animate">

                    <div class="col-md-12 col-lg-8 main-content">

                        <div class="post-content-body">
                            @forelse($blog as $blogitem)
                                <div class="card card-shadow mt-4"
                                    style="box-shadow: 0 2px 8px 0 rgb(0 0 0 / 10%), border-radius:5px">
                                    <div class="card-body">
                                        <div class="img" style="float: left">
                                            <img src="{{ asset('uploads/blog/' . $blogitem->image) }}" width="70px"
                                                height="70px" alt="image">
                                        </div>
                                        <a href="{{ $category->slug . '/' . $blogitem->slug }}">
                                            <h2 class="post-heading" style="font-size: 26px, color:#000">
                                                {{ $blogitem->heading }}</h2>
                                        </a>
                                        <h6>Posted On: {{ $blogitem->created_at->format('d-m-y') }}</h6>

                                    </div>
                                </div>
                            @empty
                                <div class="card card-shadow mt-4">
                                    <div class="card-body">
                                        <h1>No Post Availible</h1>
                                    </div>
                                </div>
                            @endforelse

                        </div>

                    </div>




                </div>

                <!-- END main-content -->
                <h6></h6>

            </div>
            </div>
        </section>



        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget">
                            <h3 class="mb-4">About</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div> <!-- /.widget -->
                        <div class="widget">
                            <h3>Social</h3>
                            <ul class="list-unstyled social">
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                                <li><a href="#"><span class="icon-dribbble"></span></a></li>
                            </ul>
                        </div> <!-- /.widget -->
                    </div> <!-- /.col-lg-4 -->
                    <div class="col-lg-4 ps-lg-5">
                        <div class="widget">
                            <h3 class="mb-4">Company</h3>
                            <ul class="list-unstyled float-start links">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Vision</a></li>
                                <li><a href="#">Mission</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                            <ul class="list-unstyled float-start links">
                                <li><a href="#">Partners</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Creative</a></li>
                            </ul>
                        </div> <!-- /.widget -->
                    </div> <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="widget">
                            {{-- <h3 class="mb-4">Recent Post Entry</h3>
            <div class="post-entry-footer">
              <ul>
                <li>
                  <a href="">
                    <img src="images/img_1_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="images/img_2_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="images/img_3_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div> --}}


                        </div> <!-- /.widget -->
                    </div> <!-- /.col-lg-4 -->
                </div> <!-- /.row -->

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <!--
              **==========
              NOTE:
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/
              **==========
            -->

                        <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash; Designed with love by <a
                                href="https://untree.co">Untree.co</a>
                            <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>
                </div>
            </div> <!-- /.container -->
        </footer> <!-- /.site-footer -->

        <!-- Preloader -->
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>


        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/tiny-slider.js"></script>

        <script src="js/flatpickr.min.js"></script>


        <script src="js/aos.js"></script>
        <script src="js/glightbox.min.js"></script>
        <script src="js/navbar.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>


    </body>

    </html>
</x-app-layout>
