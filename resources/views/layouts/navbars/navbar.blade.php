@auth('user')
    @include('layouts.navbars.navs.auth')
@endauth

@auth('brand')
    @include('layouts.navbars.navs.brand_auth')
@endauth
    
@guest()
    @include('layouts.navbars.navs.guest')
@endguest