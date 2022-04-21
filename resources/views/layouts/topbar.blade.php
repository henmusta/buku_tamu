<!-- Main Header-->
<div class="main-header side-header sticky">
  <div class="container-fluid">
    <div class="main-header-left">
      <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
    </div>
    <div class="main-header-center">
      <div class="responsive-logo">
        <a href="index.html"><img src="../../assets/img/brand/logo.png" class="mobile-logo" alt="logo"></a>
        <a href="index.html"><img src="../../assets/img/brand/logo-light.png" class="mobile-logo-dark" alt="logo"></a>
      </div>
      <!-- <div class="input-group">
        <div class="input-group-btn search-panel">
          <select class="form-control select2">
            <option label="All categories">
            </option>
            <option value="IT Projects">
              IT Projects
            </option>
            <option value="Business Case">
              Business Case
            </option>
            <option value="Microsoft Project">
              Microsoft Project
            </option>
            <option value="Risk Management">
              Risk Management
            </option>
            <option value="Team Building">
              Team Building
            </option>
          </select>
        </div>
        <input type="search" class="form-control rounded-0" placeholder="Search for anything...">
        <button class="btn search-btn"><i class="fe fe-search"></i></button>
      </div> -->
    </div>
    <div class="main-header-right">
      <!-- <div class="dropdown header-search">
        <a class="nav-link icon header-search">
          <i class="fe fe-search header-icons"></i>
        </a>
        <div class="dropdown-menu">
          <div class="main-form-search p-2">
            <div class="input-group">
              <div class="input-group-btn search-panel">
                <select class="form-control select2">
                  <option label="All categories">
                  </option>
                  <option value="IT Projects">
                    IT Projects
                  </option>
                  <option value="Business Case">
                    Business Case
                  </option>
                  <option value="Microsoft Project">
                    Microsoft Project
                  </option>
                  <option value="Risk Management">
                    Risk Management
                  </option>
                  <option value="Team Building">
                    Team Building
                  </option>
                </select>
              </div>
              <input type="search" class="form-control" placeholder="Search for anything...">
              <button class="btn search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-search">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="dropdown d-md-flex">
        <a class="nav-link icon full-screen-link" href="">
          <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
          <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
        </a>
      </div>
      <div class="dropdown main-header-notification">
        <a class="nav-link icon" href="">
          <i class="fe fe-bell header-icons"></i>
          <span class="badge bg-danger nav-link-badge">4</span>
        </a>
        <div class="dropdown-menu">
          <div class="header-navheading">
            <p class="main-notification-text">You have 1 unread notification<span
                class="badge bg-pill bg-primary ms-3">View all</span></p>
          </div>
          <div class="main-notification-list">
            <div class="media new">
              <div class="main-img-user online"><img alt="avatar" src="../../assets/img/users/5.jpg"></div>
              <div class="media-body">
                <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
              </div>
            </div>
            <div class="media">
              <div class="main-img-user"><img alt="avatar" src="../../assets/img/users/2.jpg"></div>
              <div class="media-body">
                <p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
              </div>
            </div>
            <div class="media">
              <div class="main-img-user online"><img alt="avatar" src="../../assets/img/users/3.jpg"></div>
              <div class="media-body">
                <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
              </div>
            </div>
          </div>
          <div class="dropdown-footer">
            <a href="#">View All Notifications</a>
          </div>
        </div>
      </div> -->
      <div class="dropdown main-profile-menu">
        <a class="d-flex" href="">
          <span class="main-img-user"><img alt="avatar" src="../../assets/img/users/1.jpg"></span>
        </a>
        <div class="dropdown-menu">
          <div class="header-navheading">
            <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
            <p class="main-notification-text">{{ Auth::user()->roles[0]->name }}</p>
          </div>
          <a class="dropdown-item border-top" href="profile.html">
            <i class="fe fe-edit"></i> Ubah Profile
          </a>
          <a class="dropdown-item" href="profile.html">
            <i class="fe fe-edit"></i> Ubah Password
          </a>
          <a class="dropdown-item" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fe fe-power"></i> Keluar
          </a>
        </div>
      </div>
      <div class="dropdown d-md-flex header-settings">
        <a href="#" class="nav-link icon" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right">
          <i class="fe fe-align-right header-icons"></i>
        </a>
      </div>
      <button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent-4"
              aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
      </button>
      <!-- Navresponsive closed -->
    </div>
  </div>
</div>
<!-- End Main Header-->

<!-- Mobile-header -->
<div class="mobile-main-header">
  <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <div class="d-flex order-lg-2 ms-auto">
        <div class="dropdown header-search">
          <a class="nav-link icon header-search">
            <i class="fe fe-search header-icons"></i>
          </a>
          <!-- <div class="dropdown-menu">
            <div class="main-form-search p-2">
              <div class="input-group">
                <div class="input-group-btn search-panel">
                  <select class="form-control select2">
                    <option label="All categories">
                    </option>
                    <option value="IT Projects">
                      IT Projects
                    </option>
                    <option value="Business Case">
                      Business Case
                    </option>
                    <option value="Microsoft Project">
                      Microsoft Project
                    </option>
                    <option value="Risk Management">
                      Risk Management
                    </option>
                    <option value="Team Building">
                      Team Building
                    </option>
                  </select>
                </div>
                <input type="search" class="form-control" placeholder="Search for anything...">
                <button class="btn search-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                       class="feather feather-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg>
                </button>
              </div>
            </div>
          </div> -->
        </div>
        <!-- <div class="dropdown ">
          <a class="nav-link icon full-screen-link">
            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
          </a>
        </div>
        <div class="dropdown main-header-notification">
          <a class="nav-link icon" href="">
            <i class="fe fe-bell header-icons"></i>
            <span class="badge bg-danger nav-link-badge">4</span>
          </a>
          <div class="dropdown-menu">
            <div class="header-navheading">
              <p class="main-notification-text">You have 1 unread notification<span
                  class="badge bg-pill bg-primary ms-3">View all</span></p>
            </div>
            <div class="main-notification-list">
              <div class="media new">
                <div class="main-img-user online"><img alt="avatar" src="../../assets/img/users/5.jpg"></div>
                <div class="media-body">
                  <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
                </div>
              </div>
              <div class="media">
                <div class="main-img-user"><img alt="avatar" src="../../assets/img/users/2.jpg"></div>
                <div class="media-body">
                  <p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
                </div>
              </div>
              <div class="media">
                <div class="main-img-user online"><img alt="avatar" src="../../assets/img/users/3.jpg"></div>
                <div class="media-body">
                  <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
                </div>
              </div>
            </div>
            <div class="dropdown-footer">
              <a href="#">View All Notifications</a>
            </div>
          </div>
        </div> -->
        <div class="dropdown main-profile-menu">
          <a class="d-flex" href="#">
            <span class="main-img-user"><img alt="avatar" src="../../assets/img/users/1.jpg"></span>
          </a>
          <div class="dropdown-menu">
            <div class="header-navheading">
              <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
              <p class="main-notification-text"> {{ Auth::user()->roles[0]->name }}</p>
            </div>
            <a class="dropdown-item border-top" href="profile.html">
              <i class="fe fe-edit"></i> Ubah Profile
            </a>
            <a class="dropdown-item" href="profile.html">
              <i class="fe fe-edit"></i> Ubah Password
            </a>
            <a class="dropdown-item" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fe fe-power"></i> Keluar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
  @csrf
</form>
<!-- Mobile-header closed -->
