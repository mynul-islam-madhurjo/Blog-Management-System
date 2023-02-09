<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('blog.index') }}">Blogs</a>


        @role('admin')
        {{--        Admin Drop Down Button Start --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin Management
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Manage Blogs</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.genre.index') }}">Manage Genres</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.tag.index') }}">Manage Tags</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.user.index') }}">Manage Users</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.data.create') }}">Manage Data</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        {{--        Admin Drop Down Button End --}}
        @endrole

    </div>
</nav>
