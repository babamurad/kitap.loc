@extends('admin.layouts.layout', ['title' => 'Редактировать новость'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 pb-4">
                <div class="col-sm-12">
                    <h1>Редактирование новости</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!--Header -->
                            <div class="form-header blue accent-1">
                                <h3><i class="fa-solid fas fa-box"></i> Редактировать новость:</h3>
                            </div>
                            <form role="form" method="post" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!--Body -->
                                <div class="md-form">
                                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $news->title }}">
                                    <label for="title">Наименование новости</label>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="md-form">
                                            <div class="file-field">
                                                <div
                                                    class="btn btn-light-blue btn-sm float-left waves-effect waves-light">
                                                    <span>Выбрать изображение</span>
                                                    <input type="file" name="img" id="img" accept=".png, .jpg, .jpeg" onchange="readURL(this);">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input id="img-put" name="img-put" class="file-path validate" type="text" placeholder="Загрузить изображение" value="{{ $news->img }}">
                                                </div>
                                            </div>
                                            <img width="70%" id="blah" src="{{ asset('storage/images/no-image.jpg') }}" alt="your image" />
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#blah').attr('src', e.target.result);
                                                    $('#img').attr('value', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>
                                    <div class="col-sm-6">
                                        <div class="md-form">
                                            <i class="fas fa-solid fa-book-open prefix grey-text"></i>
                                            <input type="text" name="slug" id="slug" disabled
                                                   class="form-control @error('slug') is-invalid @enderror"
                                                   value="{{ $news->slug }}">
                                            <label for=" slug">Slug</label>
                                        </div>
                                    </div>
                                </div>
                                <p>{{$news->img}}</p>
                                @if(isset($news->img))
                                <img src="{{asset('storage/' .$news->img)}}" alt="" class="img-fluid">
                                @endif
                                <div class="md-form">
                                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                                    <textarea type="text" id="content" name="content" class="md-textarea form-control @error('content') is-invalid @enderror" rows="6">{{ $news->content }}</textarea>
                                    <label for="content" class="">Icon Prefix</label>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <a class="btn btn-success" href="{{ route('gallery.create') }}">Добавить картинку</a>
                                    @if($gallery->count())
                                        <!-- Table -->
                                        <table class="table">

                                            <!-- Table head -->
                                            <thead class="blue-grey lighten-4">
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <!-- Table head -->

                                            <!-- Table body -->
                                            <tbody>
                                            @foreach($gallery as $galler)
                                            <tr>
                                                <th scope="row">{{ $galler->id }}</th>
                                                <td>{{ $galler->id }}</td>
                                                <td>{{ $galler->news_id }}</td>
                                                <td>{{ $galler->image }}</td>
                                                <td>
                                                    <form action="{{ route('gallery.destroy', $galler->id) }}"
                                                          method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <!-- Table body -->
                                        </table>
                                        <!-- Table -->
                                        @else
                                        <p>Галерея пока пуста...</p>
                                        @endif

                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button class="btn btn-light-blue waves-effect waves-light">Сохранить</button>
                                </div>
                            </form>
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

