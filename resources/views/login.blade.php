@extends('layouts.admin')

@section('content')

<div class="col-12">

    <div class="col-4 mx-auto mb-4">
        <h2 class="mb-3 mx-auto text-center">Entrar no Sistema</h2>
    </div>
    

    <form action="{{route('logar')}}" method="post">
    @csrf

        <div class="form-group col-4 mx-auto">
            Login (CPF):
            <input type="text" id=cpf name=cpf class="form-control">

        </div>

        <div class="form-group col-4 mx-auto my-4">
            Senha:
            <input type="password" name=password class="form-control">

        </div>

        <div class="col-4 mx-auto mb-4">
            <input type="submit" value="Entrar" class="btn btn-primary btn-lg ">
        </div>

        <div class="col-6 mx-auto">
            
    <!--BootStrap Alert ERRO-->
        @if ($message = Session::get("error"))
            <div class="col-sm-6 mx-auto text-center alert alert-success" role="alert">
            {{$message}}
            </div>
        @endif 
        </div>
    </form>
</div>

@endsection

@section('script')
<!-- Jquery Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"> </script>
<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
$(document).ready(function() {

$('#cpf').mask('000.000.000-00');
$('.phone').mask('(00) 00000-0000');
$('.tel').mask('(00) 0000-0000');
$('.date').mask('00/00/0000');
$('#cep').mask('00.000-000');
$('.money').mask('000.000.000.000,00');

});
</script>

@endsection