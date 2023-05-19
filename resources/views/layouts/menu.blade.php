

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    
    <li>
        <a class="nav-link" href="/home">
        <i class="fas fa-building"></i><span>Dashboard</span></a>
        
    </li>

    <!--Menus del Administrador-->
    <li>
        <a href="javascript:void(0)" onclick="toggleAdminsMenu()" aria-expanded="false">
        <i class="fa fa-user"></i><span>Administrador</span></a>
        <ul id="adminsMenu" class="collapse">
            <li class=""><a href="#">Todos los admins</a></li>
            <li class=""><a href="/reclamos">Reclamos o Quejas</a></li>

        </ul>
    </li>

    <!--Menus del Usuario-->
    <li>
        <a href="javascript:void(0)" onclick="toggleUsuarioMenu()" aria-expanded="false">
        <i class="fas fa-users"></i><span>Usuario</span></a>
        <ul id="usuarioMenu" class="collapse">
            <li class=""><a href="/usuarios/create">Nuevo usuario</a></li>
            <li class=""><a href="/usuarios">Usuarios</a></li>
        </ul>
    </li>

    <!--Menus del Roles-->
    <li>
        <a href="javascript:void(0)" onclick="toggleRolMenu()" aria-expanded="false">
        <i class="fas fa-user-lock"></i><span>Roles</span></a>
        <ul id="rolMenu" class="collapse">
            <li class=""><a href="/roles/create">Nuevo rol</a></li>
            <li class=""><a href="/roles">Roles</a></li>
        </ul>
    </li>

    <!--Menus del Parqueo-->
    <li>
        <a href="javascript:void(0)" onclick="toggleParkMenu()" aria-expanded="false">
        <i class="fas fa-car-side"></i><span>Parqueo</span></a>
        <ul id="parkMenu" class="collapse">
            <li class=""><a href="/parqueos/create">Añadir parqueo</a></li>
            <li class=""><a href="/parqueos">Parqueos</a></li>
        </ul>
    </li>

    <!--Menus del Asignaciones-->
    <li>
        <a href="javascript:void(0)" onclick="toggleAsigMenu()" aria-expanded="false">
        <i class="fas fa-th-list"></i><span>Asignar Sitios</span></a>
        <ul id="asignarMenu" class="collapse">
            <li class=""><a href="/asignaciones/create">Asignar</a></li>
            <li class=""><a href="/asignaciones">Asignaciones</a></li>
        </ul>
    </li>

    <!--Menus del Cliente-->
    <li>
        <a href="javascript:void(0)" onclick="toggleClientMenu()" aria-expanded="false">
        <i class="fas fa-users"></i><span>Cliente</span></a>
        <ul id="clientMenu" class="collapse">
            <li class=""><a href="/clientes/create">Añadir nuevo</a></li>
            <li class=""><a href="/clientes/create">Solicitud de Parqueo</a></li>
            <li class=""><a href="/pagos">Pagar</a></li>
            <li class=""><a href="/reclamos/create">Reclamo</a></li>
        </ul>
    </li>
    <a class="nav-link" href="/pagos">
        <i class="fas fa-money-bill"></i><span>Pagos</span>
    </a>
    
    <!-- <a class="nav-link" href="/blogs">
        <i class="fas fa-blog"></i><span>Blogs</span>
    </a> -->

</li>

<script>
    function toggleAdminsMenu() {
        $('#adminsMenu').toggleClass('show');
        var expanded = $('#adminsMenu').hasClass('show');
        $('a[aria-expanded="false"]').attr('aria-expanded', expanded);
    }

    function toggleUsuarioMenu() {
        $('#usuarioMenu').toggleClass('show');
        var expanded = $('#usuarioMenu').hasClass('show');
        $('a[aria-expanded="false"]').attr('aria-expanded', expanded);
    }

    function toggleRolMenu() {
        $('#rolMenu').toggleClass('show');
        var expanded = $('#rolMenu').hasClass('show');
        $('a[aria-expanded="false"]').attr('aria-expanded', expanded);
    }

    function toggleParkMenu() {
        $('#parkMenu').toggleClass('show');
        var expanded = $('#parkMenu').hasClass('show');
        $('a[aria-expanded="false"]').attr('aria-expanded', expanded);
    }

    function toggleAsigMenu() {
        $('#asignarMenu').toggleClass('show');
        var expanded = $('#asignarMenu').hasClass('show');
        $('a[aria-expanded="false"]').attr('aria-expanded', expanded);
    }

    function toggleClientMenu() {
        $('#clientMenu').toggleClass('show');
        var expanded = $('#clientMenu').hasClass('show');
        $('a[aria-expanded="false"]').attr('aria-expanded', expanded);
    }

</script>