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
                        <i class="nc-icon nc-circle-10"></i>
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
                                <a href="{{ route('proveedores', 'proveedores') }}"> 
                                    <span class="sidebar-normal">{{ __('Drogueria') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'inventario' ? 'active' : '' }}">
                                <a href="{{ route('inventario', 'inventario') }}"> 
                                    <span class="sidebar-normal">{{ __('Productos') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'inventario' ? 'active' : '' }}">
                                <a href="{{ route('clientes', 'Clientes') }}"> 
                                    <span class="sidebar-normal">{{ __('Clientes') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ $elementActive == 'reportes' ? 'active' : '' }}">
                    <a href="{{ route('balances', 'ventas') }}">
                        <i class="nc-icon nc-zoom-split"></i>
                        <p>{{ __('Ventas') }}</p>
                    </a>
                </li>

                <li class="{{ $elementActive == 'report' ? 'active' : '' }}">
                    <a href="{{ route('reportes.generales', 'reportes') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Reportes') }}</p>
                    </a>
                </li>
                
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
                <li class="{{ $elementActive == 'caja' ? 'active' : '' }}">
                    <a href="{{ route('caja', 'caja') }}">
                        <i class="nc-icon nc-money-coins"></i>
                        <p>{{ __('Facturación') }}</p>
                    </a>
                </li>

                <li class="{{ $elementActive == 'reportes' ? 'active' : '' }}">
                    <a href="{{ route('caja.reportes', 'reportes') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Reportes') }}</p>
                    </a>
                </li>
            </ul>
        </div>
    @endif
</div>