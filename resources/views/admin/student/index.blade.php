@extends('admin.layouts.layout', ['title' => 'Students'])
@section('content')
    <!-- Heading & Date -->
    <div class="row mb-3 mt-lg-3">

        <!-- First column -->
        <div class="col-md-6 panel-title mt-3">
{{--need to find last record in table news--}}
<div class="text-center">
    <div class="row">
        <h2 class="mt-2 mr-3">Students Data</h2>
        <a href="" class="btn btn-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#AddStudentModal">
            <i class="fas fa-user-plus mr-2"></i>
            Добавить студента 
            </a>
    </div>    
  </div>
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
        <div id="success_message">

        </div>
        <div class="card">
            <div class="card-body">

                <!-- Table -->
                <table class="table table-hover">

                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                    </tbody>
                    <!-- Table body -->
                </table>
                <!-- Table -->
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- {{ $posts->links("pagination::bootstrap-4") }} --}}
                        </div>

                    </div>

            </div>
        </div>


<!-- Modal: Add Student From -->
<div class="modal fade" id="AddStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class=""><i class="fas fa-plus-square mr-3"></i> Add Student</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Body -->
            <div class="modal-body mb-0">

                <ul id="saveform_errList"></ul>

                <div class="md-form form-sm">
                    <i class="fas fa-user-graduate prefix"></i>
                    <input type="text" id="form27"
                        class="name form-control form-control-sm @error('name') is-invalid @enderror">
                    <label for="form27">Name</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="text" id="form28" class="email form-control form-control-sm">
                    <label for="form28">Email</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fas fa-phone-alt prefix"></i>
                    <input type="text" id="form28" class="phone form-control form-control-sm">
                    <label for="form28">Phone</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fas fa-graduation-cap prefix"></i>
                    <input type="text" id="form28" class="course form-control form-control-sm">
                    <label for="form28">Course</label>
                </div>

                <div class="text-center mt-1-half">
                    <button class="btn btn-info mb-1 add_student">Save <i class="fas fa-check ml-1"></i></button>
                </div>

            </div>
        </div>
        <!-- Content -->
    </div>
</div>
<!-- Modal: End Add Student From -->

{{-- Delete Student Modal --}}
<div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class=""><i class="fas fa-edit mr-3"></i> Edit & Update Student</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Body -->
            <div class="modal-body mb-0">

                <ul id="updateform_errList"></ul>

                <input type="text" id="edit_stud_id" hidden>

                <div class="md-form form-sm">
                    <i class="fas fa-user-graduate prefix"></i>
                    <input type="text" id="edit_name" class="name form-control form-control-sm">
                    <label for="edit_name">Name</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="text" id="edit_email" class="email form-control form-control-sm">
                    <label for="edit_email">Email</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fas fa-phone-alt prefix"></i>
                    <input type="text" id="edit_phone" class="phone form-control form-control-sm">
                    <label for="edit_phone">Phone</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fas fa-graduation-cap prefix"></i>
                    <input type="text" id="edit_course" class="course form-control form-control-sm">
                    <label for="edit_course">Course</label>
                </div>

                <div class="text-center mt-1-half">
                    <button class="btn btn-info mb-1 update_student">Update<i class="fas fa-check ml-1"></i></button>
                </div>

            </div>
        </div>
        <!-- Content -->
    </div>
</div>
{{-- End Edit Student Modal --}}

{{-- Edit Student Modal --}}
<div class="modal fade" id="DeletStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class=""><i class="fas fa-edit mr-3"></i> Delete Student</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Body -->
            <div class="modal-body mb-0">
                <input type="text" id="delete_stud_id" hidden>
               <h4>Are you sure?</h4>
                <div class="text-center mt-1-half">
                    <button class="btn btn-danger mb-1 delete_student_btn">Yes Delete<i class="fas fa-check ml-1"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Delete Student Modal --}}
    </section>
@endsection

@section('scripts')

<script>
$(document).ready(function(){  
    
    fetchstudent(); 

    function fetchstudent()
    {
        $.ajax({
            type: "GET",
            url:  "/admin/fetch-students",
            dataType: "json",
            success: function(response){
            //    console.log(response.students); 
            $('tbody').html("");
            $.each(response.students, function(key, item){
                $('tbody').append('<tr>\
                <th>'+item.id+'</th>\
                <td>'+item.name+'</td>\
                <td>'+item.email+'</td>\
                <td>'+item.phone+'</td>\
                <td>'+item.course+'</td>\
                <td><button type="button" value="'+item.id+'" class="edit_student btn btn-info btn-sm float-left mr-1" style="margin-top: 0.3rem;"><i class="fas fa-pencil-alt"></i></button></td>\
                <td><button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i></button></td>\
                </tr>');    
                });
            }
        });
    }

    $(document).on('click', '.delete_student', function (e) {
        e.preventDefault();
        var stud_id = $(this).val();
        // alert(stud_id);
        $('#delete_stud_id').val(stud_id);
        $('#DeletStudentModal').modal('show');
    });

    $(document).on('click', '.delete_student_btn', function (e) {
        e.preventDefault();
        var stud_id = $('#delete_stud_id').val();

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            type: "DELETE",
            url: "/admin/delete-student/"+stud_id,
            success: function (response) {
                // console.log(response); 
                $('#success_message').addClass('alert alert-success');   
                $('#success_message').text(response.message);  
                $('#DeletStudentModal').modal('hide');  
                fetchstudent();           
            }
        });
        
    });

    $(document).on('click', '.edit_student', function(e){
        e.preventDefault();
        var stud_id = $(this).val();
        // console.log(stud_id);        
        $('#EditStudentModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/admin/edit-student/"+stud_id,
            // data: "data",
            // dataType: "json",
            success: function (response) {
            //    console.log(response); 
            if (response.status == 404) {
                $('#success_message').html("");
                $('#success_message').addClass("alert alert-danger");
                $('#success_message').text(response.message);
            } else {
                $('#edit_name').val(response.student.name)
                $('#edit_email').val(response.student.email)
                $('#edit_phone').val(response.student.phone)
                $('#edit_course').val(response.student.course)
                $('#edit_stud_id').val(stud_id)
            }
            }
        });
    });

    $(document).on('click', '.update_student', function (e){
        e.preventDefault();
        var stud_id = $('#edit_stud_id').val();
        var data = {
            'name' : $('#edit_name').val(),
            'email' : $('#edit_email').val(),
            'phone' : $('#edit_phone').val(),
            'course' : $('#edit_course').val(),
        };

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            type: "POST",
            url: "/admin/update-student/"+stud_id,
            data: "data",
            dataType: "json",
            success: function (response) {
                // console.log(response);
                if (response.status == 400) {
                    //validate errors
                    $('#saveform_errList').html("");
                    $('#saveform_errList').addClass('alert alert-danger');

                    $.each(response.errors, function(key, err_values){
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                        if (key == 'name') { $('.name').addClass('is-invalid'); }
                        if (key == 'email') { $('.email').addClass('is-invalid'); }
                        if (key == 'phone') { $('.phone').addClass('is-invalid'); }
                        if (key == 'course') { $('.course').addClass('is-invalid'); }
                    });
                } else if(response.status == 404){
                    //if not found
                    $('#saveform_errList').html("");
                    $('#saveform_errList').addClass('alert alert-danger');                    
                    $('#saveform_errList').append(response.message);                   
                }                
                else {
                    $('#updateform_errList').html("");
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');                        
                    $('#success_message').text(response.message); 
                    $('#EditStudentModal').modal('hide');                       
                    // $('#AddStudentModal').find('input').val("");                       
                    //delete class is-invalid
                    $('.name').removeClass('is-invalid');
                    $('.email').removeClass('is-invalid');
                    $('.phone').removeClass('is-invalid');
                    $('.course').removeClass('is-invalid');  
                    
                    fetchstudent(); 
                }
            }
        });
    });

    $(document).on('click','.add_student', function(e){
        e.preventDefault()
        var data = {
            'name': $('.name').val(),
            'email': $('.email').val(),
            'phone': $('.phone').val(),
            'course': $('.course').val(),
        }
        // console.log(data);
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            type: "POST",
            url: "/admin/students",
            data: data,
            dataType: "json",
            success: function(response){
                // console.log(response);
                if (response.status == 400) {
                    $('#saveform_errList').html("");
                    $('#saveform_errList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_values){
                        $('#saveform_errList').append('<li>'+err_values+'</li>');
                        if (key == 'name') { $('.name').addClass('is-invalid'); }
                        if (key == 'email') { $('.email').addClass('is-invalid'); }
                        if (key == 'phone') { $('.phone').addClass('is-invalid'); }
                        if (key == 'course') { $('.course').addClass('is-invalid'); }
                    });
                } 
                else
                {                    
                    $('#saveform_errList').html("");
                    $('#success_message').addClass('alert alert-success');                        
                    $('#success_message').text(response.message); 
                    $('#AddStudentModal').modal('hide');                       
                    $('#AddStudentModal').find('input').val("");                       
                    //delete class is-invalid
                    $('.name').removeClass('is-invalid');
                    $('.email').removeClass('is-invalid');
                    $('.phone').removeClass('is-invalid');
                    $('.course').removeClass('is-invalid');  
                    
                    fetchstudent(); 
                }
            }
        });

    });

});    
</script>

    
@endsection