@extends('layouts.admin')


@section('content')

   <h3>Carrinho</h3>

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

            @endforeach

        </tbody>

   </table>

    


@endsection

