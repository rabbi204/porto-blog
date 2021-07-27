
<div class="col-lg-3 order-lg-2">
    <aside class="sidebar">

        <form action="{{ route('blog.post.search') }}" method="POST">
            @csrf
            <div  class="input-group mb-3 pb-1"> <input name="search" class="form-control text-1" placeholder="Search..." name="s" id="s" type="text"> <span class="input-group-append"> <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button> </span> </div>
        </form>

        <h5 class="font-weight-semi-bold pt-4">Categories</h5>
        <ul class="nav nav-list flex-column mb-5">

            @php
                $all_cat = App\Models\Category::all() -> take(5);
            @endphp

            @foreach( $all_cat as $cat )
                <li class="nav-item"><a class="nav-link" href="{{ route('blog.category.search', $cat -> slug) }}"> {{ $cat -> name }} </a></li>
            @endforeach

            {{-- <li class="nav-item"><a class="nav-link" href="#">Design (2)</a></li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Photos (4)</a>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="#">Animals</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sports</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">People</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Videos (3)</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Lifestyle (2)</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Technology (1)</a></li> --}}
        </ul>

        <div class="tabs tabs-dark mb-4 pb-2">
            <ul class="nav nav-tabs">
                <li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
                <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="popularPosts">
                    <ul class="simple-post-list">
                    <li>
                        <div class="post-image">
                            <div class="porto/assets/img-thumbnail img-thumbnail-no-borders d-block"> <a href="blog-post.html"> <img src="porto/assets/img/blog/square/blog-11.jpg" width="50" height="50" alt=""> </a> </div>
                        </div>
                        <div class="post-info">
                            <a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
                            <div class="post-meta"> Nov 10, 2021 </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-image">
                            <div class="porto/assets/img-thumbnail img-thumbnail-no-borders d-block"> <a href="blog-post.html"> <img src="porto/assets/img/blog/square/blog-24.jpg" width="50" height="50" alt=""> </a> </div>
                        </div>
                        <div class="post-info">
                            <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                            <div class="post-meta"> Nov 10, 2021 </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-image">
                            <div class="porto/assets/img-thumbnail img-thumbnail-no-borders d-block"> <a href="blog-post.html"> <img src="porto/assets/img/blog/square/blog-42.jpg" width="50" height="50" alt=""> </a> </div>
                        </div>
                        <div class="post-info">
                            <a href="blog-post.html">Odiosters Nullam Vitae</a>
                            <div class="post-meta"> Nov 10, 2021 </div>
                        </div>
                    </li>
                    </ul>
                </div>

                <div class="tab-pane" id="recentPosts">
                    <ul class="simple-post-list">

                        @php
                            $all_posts = App\Models\Post::where('status',true) -> where('trash', false) ->take(4) -> latest() -> get();
                        @endphp

                        @foreach( $all_posts as $post )
                        @php
                            $fetaured = json_decode( $post -> featured )
                        @endphp
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail img-thumbnail-no-borders d-block"> <a href="{{ route('blog.post.single', $post -> slug) }}"> <img src="{{ URL::to('') }}/media/post/{{ $fetaured ->post_image }}" width="50" height="50" alt=""> </a> </div>
                            </div>
                            <div class="post-info">
                                <a href="{{ route('blog.post.single', $post -> slug) }}">{{ $post -> title }}</a>
                                <div class="post-meta"> {{ date('F d, Y', strtotime($post -> created_at) ) }}
                            </div>
                        </li>
                        @endforeach
                 </ul>
                </div>
            </div>
        </div>
        <h5 class="font-weight-semi-bold pt-4">About Us</h5>
        <p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>
    </aside>
</div>

