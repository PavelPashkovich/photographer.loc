<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="@if(isset(auth()->user()->avatar)){{ asset('storage/'.auth()->user()->avatar) }}@else{{ asset('storage/avatars/noavatar.jpg') }}@endif" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.user.edit', auth()->user()->id) }}" class="d-block">@if(isset(auth()->user()->name)){{ auth()->user()->name }}@endif</a>
            </div>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home Page
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                        Main
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.photo.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Photos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.city.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-city"></i>
                    <p>
                        Cities
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.role.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>
                        Roles
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.comment.index') }}" class="nav-link">
                    <i class="nav-icon far fa-comments"></i>
                    <p>
                        Comments
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
