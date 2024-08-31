@extends('layouts.dashboard.layout')
@section('content2')
<div class="container mt-5">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Create Course</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="quickForm" novalidate="novalidate" action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- Course Name -->
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" id="course_name" placeholder="Enter Course Name..">
                    @error('course_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">
                        <img src="https://cdn-icons-png.flaticon.com/512/8191/8191607.png" alt="upload" width="100px">
                        <input type="file" name="image" hidden class="form-control @error('image') is-invalid @enderror" id="image">
                    </label>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Enter Description"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Credit Hours-->
                <div class="form-group">
                    <label for="credit_hours">Credit Hours</label>
                    <select name="credit_hours" class="form-control @error('credit_hours') is-invalid @enderror" id="credit_hours">
                        <option value="" disabled>Choose</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select> 
                    @error('credit_hours')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<!-- Check for success message -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK',
    });
</script>
@endif
@endsection
