<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          App-cd<span>API</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body ">
        <ul class="nav ">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ url('home')}}" class="nav-link ">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">الرئيسية</span>
            </a>
          </li>
          <li class="nav-item nav-category">Posts</li> 
          <li class="nav-item ">
            <a class="nav-link  " data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title ">منشور</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="post">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ url('/')}}" class="nav-link ">عرض المنشورات</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link ">Read</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/compose.html" class="nav-link ">Compose</a>
                </li>
              </ul>
            </div>
          </li>
         
        </ul>
      </div>
    </nav>
    {{-- <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#"  class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item" href="demo1-rtl/dashboard.html">
            <img src="assets/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item active" href="demo2-rtl/dashboard.html">
            <img src="assets/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav> --}}