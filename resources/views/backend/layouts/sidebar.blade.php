<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{asset('/')}}admin/dashboard"> <img alt="image" src="{{asset('/')}}backend/assets/img/logo.png" class="header-logo" />
            {{-- <span class="logo-name">{{ config('app.name')}}</span> --}}
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{Route::is('admin.dashboard') ? 'active' : ''}} ">
          <a href="{{asset('/')}}admin/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>

        {{--Roles & People--}}
        @if (Auth::guard('admin')->user()->can('role.view') && Auth::guard('admin')->user()->can('admin.view'))
        <li class="menu-header">Roles & People</li>
        @else
            @if (Auth::guard('admin')->user()->can('role.view'))
            <li class="menu-header">Roles</li>
            @endif
            @if (Auth::guard('admin')->user()->can('admin.view'))
            <li class="menu-header">Admins</li>
            @endif
        @endif

        {{--Roles--}}
        @if (Auth::guard('admin')->user()->can('role.view'))
        <li class="dropdown {{Route::is('admin.roles.index') || Route::is('admin.roles.create') ||Route::is('admin.roles.edit') ? 'active' : ''}} ">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Roles</span></a>
          <ul class="dropdown-menu">
            @if (Auth::guard('admin')->user()->can('role.view'))
            <li class=" {{Route::is('admin.roles.index') || Route::is('admin.roles.create') ||Route::is('admin.roles.edit') ? 'active' : ''}} "><a class="nav-link" href="{{asset('/')}}admin/roles">All Roles</a></li>
            @endif
        </ul>
        </li>
        @endif

        {{--Admins--}}
        @if (Auth::guard('admin')->user()->can('admin.view') || Auth::guard('admin')->user()->can('admin.create'))
        <li class="dropdown {{Route::is('admin.admins.index') || Route::is('admin.admins.create') ||Route::is('admin.admins.edit') ? 'active' : ''}} ">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>Admins</span></a>
            <ul class="dropdown-menu">
              @if (Auth::guard('admin')->user()->can('admin.view'))
              <li class=" {{Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : ''}} "><a class="nav-link" href="{{route('admin.admins.index')}}">All Admins</a></li>
              @endif
              @if (Auth::guard('admin')->user()->can('admin.create'))
              <li class=" {{Route::is('admin.admins.create') ? 'active' : ''}} "><a class="nav-link" href="{{route('admin.admins.create')}}">Add Admin</a></li>
              @endif
            </ul>
        </li>
        @endif

        {{--Users--}}
        @if (Auth::guard('admin')->user()->can('user.view') || Auth::guard('admin')->user()->can('user.create'))
        <li class="dropdown {{Route::is('admin.users.index') || Route::is('admin.users.create') ||Route::is('admin.users.edit') ? 'active' : ''}} ">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Users</span></a>
            <ul class="dropdown-menu">
              @if (Auth::guard('admin')->user()->can('user.view'))
              <li class=" {{Route::is('admin.users.index') || Route::is('admin.users.edit') ? 'active' : ''}} "><a class="nav-link" href="{{route('admin.users.index')}}">All Users</a></li>
              @endif
              @if (Auth::guard('admin')->user()->can('user.create'))
              <li class=" {{Route::is('admin.users.create') ? 'active' : ''}} "><a class="nav-link" href="{{route('admin.users.create')}}">Add User</a></li>
              @endif
            </ul>
        </li>
        @endif

        {{--Settings & Pages--}}
        @if (Auth::guard('admin')->user()->can('pages.home')||Auth::guard('admin')->user()->can('settings.site')||Auth::guard('admin')->user()->can('settings.header&footer'))
        <li class="menu-header">Settings & Pages</li>
        @endif

        {{--Pages--}}
        @if (Auth::guard('admin')->user()->can('pages.home'))
        <li class="dropdown {{Route::is('admin.pages.home.index') ? 'active' : ''}}">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Pages</span></a>
          <ul class="dropdown-menu">
            @if (Auth::guard('admin')->user()->can('pages.home'))
            <li class="{{Route::is('admin.pages.home.index') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin.pages.home.index')}}">Home</a></li>
            @endif
          </ul>
        </li>
        @endif

        {{--Settings--}}
        @if (Auth::guard('admin')->user()->can('settings.site'))
        <li class="dropdown {{Route::is('admin.settings.site.index')||  Route::is('admin.settings.social.index') ? 'active' : ''}}">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"></i><span>Settings</span></a>
          <ul class="dropdown-menu">
            @if (Auth::guard('admin')->user()->can('settings.site'))
            <li class="{{Route::is('admin.settings.site.index') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin.settings.site.index')}}">Site Settings</a></li>
            @endif
            @if (Auth::guard('admin')->user()->can('settings.social'))
            <li class="{{Route::is('admin.settings.social.index') ? 'active' : ''}} "><a class="nav-link" href="{{route('admin.settings.social.index')}}">Social</a></li>
            @endif
          </ul>
        </li>
        @endif

      </ul>
    </aside>
  </div>
