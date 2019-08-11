<!-- Sidebar -->
<div class="sidebar">			
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        <img class="avatar-img rounded-circle" src="{{ Gravatar::src(Auth::user()->email) }}">
                    </div>

               
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                
                                    <h6 class="text-section" style="text-transform: uppercase;"> {{ Auth::user()->name }} </h6>
                                <span class="user-level"> <h6 class="text-section" style="text-transform: uppercase;">{{ Auth::user()->role }} </h6></span>
                                
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="link-collapse">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="dashboard">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ ('/home') }}">
                                        <span class="sub-item">Backend</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ ('/') }}" target="_blank">
                                        <span class="sub-item">Frontend</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Menu Bar</h4>
                    </li>
                    
                    <li class="nav-item">
                        
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Click Here</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                              
                                <li>
                                    <a href="{{route('categories.index')}}">
                                        <span class="sub-item">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('tags.index')}}">
                                        <span class="sub-item">Tags</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                       
                            
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}">
                                <i class="fas fa-file-alt"></i>
                                    <p>Posts</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                    <a href="{{ route('categories.index') }}">
                                    <i class="fas fa-bars"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                        <a href="{{ route('tags.index') }}">
                                        <i class="fas fa-tag"></i>
                                            <p>Tags</p>
                                        </a>
                                    </li>
                               
                            @if(auth()->User()->isAdmin())
                            <li class="nav-item">
                                    <a href="{{ route('users.index') }}">
                                    <i class="fas fa-user-friends"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endif
                    
                            <li class="nav-item">
                                <a href="/laravel-filemanager?type=Images">
                                    <i class="fas fa-folder-open"></i>
                                    <p>File Manager</p>
                                </a>
                            </li>    
                </ul>
            </div>
            <li class="mx-4 mt-5">
                    <a href="{{ route('trashed-post.index') }}" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="fa fa-trash"></i> </span>Trashed Post</a> 
                </li>
        </div>
        
    </div>
    <!-- End Sidebar -->

    