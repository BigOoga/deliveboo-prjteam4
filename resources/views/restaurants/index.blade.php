<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <searchbar></searchbar>
        <div class="container-fluid ">
            <div class="row">
                <div id="sidebar-menu" class="col-4 col-md-3 col-lg-2">
                    <sidebar></sidebar>
                </div>
                <div id="main-section" class="col-8 col-md-9 col-lg-10">

                    <results></results>

                </div>
            </div>
        </div>
    </div>


</body>

</html>

<style lang="scss" scoped>
#sidebar-menu{
    width: 200px;
    
}

#main-section{
    margin-left: 200px;
    width: calc(100% - 200px);
    max-width: 100vw;
}

</style>