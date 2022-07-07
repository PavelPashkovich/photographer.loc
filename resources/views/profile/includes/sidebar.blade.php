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
                <a href="{{ route('profile.user.edit', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name }}</a>
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
                <a href="{{ route('profile.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                        Main profile
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.photo.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Photos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.liked-photo.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-heart"></i>
                    <p>
                        Liked photos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.comment.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                        Comments
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
