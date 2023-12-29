<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - E-commerce</title>

<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- BOOT STRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>

<body>
  
<nav class="navbar navbar-expand-md navbar-light bg-light ps-5 pe-5 pl-5 pr-5 mb-5">
    <a href="#" class="navbar-brand">MyShop</a>
    <div class="collapse navbar-collapse">
        <div class="navbar-nav">
            <a href="{{route('home')}}" class="nav-link">Home</a>
            <a href="{{route('todasCategorias')}}" class="nav-link">Categorias</a>
            <a href="{{route('cadastrar')}}" class="nav-link">Cadastrar</a>
        </div>     
    </div>
    <a href="{{route('carrinho')}}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
</nav>

<div class="container">
    <div class="row">

        @yield('content')

    </div>

</div>

 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

@yield('script')
</body>

</html>