@extends('admin.layouts.layout', ['title' => 'Carousel'])
@section('content')
    <!-- Heading & Date -->
    <div class="row mb-5 mt-lg-5">

        <!-- First column -->
        <div class="col-md-6 panel-title mb-5 mt-3">
            <a class="btn btn-success" href="{{ route('carousel.create') }}">Добавить элемент карусели</a>
        </div>
        <!-- First column -->

        <!-- Second column -->
        <div class="col-md-6">

            <div class="card">

                <div class="card-body pb-1">

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-lg-4 col-sm-12">

                            <!-- Date select -->
                            <select class="mdb-select colorful-select dropdown-primary md-form mt-2">
                                <option value="3">Last 30 days</option>
                                <option value="1">Today</option>
                                <option value="2">Yesterday</option>
                                <option value="3">Last 7 days</option>
                                <option value="3">Previous week</option>
                                <option value="3">Previous month</option>
                                <option value="3">Custom date</option>
                            </select>
                            <!-- Date select -->
                        </div>

                        <!-- Grid column -->
                        <div class="col-lg-4 col-sm-6 px-4">
                            <div class="md-form mr-2 mt-2">
                                <input placeholder="From" type="text" id="from" class="form-control datepicker">
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-4 col-sm-6 px-4">
                            <div class="md-form mt-2">
                                <input placeholder="To" type="text" id="to" class="form-control datepicker">
                            </div>
                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>

        </div>
        <!-- Second column -->

    </div>
    <!-- Heading & Date -->
    <section>

        <div class="card">
            <div class="card-body">

                <!-- Table -->
                <table class="table table-hover">

                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <!-- Table head  -->

                    <!-- Table body -->
                    <tbody>
                    @foreach($carousels as $carousel)
                        <tr>
                            <th scope="row">{{ $carousel->id }}</th>
                            <td>{{ $carousel->title }}</td>
                            <td>{{ $carousel->subtitle }}</td>
                            <td width="25%"><img width="45%" src="{{ asset('storage/' .$carousel->img) }}" alt=""> </td>
                            <td>
                                <a href="{{ route('carousel.edit', $carousel->id) }}"
                                   class="btn btn-info btn-sm float-left mr-1" style="margin-top: 0.3rem;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('carousel.destroy', $carousel->id) }}"
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

            </div>
        </div>

    </section>
@endsection
