@extends('porto.layouts.app')

@section('main-content')

@include('porto.layouts.partials.sidebar')

<div class="col-lg-9 order-lg-1">
    <div class="blog-posts">
        <div class="row px-3">

        
          @foreach ($all_posts as $post)
           @php
   
               $fetaured = json_decode( $post -> featured );

           @endphp
                
          <div class="col-sm-6">
             <article class="post post-medium border-0 pb-0 mb-5">

                @if($fetaured -> post_type == 'Image')
                <div class="post-image">
                   <a href="blog-post.html">
                     <img src="{{ URL::to('') }}/media/post/{{ $fetaured ->post_image }} " class="porto/assets/img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                   </a>
                </div>
                @endif

                    {{-- for post gallery show --}}

                {{-- @if($fetaured -> post_type == 'Gallery')

                    @foreach($fetaured -> post_gallery as $gall )
                        <div class="post-image">
                            <a href="blog-post.html">
                                <img src="{{ URL::to('') }}/media/post/{{ $gall }} " class="porto/assets/img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                             </a>
                        </div>
                    @endforeach
                
                @endif --}}
                

                <div class="post-content">
                   <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">{{ $post -> title }}</a></h2>
                   <p> {!! Str::of(htmlspecialchars_decode($post -> content)) -> words(20) !!} </p>
                   <div class="post-meta">
                      <span><i class="far fa-user"></i> By <a href="{{ $post -> user_id }}">{{ $post -> user -> name }}</a> </span>
                      <span><i class="far fa-folder"></i>
                        @foreach ( $post -> categories as $cat)
                         <a href="">{{ $cat -> name }}</a>,
                        @endforeach
                     </span>
                      <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                      <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                   </div>
                </div>
             </article>
          </div>
          @endforeach
          

        </div>

       {{ $all_posts -> links() }}

       {{-- <div class="row">
          <div class="col">
             <ul class="pagination float-right">
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
             </ul>
          </div>
       </div> --}}

    </div>
 </div>
@endsection
