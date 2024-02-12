<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}"/>
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('partials._sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        @include('partials._Hearder')
        <!--  Header End -->
        <div class="container-fluid">
            @yield('content')
            @include('partials._footer')
        </div>
    </div>
</div>
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{'assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'}}"></script>
<script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script>
    const easyMDE = new EasyMDE();
    easyMDE.value(`#### Poste proposé :


### Description du poste


Pour cela vous devez :

* Premier élément
* Deuxième élément
* Troisième élément


### Type de contrat :
- par exemple stage

### Région :
- Dakar

### Ville :
- Zac Mbao

### Niveau d'expérience :
- Expérience entre 2 ans et 5 ans

### Niveau d'études :
- Bac+2

### Langues exigées :

- Anglais : intermédiaire
- Français : bon niveau

### Nombre de poste(s) :

Soyez vigilant ! N'envoyez pas d'argent à un employeur potentiel. Ne versez aucune somme d'argent en échange d'un contrat de travail potentiel ou pour suivre une formation préalable à l'embauche. Merci de signaler toute irrégularité en utilisant le formulaire de contact candidat et en sélectionnant l'objet "Signaler une annonce d'emploi".`);

</script>
</body>

</html>



