<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="text-dark font-weight-bold text-8">@yield('page-title', 'Grid Right Sidebar')</h1>
            <span class="sub-title text-dark">@yield('page-category','Check out our Latest News!')</span>
            </div>
            <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb d-block text-center">
                <li><a href="{{ route('blog.post') }}">Home</a></li>
                <li class="active">Blog</li>
            </ul>
            </div>
        </div>
    </div>
</section>