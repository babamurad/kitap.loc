@extends('admin.layouts.layout', ['title' => 'Создать новость'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 pb-4">
                <div class="col-sm-12">
                    <h1>Создание новости</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!--Header -->
                            <div class="form-header blue accent-1">
                                <h3><i class="fa-solid fas fa-box"></i> Добавить новость:</h3>
                            </div>
                            <form role="form" method="post" action="{{ route('posts.update', $posts->id) }}"
                                enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                                <!--Body -->
                                <div class="md-form">
                                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ $posts->title }}">
                                    <label for="title">Наименование новости</label>
                                </div>

                                <div class="md-form">
                                    <i class="fas fa-solid fa-book-open prefix grey-text"></i>
                                    <textarea type="text" id="content" name="content"
                                        class="tinymce md-textarea form-control @error('content') is-invalid @enderror" rows="6">{{ $posts->content }}</textarea>
                                    {{-- <label for="content" class="">Содержание новости</label> --}}
                                </div>

                                <!-- Default input -->
                                {{-- <label for="cover">Выберите файл</label> --}}
                                <input class="btn btn-light-blue btn-sm" type="file" id="cover" name="cover">

                                
                                <input class="btn btn-light-blue btn-sm" type="file" name="images[]" multiple>
                

                                <div class="text-center mt-4">
                                    <button class="btn btn-light-blue waves-effect waves-light">Сохранить</button>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-form">

                                        <form action="{{ route('delete.cover', $posts) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-rounded  text-danger"
                                                style="padding:0.5rem 0.8rem">X</button>
                                        </form>
                                        @if (isset($posts->cover))
                                            <p> {{ $posts->cover }}</p>
                                            <img id="img" class="w-75" src="{{ asset('storage/' . $posts->cover) }}"
                                                alt="{{ $posts->title }}">
                                        @else
                                            <img width="70%" id="blah"
                                                src="{{ asset('storage/images/no-image.jpg') }}" alt="your image" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    @foreach ($posts->images as $img)
                                        <form action="{{ route('delete.image', $img->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-rounded  text-danger"
                                                style="padding:0.5rem 0.8rem">X</button>
                                        </form>
                                        <img class="w-50 mb-2 images" src="{{ asset('storage/' . $img->image) }}"
                                            alt="{{ $img->image }}">
                                    @endforeach
                                </div>
                                <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                $('.images').attr('src', e.target.result);
                                                $('#img').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>

                            </div>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('tinyscript')
<script src="{{ asset('assets/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea.tinymce',      
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
      
    });
  </script>
@endsection