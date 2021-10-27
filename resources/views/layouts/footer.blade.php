 <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    

    @if (Route::is('budget.create') || Route::is('budget.edit') ) 
		<script src="{{ asset('public/js/budget.js') }}" defer></script>
    @endif

    @if (Route::is('product.create') || Route::is('product.edit') ) 
		<script src="{{ asset('public/js/product.js') }}" defer></script>
    @endif


</body>
</html>
