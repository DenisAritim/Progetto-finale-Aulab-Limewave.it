<x-layout>
    
    <div class="container">
        <div class="row justify-content-around ">
            
            <h1 class="text-center mt-3">Categoria {{$category->name}}</h1>
            @forelse ($category->articles as $article)
            <div class="col-3 my-5">                
                {{-- @dd($articles) --}}
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/20{{$article->id}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">Creato da: {{$article->user->name ?? ""}}</p>
                        <p class="card-text">Creato il: {{$article->created_at->format("d/m/Y")}}</p>
                        <p class="card-text">Prezzo: {{$article->price}}</p>
                        <a href="{{route('article.detail', compact('article'))}}" class="btn btn-primary">Dettagli</a>
                    </div>
                </div>
            </div>
            @empty
            <p>Non sono presenti annunci</p> 
            <p><a href="{{route("article.create")}}">Pubblicane uno</a></p>
            
            @endforelse
            
        </div>
    </div>
    
    
    
</x-layout>