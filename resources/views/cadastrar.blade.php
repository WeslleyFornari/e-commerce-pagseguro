@extends('layouts.admin')

@section('content')

    <div class="col-5">
        <h2>Cadastrar Cliente</h2>
    </div>

    <div class="col-7">

    <!--BootStrap Alert SUCCESS-->
        @if (session('success'))
            <div class="col-sm-7 alert alert-success" role="alert">
            {{(session('success'))}}
            </div>
        @endif 
    </div>  

    <form action="{{route('cadastrar_cliente')}}" method="post">
    @csrf
    <div class="row my-3">

    <div class="form-group col-6">
            Nome: <input type="text" name="nome" class="form-control">
        </div>

        <div class="form-group col-6">
            E-mail: <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group col-6">
            CPF: <input type="text" name="cpf" id="cpf" class="form-control">
        </div>

        <div class="form-group col-6">
            Senha: <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group col-8">
            Logradouro: <input type="text" name="logradouro" class="form-control">
        </div>

        <div class="form-group col-1">
            Numero: <input type="text" name="numero" class="form-control">
        </div>

        <div class="form-group col-3">
            Complemento: <input type="text" name="complemento" class="form-control">
        </div>

        <div class="form-group col-6">
            Cidade: <input type="text" name="cidade" class="form-control">
        </div>

        <div class="form-group col-3">
            CEP: <input type="text" name="cep" id="cep" class="form-control">
        </div>

        <div class="form-group col-3">
            Estado: <input type="text" name="estado" class="form-control">
        </div>

    </div>
    <input type="submit" value="Cadastrar" class="btn btn-success">
        

    </form>
    
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