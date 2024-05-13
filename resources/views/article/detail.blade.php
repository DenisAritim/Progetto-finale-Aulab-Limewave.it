<x-layout>
    
      {{-- PLACEHOLDER CAROUSEL, final carousel will be a swiper carousel, once got how to implement in laravel --}}
      
      {{-- PAGE TITLE IS CONTEXTUAL --}}
      @section('title', $article->title)

      {{-- ARTICLE PAGE --}}
      <div class="container-fluid">        
          <div class="row justify-content-center ">
              <div class="col-12 col-md-6">
                    {{-- ARTICLE TITLE --}}
                <h1 class="text-center fs-1">{{$article->title}}</h1>
                    {{-- ARTICLE USER --}}
                <h3 class="text-center fs-3">Inserito da {{$article->user->name}}</h3>
                    {{-- CAROUSEL --}}
                  <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/300/200" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/300/201" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/300/202" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                    {{-- ARTICLE BODY --}}
                <p>{{$article->body}}</p>
              </div>
          </div>
      </div>

</x-layout>