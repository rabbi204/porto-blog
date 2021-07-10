
         <footer id="footer">
            <div class="container">
            <div class="footer-ribbon"> <span>Get in Touch</span> </div>
            <div class="row py-5 my-4">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <h5 class="text-3 mb-3">ABOUT THE BLOG</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna semper scelerisque.</p>
                    <p class="mb-0">Praesent venenatis turpis vitae purus semper, eget sagittis velit venenatis ptent taciti sociosqu ad litora...</p>
                    <p class="mb-0"><a href="#" class="btn-flat btn-xs text-color-light p-relative top-5"><strong class="text-2">VIEW MORE</strong><i class="fas fa-angle-right p-relative top-1 pl-2"></i></a></p>
                </div>

                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <h5 class="text-3 mb-3">RECENT POSTS</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach ( $all_posts as $post)
                        @php
   
                            $fetaured = json_decode( $post -> featured );

                        @endphp
                        <li class="media">
                            <article class="d-flex">
                                <a href="#"> <img class="mr-3 rounded-circle" src="{{ URL::to('') }}/media/post/{{ $fetaured -> post_image }}" alt="" style="max-width: 70px;"> </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h6 class="text-3 text-color-light opacity-8 ls-0 mb-1">{{ $post -> title }}</h6>
                                        {{-- <p class="text-2 mb-0">12:53 AM Dec 19th</p> --}}
                                        <p class="text-2 mb-0">{{ date('i:g At M d', strtotime($post -> created_at) ) }} </p>
                                    </a>
                                </div>
                            </article>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="col-md-6 col-lg-3 mb-5 mb-md-0">
                    <h5 class="text-3 mb-3">RECENT COMMENTS</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3 pb-1">
                        <a href="#">
                            <p class="text-3 text-color-light opacity-8 mb-1"><i class="fas fa-angle-right text-color-primary"></i><strong class="ml-2">John Doe</strong> commented on <strong class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
                            <p class="text-2 mb-0">12:55 AM Dec 19th</p>
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <p class="text-3 text-color-light opacity-8 mb-1"><i class="fas fa-angle-right text-color-primary"></i><strong class="ml-2">John Doe</strong> commented on <strong class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
                            <p class="text-2 mb-0">12:55 AM Dec 19th</p>
                        </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-2">
                    <h5 class="text-3 mb-3">CATEGORIES</h5>
                    <p>
                    @foreach($all_cats as $cat)
                        <a href="#"><span class="badge badge-dark bg-color-black badge-sm py-2 mr-1 mb-2 text-uppercase">{{ $cat -> name }}</span></a>
                    @endforeach

                    </p>
                </div>
            </div>
            </div>
            <div class="footer-copyright">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0"> <a href="index.html" class="logo pr-0 pr-lg-3"> <img alt="Porto Website Template" src="porto/assets/img/logo-footer.png" class="opacity-5" height="32"> </a> </div>
                    <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                        <p>© Copyright 2021. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <nav id="sub-menu">
                        <ul>
                            <li><i class="fas fa-angle-right"></i><a href="page-faq.html" class="ml-1 text-decoration-none"> FAQ's</a></li>
                            <li><i class="fas fa-angle-right"></i><a href="sitemap.html" class="ml-1 text-decoration-none"> Sitemap</a></li>
                            <li><i class="fas fa-angle-right"></i><a href="contact-us.html" class="ml-1 text-decoration-none"> Contact Us</a></li>
                        </ul>
                        </nav>
                    </div>
                </div>
            </div>
            </div>
         </footer>


        </div>


      {{-- <a class="style-switcher-open-loader" href="#" data-base-path="" data-skin-src="" data-toggle="tooltip" data-placement="right" title="Style Switcher">
         <i class="fas fa-cogs"></i>
         <div class="style-switcher-tooltip">
            <strong>Style Switcher</strong>
            <p>Check out different color options and styles.</p>
         </div>
      </a> --}}

@include('porto.layouts.partials.scripts')


