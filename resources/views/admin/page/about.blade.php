@extends('admin.layouts.layout', ['title' => 'News'])
@section('content')
    <!-- Heading & Date -->
    <div class="row mb-5 mt-lg-3">

    </div>
    <!-- Heading & Date -->
    <section>
        <div class="card">
            <div class="card-body">
                <form role="form" method="post" action="#"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!--Body -->
                    <div class="md-form">
                        <i class="fas fa-pencil-alt prefix grey-text"></i>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ $about->title }}">
                        <label for="title">Заголовок</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-solid fa-book-open prefix grey-text"></i>
                        <textarea type="text" id="content" name="content"
                            class=" md-textarea form-control @error('content') is-invalid @enderror" rows="6">{{ $about->content }}</textarea>
                    </div>

                    <!-- Default input -->
                    {{-- <label for="cover">Выберите файл</label> --}}
                    <input class="btn btn-light-blue btn-sm" type="file" id="cover" name="image"> 
    

                    <div class="text-center mt-4">
                        <button class="btn btn-light-blue waves-effect waves-light">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
