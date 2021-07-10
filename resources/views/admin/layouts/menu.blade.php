<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ (Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' ) }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Blogs</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ (Route::currentRouteName() == 'post.create' ? 'fix' : '' ) }}"><a href="{{ route('post.create') }}">Add New Post</a></li>
                        <li class="{{ (Route::currentRouteName() == 'post.index' ? 'fix' : '' ) }}"><a href="{{ route('post.index') }}">All Post</a></li>
                        <li class="{{ (Route::currentRouteName() == 'category.index' ? 'fix' : '' ) }}"><a href="{{ route('category.index') }}">Category</a></li>
                        <li class="{{ (Route::currentRouteName() == 'tag.index' ? 'fix' : '' ) }}"><a href="{{ route('tag.index') }}">Tag</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Product</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">All Product</a></li>
                        <li><a href="invoice-report.html">Category</a></li>
                        <li><a href="invoice-report.html">Tag</a></li>
                        <li><a href="invoice-report.html">Brand</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
