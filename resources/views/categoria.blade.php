@extends('layouts.admin')


@section('content')

   <div class="col-2">
        <div class="list-group">

               <a href="{{route('todasCategorias')}}" class="list-group-item list-group-item-action">Todas</a>

                @foreach($categorias as $cat)
                    <a href="{{route('categoria_id', ['id' => $cat->id])}}"
                      class="list-group-item list-group-item-action">{{$cat->categoria}}</a>
                @endforeach
        </div>  
   </div>

    <div class="col-10">
        @include('_produtos')
    </div>

@endsection

