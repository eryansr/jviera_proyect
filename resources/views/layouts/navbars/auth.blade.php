<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="" class="simple-text logo-normal">
            {{ __('Fartodo') }}
        </a>
    </div>
    @if(Auth::user()->hasRole('admin')) 
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="{{ $elementActive == 'home' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'home') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                        <i class="nc-icon nc-zoom-split"></i>
                        <p>
                                {{ __('Editor de usuarios') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="laravelExamples">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                                <a href="{{ route('profile.edit') }}">
                                    
                                    <span class="sidebar-normal">{{ __(' Perfil Usuario ') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'admin_users' ? 'active' : '' }}">
                                <a href="{{ route('admin', 'admin_users') }}">
                                    
                                    <span class="sidebar-normal">{{ __(' Adm de usuarios ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples2">
                        <i class="nc-icon nc-bag-16"></i>
                        <p>
                                {{ __('Inventario') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="laravelExamples2">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'inventario' ? 'active' : '' }}">
                                <a href="{{ route('inventario', 'inventario') }}"> 
                                    <span class="sidebar-normal">{{ __('Productos') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'inventario' ? 'active' : '' }}">
                                <a href="{{ route('inventario', 'inventario') }}"> 
                                    <span class="sidebar-normal">{{ __('Proveedores') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'inventario' ? 'active' : '' }}">
                                <a href="{{ route('inventario', 'inventario') }}"> 
                                    <span class="sidebar-normal">{{ __('Clientes') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ $elementActive == 'facturacion' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'facturacion') }}">
                        <i class="nc-icon nc-money-coins"></i>
                        <p>{{ __('Facturación') }}</p>
                    </a>
                </li>

                <li class="{{ $elementActive == 'reportes' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'reportes') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Reportes') }}</p>
                    </a>
                </li>
                

                <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'icons') }}">
                        <i class="nc-icon nc-diamond"></i>
                        <p>{{ __('Icons') }}</p>
                    </a>
                </li>

                <!-- <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'map') }}">
                        <i class="nc-icon nc-pin-3"></i>
                        <p>{{ __('Maps') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'notifications') }}">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>{{ __('Notificaciones') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'tables') }}">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>{{ __('Lista de tablas') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'typography') }}">
                        <i class="nc-icon nc-caps-small"></i>
                        <p>{{ __('Typography') }}</p>
                    </a>
                </li> -->
                
            </ul>
        </div>
    @endif
    @if(Auth::user()->hasRole('caja')) 
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="{{ $elementActive == 'home' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'home') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'facturacion' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'facturacion') }}">
                        <i class="nc-icon nc-money-coins"></i>
                        <p>{{ __('Facturación') }}</p>
                    </a>
                </li>

                <li class="{{ $elementActive == 'reportes' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'reportes') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Movimientos') }}</p>
                    </a>
                </li>
            </ul>
        </div>
    @endif
</div>