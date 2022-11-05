@extends('admin.layouts.layout', ['title' => 'Пользователи'])
@section('content')

    <!-- Heading & Date -->
    <section>
        <div class="card">
            <div class="card-body">
@if(($users->count()))
                <!-- Table -->
                <table class="table table-hover">

                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->Admin }}</td>                        
                        <td>
                            <a href="#"
                               class="btn btn-info btn-sm float-left mr-1" style="margin-top: 0.3rem;">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {{-- <form action="#"
                                  method="post" class="float-left"> --}}
                                {{-- @csrf
                                @method('DELETE') --}}
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Подтвердите удаление')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            {{-- </form> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <!-- Table body -->
                </table>
                <!-- Table -->
                    <div class="row">
                        <div class="col-sm-12">
                            {{ $users->links("pagination::bootstrap-4") }}
                        </div>

                    </div>
    @else
                <p>Пользователей пока нет...</p>
    @endif
            </div>
        </div>

    </section>
@endsection
