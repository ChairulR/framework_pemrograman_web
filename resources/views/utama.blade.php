
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Page - Sistem Toko</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <nav class="fade-in">
            @yield('nav')
        </nav>
        
        <div class="container">
            <section id="judul_menu" class="fade-in">
                @yield('judul_menu')
            </section>
            
            <section id="isi_menu" class="product-card fade-in">
                @yield('isi_menu')
            </section>
        </div>
    </body>
</html>