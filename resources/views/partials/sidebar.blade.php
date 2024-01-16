<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">Laravel Orders</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/" class="nav-link text-white {{ Request::is('/') ? 'active' : '' }} " aria-current="page">
        <i class="fa-solid fa-house me-2"></i>
          Home
        </a>
      </li>
      @can('admin')
      <li class="nav-item">
        <a href="/items" class="nav-link text-white {{ Request::is('items*') ? 'active' : '' }}">
            <i class="fa-solid fa-cookie-bite me-2"></i>
            Items
        </a>
      </li>
      @endcan
      <li>
        <a href="/buyers" class="nav-link text-white {{ Request::is('buyers*') ? 'active' : '' }}">
            <i class="fa-solid fa-user me-2"></i>
          Buyers
        </a>
      </li>
      <li>
        <a href="/orders" class="nav-link text-white {{ Request::is('orders*') ? 'active' : '' }}">
            <i class="fa-solid fa-cart-shopping me-2"></i>
          Orders
        </a>
      </li>
    </ul>

    <hr>
    <div class="dropdown">
      <p style="cursor: pointer" class="mb-0 d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>Welcome back, {{ auth()->user()->name }}</strong>
      </p>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li>
          <form action="/logout" method="POST">
            @csrf

            <button href="#" class="dropdown-item">Logout</button>
          </form>
        </li>
      </ul>
    </div>
</div>