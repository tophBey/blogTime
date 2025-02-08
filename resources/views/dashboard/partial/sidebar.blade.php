<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">BlogTime</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex {{Request::is('dashboard') ? 'text-primary' : 'text-dark'}} align-items-center gap-2 active" aria-current="page" href="/dashboard">
              <i class="fa-solid fa-gauge"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex {{Request::is('dashboard/post') ? 'text-primary' : 'text-dark'}} align-items-center gap-2" href="/dashboard/post">
              <i class="fa-solid fa-person-chalkboard"></i> My Post
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex {{Request::is('dashboard/post/create') ? 'text-primary' : 'text-dark'}} align-items-center gap-2" href="/dashboard/post/create">
              <i class="fa-solid fa-plus"></i>
                Add Post
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex text-dark align-items-center gap-2" href="/posts">
              <i class="fa-solid fa-list"></i> All Post
              </a>
            </li>
            <li class="nav-item ">
                <form action="/logout" method="post" >
                    @csrf
                    <button type="submit" class="nav-link d-flex text-dark align-items-center gap-2 "><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                </form>

            </li>
          </ul>

          @can('admin')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>Administrator</span></h6>
          <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/dashboard/category" class="nav-link {{Request::is('dashboard/category*') ? 'text-primary' : 'text-dark'}}">
                  <span class="text-bold "><i class="fa-solid fa-border-all"></i> Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard/category" class="nav-link">
                  <span class="text-bold text-dark"><i class="fa-solid fa-border-all"></i> Add User</span>
                </a>
            </li>
          </ul>
          @endcan
          
        </div>
      </div>
</div>