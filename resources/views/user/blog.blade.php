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


        <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/tiny-slider.js') }}"></script>

        <script src="{{ asset('js/flatpickr.min.js') }}"></script>


        <script src="{{ asset('js/aos.js') }}"></script>
        <script src="{{ asset('js/glightbox.min.js') }}"></script>
        <script src="{{ asset('js/navbar.js') }}"></script>
        <script src="{{ asset('js/counter.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>


        <title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
    </head>

    <body>





        <section class="section">
            <div class="container">

                <div class="row blog-entries element-animate">

                    <div class="col-md-12 col-lg-8 main-content">

                        <div class="post-content-body" style="padding-left: 40px">

                            <h6
                                style="font-size: 12px; font-family: helvetica, sans-serif; font-weight: 500; font-style: normal; 
                             text-indent: 25px; text-transform: uppercase; letter-spacing: 1px; line-height: 1.5;color: #000;
                            ">
                                >Posted On: {!! $blog->created_at->format('d-m-y') !!}</h6>
                            <h6
                                style="font-size: 12px; font-family: helvetica, sans-serif; font-weight: 500; font-style: normal; 
                             text-indent: 25px; text-transform: uppercase; letter-spacing: 1px; line-height: 1.5;color: #000;
                            ">
                                >{!! $blog->category->slug !!} / {!! $blog->slug !!}</h6>
                            <div class="img"
                                style="display: block; margin-left: auto; margin-right: auto; width: 50%; padding-top:40px;">
                                <img src="{{ asset('uploads/blog/' . $blog->image) }}" width="600px" height="600px"
                                    alt="image">
                            </div>
                            <div class="text"
                                style="font-size: 12px; font-family: Trebuchet MS,helvetica, cursive; font-weight: 500; font-style: normal; 
                            text-align: center; text-indent: 25px; text-transform: uppercase; letter-spacing: 1px; line-height: 1.5;color: #000;
                            padding-top:35px;">
                                {!! $blog->description !!}
                            </div>

                        </div>

                    </div>

                    <div class="cm" style="padding-left: 40px">
                        <div class="pt-5 comment-wrap">
                            <h3 class="mb-5 heading">All Comments <span
                                    class="comment-count btn btn-sm btn-outline-info">{{ count($blog->comments) }}</span>

                                <small class="float-right">
                                    @role('user')
                                        <div class="like">
                                            <form action="{{ url('savelikedislike') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                    <button type="submit"
                                                        class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold"
                                                        value="like" name="type">Like
                                                        <span class="like-count">{{ $blog->likes() }}</span>
                                                    </button>

                                                    <button type="submit"
                                                        class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold"
                                                        value="dislike" name="type">Dislike
                                                        <span class="dislike-count">{{ $blog->dislikes() }}</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="guestview">
                                            <button onclick="show()"
                                                class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">Like
                                                <span class="like-count">{{ $blog->likes() }}</span>
                                            </button>

                                            <button onclick="show()"
                                                class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold">Dislike
                                                <span class="dislike-count">{{ $blog->dislikes() }}</span>
                                            </button>
                                        </div>
                                    @endrole
                                </small>

                            </h3>
                            <ul class="comment-list">
                                @forelse ($blog->comments as $comment)
                                    <li class="comment">
                                        <div class="comment-body">
                                            @if ($comment->user)
                                                <h4>{!! $comment->user->name !!}</h4>
                                            @endif
                                            <small>Commented on:
                                                {{ $comment->created_at->format('d-m-y') }}</small>

                                            <h3>{!! $comment->comment_body !!}</h3>
                                        </div>
                                    </li>
                                @empty
                                    <h6>No Comment Yet</h6>
                                @endforelse
                            </ul>
                        </div>
                        <!-- END comment-list -->
                        @if (session('message'))
                            <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
                        @endif
                        @role('user')
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Leave a comment</h3>
                                <form action="{{ url('comment') }}" method="POST" class="p-5 bg-light">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="blog_slug" value="{{ $blog->slug }}">
                                        <textarea name="comment_body" id="message" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Post</button>

                                </form>
                            </div>
                        @else
                            <h3> LOGIN TO COMMENT </h3>
                        @endrole
                    </div>
                </div>
                <h6></h6>
            </div>

            <!-- END main-content -->


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


    </body>
    <script>
        function show() {
            alert("Login to Like/Dislike Post!");
        }
    </script>

    </html>
</x-app-layout>
