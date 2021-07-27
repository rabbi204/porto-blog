@extends('porto.layouts.app')


@section('page-title', $single_post -> title )

@section('page-category')
    @foreach($single_post -> categories as $cat)
        @section('page-category',  $cat -> name )
    @endforeach
@endsection


@section('main-content')
<div class="col-lg-9 order-lg-1">
	<div class="blog-posts single-post">
		<article class="post post-large blog-single-post border-0 m-0 p-0">
			<div class="post-image ml-0">
				
                    @php
                        $featured = json_decode( $single_post -> featured );
                    @endphp

                    @if($featured -> post_type == 'Image')
                        <img src="{{ URL::to('') }}/media/post/{{ $featured -> post_image }}" class="porto/assets/img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                        {{-- @elseif($featured -> post_type == 'Gallery'){
                            @foreach ($featured -> post_gallery as $gall )
                            <li>
                                <img src="{{ URL::to('') }}/media/post/{{ $gall }}" alt="">
                            </li>
                            @endforeach
                        } --}}
                    @endif
                    
                    
                 
			</div>
			<div class="post-date ml-0"> <span class="day">10</span> <span class="month">Jan</span> </div>
			<div class="post-content ml-0">
				<h2 class="font-weight-semi-bold">{{ $single_post -> title }}</h2>
				<div class="post-meta"> <span><i class="far fa-user"></i> By <a href="#">{{ $single_post -> user -> name }}</a> </span> 
                    <span><i class="far fa-folder"></i>
                        @foreach ($single_post -> categories as $cat)
                            <a href="{{ route('blog.category.search', $cat -> slug) }}">{{$cat -> name}}</a>,
                        @endforeach
                        
                         
                    </span>
                      <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> </div>
				<p>{!! htmlspecialchars_decode($single_post -> content) !!}</p>
				<div class="post-block mt-5 post-share">
					<h4 class="mb-3">Share this Post</h4>
					<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
						<a class="addthis_button_tweet"></a>
						<a class="addthis_button_pinterest_pinit"></a>
						<a class="addthis_counter addthis_pill_style"></a>
					</div>
					<script type="text/javascript" src="../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
				</div>
				<div class="post-block mt-4 pt-2 post-author">
					<h4 class="mb-3">Author</h4>
					<div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
						<a href="blog-post.html"> <img src="{{ asset('porto/assets/img/avatars/avatar.jpg') }}" alt=""> </a>
					</div>
					<p><strong class="name"><a href="#" class="text-4 pb-2 pt-2 d-block">{{ $single_post -> user -> name }}</a></strong></p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui. </p>
				</div>
				<br>

                @if ( Session::has('success') )
				<p class="alert alert-success">{{ Session::get('success') }}</p>
				@endif

				


				<div id="comments" class="post-block mt-5 post-comments">
					<h4 class="mb-3">Comments (1)</h4>
					<ul class="comments">

						@foreach ($single_post -> comments as $comment)

						@if ($comment -> comment_id == null)
							
						<li>
							<div class="comment">
								<div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block"> <img class="avatar" alt="" src="{{ URL::to('porto/assets/img/avatars/avatar-2.jpg') }}"> </div>
								<div class="comment-block">
									<div class="comment-arrow"></div> <span class="comment-by">
                                             <strong>{{ $comment -> user -> name }}</strong>
                                             <span class="float-right">
                                             <span>
												 @guest
												 <p>Please <a href="{{ route('admin.login') }}">Login</a> first for place a reply</p>
												 @else
												 <a c_id="{{ $comment -> id }}" class="post-reply-btn" href="#"><i class="fas fa-reply"></i> Reply</a>
												 <div class="reply-box reply-box-{{ $comment -> id }} ">
													<form action="{{ route('blog.post.reply') }}" method="POST">
														@csrf
														<div class="form-row">
															<div class="form-group col">
																<input name="post_id" type="hidden" value="{{ $single_post -> id }}">
																<input name="comment_id" type="hidden" value="{{ $comment -> id }}">
																<input name="reply_text" class="form-control" type="text" >
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
																<button class="btn btn-primary" type="submit">Reply</button>
															</div>
														</div>
														
													</form>
												 </div>
												 @endguest
												  
											</span> </span>
									</span>
									<p>{{ $comment -> text }}</p> <span class="date float-right">{{ date('F d, Y',strtotime( $comment -> created_at ) ) }} at {{ date('g:i A',strtotime( $comment -> created_at ) ) }}</span> </div>

							</div>

							@php
								$comments = App\Models\Comment::where('comment_id','!=',null) -> where('comment_id',$comment -> id) -> latest() -> get();
							@endphp

							@foreach ($comments as $comm)	
							<ul class="comments reply">
								<li>
									<div class="comment">
										<div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block"> <img class="avatar" alt="" src="{{ asset('porto/assets/img/avatars/avatar-3.jpg') }}"> </div>
										<div class="comment-block">
											<div class="comment-arrow"></div> <span class="comment-by">
                                                   <strong>{{ $comm -> user -> name }}</strong>
                                                   <span class="float-right">
                                                   <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span> </span>
											</span>
											<p>{{ $comm -> text  }}</p> <span class="date float-right">{{ date('F d, Y',strtotime( $comment -> created_at ) ) }} at {{ date('g:i A',strtotime( $comment -> created_at ) ) }}</span></span> </div>
									</div>
								</li>
							</ul>
							@endforeach

						</li>
						@endif
						@endforeach

					</ul>
				</div>

				@guest
					<p>Please <a href="{{ route('admin.login') }}">Login</a> first befor place a comment</p>
				  @else
				<div class="post-block mt-5 post-leave-comment">

					<h4 class="mb-3">Leave a comment</h4>
					<form class="contact-form p-4 rounded bg-color-grey" action="{{ route('blog.post.comment') }}" method="POST">
						@csrf
						<div class="p-2">
							{{-- <div class="form-row">
								<div class="form-group col-lg-6">
									<label class="required font-weight-bold text-dark">Full Name</label>
									<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required> </div>
								<div class="form-group col-lg-6">
									<label class="required font-weight-bold text-dark">Email Address</label>
									<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required> </div>
							</div> --}}
							<div class="form-row">
								<div class="form-group col">
									<label class="required font-weight-bold text-dark">Comment</label>
									<input name="post_id" type="hidden" value="{{ $single_post -> id }}">
									<textarea name="comments" maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control" name="message" required></textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col mb-0">
									<input type="submit" value="Post Comment" class="btn btn-primary btn-modern" data-loading-text="Loading..."> </div>
							</div>
						</div>
					</form>
				</div>
				@endguest

			</div>
		</article>
	</div>
</div>
@endsection