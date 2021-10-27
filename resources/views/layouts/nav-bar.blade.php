 <!-- Authentication Links -->
@auth
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Partido dos Trabalhadores</h3>
            <strong>PT</strong>
        </div>

        <ul class="list-unstyled components">
            <li  @if (Route::is('home.*')  ) class="active"  @endif >
                <a href="{{ route('home') }}" >
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li  @if (Route::is('client.*')  ) class="active"  @endif >
                <a href="{{ route('client.index') }}" >
                    <i class="fas fa-users"></i>
                    Clientes
                </a>
            </li>
            <li  @if (Route::is('product-group.*')  ) class="active"  @endif >
                <a href="{{ route('product-group.index') }}">
                    <i class="fas fa-object-ungroup"></i>
                    Grupo de Produto
                </a>
            </li>
            <li  @if (Route::is('type-of-product.*')  ) class="active"  @endif >
                <a href="{{ route('type-of-product.index') }}">
                    <i class="fab fa-renren"></i>
                    Tipos de Produto
                </a>
            </li>
            <li  @if (Route::is('unit-of-measure.*')  ) class="active"  @endif >
                <a href="{{ route('unit-of-measure.index') }}">
                    <i class="fas fa-weight"></i>
                    Unidades de Medida
                </a>
            </li>            
            <li  @if (Route::is('product.*')  ) class="active"  @endif >
                <a href="{{ route('product.index') }}">
                    <i class="fas fa-box"></i>
                    Produtos
                </a>
            </li> 
            <li  @if (Route::is('payment-condition.*')  ) class="active"  @endif >
                <a href="{{ route('payment-condition.index') }}">
                    <i class="fas fa-money-check-alt"></i>
                    Condição Pagamento
                </a> 
            </li>
            <li  @if (Route::is('warehouse.*')  ) class="active"  @endif >
                <a href="{{ route('warehouse.index') }}">
                <i class="fas fa-warehouse"></i>  
                    Armazém
                </a> 
            </li>
            <li  @if (Route::is('budget.*')  ) class="active"  @endif >
                <a href="{{ route('budget.index') }}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Orçamentos
                </a>                
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Produtos
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-image"></i>
                    Portfolio
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-question"></i>
                    FAQ
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-paper-plane"></i>
                    Contact
                </a>
            </li>
        </ul>
    </nav>
@endauth