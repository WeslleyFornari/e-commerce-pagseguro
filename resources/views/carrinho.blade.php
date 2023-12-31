@extends('layouts.admin')


@section('content')
<div class="col-5">
    <h3>Carrinho</h3>
</div>

<div class="col-7">

    <!--Alert SUCCESS-->
        @if (session('success'))
            <div class="col-sm-7 alert alert-success" role="alert">
            {{(session('success'))}}
            </div>
        @endif

    <!--Alert ERROR-->
        @if ($message = Session::get("error"))
            <div class="col-sm-7 mx-auto text-center alert alert-warning" role="alert">
            {{$message}}
            </div>
        
        @endif 
</div>  
   

<!-- TABELA -->
   <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Foto</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @php $total = 0; @endphp  <!-- TOTAL -->

            @foreach($cart as $indice => $p)
            <tr">
                <td>{{$p->nome}}</td>
                <td><img src="{{asset($p->foto)}}" height="50"></td>  
                <td>{{$p->descricao}}</td>
                <td>R${{$p->valor}}</td>
                <td>
                    <a href="{{route('deletar_item', ['indice' => $indice])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <!-- CONTADOR-->
            @php $total += $p->valor; @endphp
            @endforeach
        </tbody>
        <tfooter>
            <tr>
                <td colspan="5">  <!-- TOTAL ACUMULADO-->
                    Total do carrinho: R$ {{$total}}
                </td>
            </tr>
        </tfooter>
   </table>

   <form action="{{route('finalizar_car')}}" method="post">
    @csrf 
        <div class="pull-right">
            <input type="submit" value="Finalizar compra" class="btn btn-success btn-lg text-right">
        </div>
        

   </form>

    


@endsection

