<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>@yield('title')</title>
    {{-- Dashboard - Links --}}
    @include('back.partials.styles')
    {{-- Fin Dashbord Link --}}
</head>

<body>
    <!-- Main wrapper -->
    <div class="main-wrapper">
        <!-- Debut Header -->
        @include('back.partials.header')
        <!-- Fin Header -->
        <!-- Debut Sidebar -->
        @include('back.partials.sidebar')
        <!-- Fin Sidebar -->
        <!-- Contenu de la page -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    @yield('dashboard-header')
                </div>
                @yield('dashboard-content')
            </div>
        </div>
        <!-- Fin Contenu de la page -->
    </div>
    <!-- Scripts dashboard -->
    @include('back.partials.scripts')
    <!-- Fin Script Dashboard -->

    @php
        $success = session()->pull('success');
        $error = session()->pull('error');
    @endphp

    <script>
        // On vérifie si la page n'est pas chargée depuis le cache (bouton retour)
        if (!(window.performance && window.performance.navigation.type === 2)) {
            @if($error)
                iziToast.error({
                    title: 'Erreur',
                    position: 'topRight',
                    message: "{{ addslashes($error) }}",
                });
            @endif

            @if($success)
                iziToast.success({
                    title: 'Succès',
                    position: 'topRight',
                    message: "{{ addslashes($success) }}",
                });
            @endif
        }
    </script>

    @yield('scripts')
</body>

</html>