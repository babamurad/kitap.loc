@extends('admin.layouts.layout', ['title' => 'Сообщения'])
@section('content')
    <!-- Heading & Date -->
    <div class="row mb-3 mt-lg-3">

    </div>
    <!-- Heading & Date -->
    <section>
 
        <div class="card mt-3">
            <div class="card-body">
                @if ($feedbacks->count())
                @foreach ($feedbacks as $feedback)
                <div class="row mt-2">
                    <div class="col-lg-4 mb-4">
                        <!-- Excerpt -->
                        <a href="" class="teal-text">
                            <h6 class="pb-1"><i class="fas fa-comment-dots"></i><strong> Сообщение </strong></h6>
                        </a>

                        <h4 class="mb-4 p-2"><strong>{{ $feedback->subject }}</strong></h4>

                        <p>by <a><strong>{{ $feedback->name }}</strong></a>, {{ $feedback->created_at }}</p>

                        <div class="row">
                            <form action="{{ route('go.archive', $feedback->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input name="flag" type="hidden" value="1">
                            <button type="submit" class="btn btn-amber btn-sm" onclick="return confirm('Перенести в архив?')">
                                <i class="fas fa-archive mr-2"></i>В архив
                                </button>
                            </form>

                            <form class="ml-4" action="{{ route('feedback.destroy', $feedback->id) }}" method="post"
                                class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Подтвердите удаление')">
                                    <i class="fas fa-trash-alt mr-2"></i>Удалить
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Grid column -->


                    <div class="col-lg-7 mb-4" style="background-color: #f8e8d2;">
                        <p class="p-2">{{ $feedback->message }}</p>
                    </div>                    
                </div>
                <hr>
@endforeach

<div class="row">
    <div class="col-sm-12">
        {{ $feedbacks->links('pagination::bootstrap-4') }}
    </div>
@else
<p>Сообщений пока нет.</p>

@endif
</div>

            </div>
        </div>

    </section>
@endsection
