
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('admin-assets/dist/img/user2.jpg')}}" class="img-circle elevation-2" alt="User Image">
          <span class="user-text font-weight-light ml-1 text-white">{{auth()->user()->name}}</span>
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>
        <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-baseball-ball"></i>
                        <p>
                           Cricket
                           <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"role="menu">
                        <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon fas fa-newspaper"></i>
                                 <p>
                                    News
                                    <i class="right fas fa-angle-left"></i>
                                 </p>
                             </a>

                             <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.news')}}" class="nav-link">
                                       <p>All News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.news.new')}}" class="nav-link">
                                       <p>New News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.news.category')}}" class="nav-link">
                                       <p>News Category</p>
                                    </a>
                                </li>
                            </ul>

                    </ul>

            </ul>
        </nav>
    </div>>
</aside>
