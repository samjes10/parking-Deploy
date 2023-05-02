<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    @can('ver-usuario') 
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can('ver-rol') 
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
   @endcan
   <!--   @can('ver-parqueo') -->
    <a class="nav-link" href="/parqueos">
        <i class="fas fa-car-side"></i><span>Parqueos</span>
    </a>
<!--     @endcan
    @can('ver-asignar-espacio')  -->
    <a class="nav-link" href="/espacios">
        <i class="fas fa-th-list"></i><span>Asignacion de sitios</span>
    </a>
   <!--  @endcan
    @can('ver-pagos')  -->
    <a class="nav-link" href="/pagos">
        <i class="fas fa-money-bill"></i><span>Pagos</span>
    </a>
  <!--   @endcan -->
    <!-- <a class="nav-link" href="/blogs">
        <i class=" fas fa-blog"></i><span>Blogs</span>
    </a> -->
    <a class="nav-link" href="/espacios">
        <i class="fas fa-th-list"></i><span>Asignacion de sitios</span>
    </a>
</li>
