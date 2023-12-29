

    <div class="row">
    @foreach($produtos as $prod)
        <div class="col-3 mb-3">
            <div class="card">
                <img src="{{asset($prod->foto)}}" class="card-img-top" width="250" height="280" />
                <div class="card-body text-center">
                    <h5 class="card-title">{{$prod->nome}} - R${{$prod->valor}}</h5>
                    <p>{{$prod->descricao}}</p>
                    <a href="{{route('adicionar_car', ['id' => $prod->id])}}" class="btn btn-sm btn-secondary">Adicionar item</a>
                          
                </div>
            </div>
        </div>


    @endforeach
    </div>
        
    