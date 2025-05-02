<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Remove Tailwind-specific fonts -->
        <!-- <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <header class="mb-4 text-end">
                @if (Route::has('login'))
                    <nav class="d-flex justify-content-end gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                Log in
                            </a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
    
            <main class="row">
                <div class="col-md-6 bg-white p-4 shadow-sm">
                    <h1 class="h4 mb-2">Let's get started</h1>
                    <p class="text-muted mb-3">Laravel has an incredibly rich ecosystem. We suggest starting with the following.</p>
                    
                    <!-- Your content here -->
                </div>
                
                <div class="col-md-6 bg-warning p-0 position-relative">
                    <!-- Your SVG content here -->
                </div>
            </main>
        </div>
    
        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
