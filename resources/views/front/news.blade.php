@extends('layouts.newslayout')



@section('content')

        <!--Section: About-->
        <section id="about" class="mt-4 mb-2">

            <!--Secion heading-->

            <h2 class="text-center my-5 font-weight-bold wow fadeIn" data-wow-delay="0.2s">{{ $post->title }}</h2>

            <!--First row-->
            <div class="row">

                <!--First column-->
                <div class="col-lg-5 col-md-12 mb-5 pb-4 wow fadeIn" data-wow-delay="0.4s">

                    <!--Image-->
                    <img src="{{asset('storage/' .$post->cover)}}"
                         class="img-fluid z-depth-1 rounded" alt="My photo">

                </div>
                <!--First column-->

                <!--Second column-->
                <div class="col-lg-6 dark-grey-text ml-lg-auto col-md-12 animated wow fadeIn" data-wow-delay="0.4s" style="justify-content: center;">

                    <!--Description-->
                    <p>{{ $post->content }}
                    </p>
                </div>
                <!--Second column-->

            </div>
            <!--First row-->

        </section>
        <!--Section: About-->
        <div class="container" id="news">
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5 font-weight-bold pt-5 pb-4 my-5 wow fadeIn" data-wow-delay="0.2s">HABARLAR</h2>
                </div>
    
            </div>
            <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
    
                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
                            class="fas fa-chevron-left"></i></a>
                    <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
                            class="fas fa-chevron-right"></i></a>
                </div>
                <!--/.Controls-->
    
                <!-- Indicators -->
                <ol class="carousel-indicators pb-4">
                    @foreach($posts as $post)
                    <li data-target="#carousel-example-multi" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }} multy-carousel"></li>
                    @endforeach
                </ol>
    
                <!--/.Indicators-->
                <div class="carousel-inner v-2" role="listbox">
                    @foreach($posts as $post)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="col-12 col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top" src="{{asset('storage/' .$post->cover)}}"   alt="{{ $post->title }}">
                                <div class="card-body">
                                    <h4 class="card-title font-weight-bold">{{ $post->title }}</h4>
                                    <a href="{{ route('posts', ['id' => $post->id]) }}" class="btn btn-primary btn-md btn-rounded">{{ $post->created_at }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
    
            </div>
        </div>

        

@endsection
