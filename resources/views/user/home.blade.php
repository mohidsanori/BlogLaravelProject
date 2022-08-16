{{-- <x-app-layout>
    <x-slot name="header">

    </x-slot>
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

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icofont-close js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <!-- Start retroy layout blog posts -->
        <section class="section bg-light">
            <div class="container">
                <div class="row align-items-stretch retro-layout">
                    <div class="col-md-4">
                        <a href="single.html" class="h-entry mb-30 v-height gradient">

                            <div class="featured-img" style="background-image: url('images/img_2_horizontal.jpg');">
                            </div>

                            <div class="text">
                                <span class="date">Apr. 14th, 2022</span>
                                <h2>AI can now kill those annoying cookie pop-ups</h2>
                            </div>
                        </a>
                        <a href="single.html" class="h-entry v-height gradient">

                            <div class="featured-img" style="background-image: url('images/img_5_horizontal.jpg');">
                            </div>

                            <div class="text">
                                <span class="date">Apr. 14th, 2022</span>
                                <h2>Don’t assume your user data in the cloud is safe</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="single.html" class="h-entry img-5 h-100 gradient">

                            <div class="featured-img" style="background-image: url('images/img_1_vertical.jpg');"></div>

                            <div class="text">
                                <span class="date">Apr. 14th, 2022</span>
                                <h2>Why is my internet so slow?</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="single.html" class="h-entry mb-30 v-height gradient">

                            <div class="featured-img" style="background-image: url('images/img_3_horizontal.jpg');">
                            </div>

                            <div class="text">
                                <span class="date">Apr. 14th, 2022</span>
                                <h2>Startup vs corporate: What job suits you best?</h2>
                            </div>
                        </a>
                        <a href="single.html" class="h-entry v-height gradient">

                            <div class="featured-img" style="background-image: url('images/img_4_horizontal.jpg');">
                            </div>

                            <div class="text">
                                <span class="date">Apr. 14th, 2022</span>
                                <h2>Thought you loved Python? Wait until you meet Rust</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End retroy layout blog posts -->

        <!-- Start posts-entry -->
        <section class="section posts-entry">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h2 class="posts-entry-title">Latest Blogs</h2>
                    </div>

                </div>
                <div class="row g-3">
                    <div class="col-md-9">
                        <div class="row g-3">
                            
                            @forelse ($latest_blogs as $all_cateitems)
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        <a href="{{ $all_cateitems->category->slug . '/' . $all_cateitems->slug }}"
                                            class="img-link">
                                            <img src="{{ asset('uploads/blog/' . $all_cateitems->image) }}"
                                                width="70px" height="70px" alt="image">
                                        </a>
                                        <span class="date">{{ $all_cateitems->created_at->format('d-m-y') }}</span>
                                        <h2><a href="{{ $all_cateitems->slug }}">{!! $all_cateitems->heading !!}</a>
                                        </h2>
                                        <p>{!! $all_cateitems->slug !!}</p>
                                        <p><a href="{{ $all_cateitems->category->slug . '/' . $all_cateitems->slug }}"
                                                class="btn btn-sm btn-outline-primary">Read
                                                More</a>
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        <h1>No post avalible</h1>
                                    </div>
                                </div>
                            @endforelse


                        </div>
                    </div>

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
                            <h3 class="mb-4">Recent Post Entry</h3>
                            <div class="post-entry-footer">
                                <ul>
                                    <li>
                                        <a href="">
                                            <img src="images/img_1_sq.jpg" alt="Image placeholder"
                                                class="me-4 rounded">
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
                                            <img src="images/img_2_sq.jpg" alt="Image placeholder"
                                                class="me-4 rounded">
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
                                            <img src="images/img_3_sq.jpg" alt="Image placeholder"
                                                class="me-4 rounded">
                                            <div class="text">
                                                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">March 15, 2018 </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


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
</x-app-layout> --}}
