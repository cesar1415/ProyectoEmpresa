<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{ asset('images/faces/face16.jpg') }}" alt="image" />
                </div>
                <div class="profile-name text-truncate">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Panel Principal</span>
            </a>
        </li>
        @canany(['reports.day', 'reports.date'])
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                    aria-controls="page-layouts">
                    <i class="fas fa-chart-line menu-icon"></i>
                    <span class="menu-title">Reportes</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="page-layouts1">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{ route('reports.day') }}">Reportes por día</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reports.date') }}">Reportes por fecha</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcanany
        @canany(['purchases.index', 'purchases.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('purchases.index') }}">
                    <i class="fas fa-cart-plus menu-icon"></i>
                    <span class="menu-title">Compras</span>
                </a>
            </li>
        @endcanany
        @canany(['sales.index', 'sales.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sales.index') }}">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-title">Ventas</span>
                </a>
            </li>
        @endcanany
        @canany(['categories.index', 'categories.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-tags menu-icon"></i>
                    <span class="menu-title">Categorías</span>
                </a>
            </li>
        @endcanany
        @canany(['product.index', 'product.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">
                    <i class="fas fa-boxes menu-icon"></i>
                    <span class="menu-title">Productos</span>
                </a>
            </li>
        @endcanany
        @canany(['clients.index', 'clients.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.index') }}">
                    <i class="fas fa-users menu-icon"></i>
                    <span class="menu-title">Clientes</span>
                </a>
            </li>
        @endcanany
        @canany(['providers.index', 'providers.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('providers.index') }}">
                    <i class="fas fa-shipping-fast menu-icon"></i>
                    <span class="menu-title">Proveedores</span>
                </a>
            </li>
        @endcanany
        @canany(['users.index', 'users.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-user-tag menu-icon"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
        @endcanany
        @canany(['roles.index', 'roles.show'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <i class="fas fa-user-cog menu-icon"></i>
                    <span class="menu-title">Roles</span>
                </a>
            </li>
        @endcanany
        @canany(['business.index'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                    aria-controls="page-layouts">
                    <i class="fas fa-cogs menu-icon"></i>
                    <span class="menu-title">Configuración</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="page-layouts">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{ route('business.index') }}">Empresa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('printers.index') }}">Impresora</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcanany
        <li class="nav-item">
            <a class="nav-link" href="https://www.facebook.com/sandracifu27">
                <i class="fab fa-facebook menu-icon"></i>
                <span class="menu-title">Facebook</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.instagram.com/nicejeans_colombia/?hl=es">
                <i class="fab fa-instagram menu-icon"></i>
                <span class="menu-title">Instagram</span>
            </a>
        </li>
    </ul>
</nav>
