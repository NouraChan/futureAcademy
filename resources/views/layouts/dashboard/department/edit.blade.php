@extends('layouts.dashboard.layout')

@section('content2')
<div class="container mt-5">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit Department</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="quickForm" novalidate="novalidate" action="{{ route('department.update', $department->id) }}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card-body">
                <!-- Department Name -->
                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <select name="department_name" class="form-control @error('department_name') is-invalid @enderror" id="department_name">
                        <option disabled>Select Department</option>
                        <option value="computer science" {{ $department->department_name == 'computer science' ? 'selected' : '' }}>Computer Science</option>
                        <option value="management information system" {{ $department->department_name == 'management information system' ? 'selected' : '' }}>Management Information System</option>
                        <option value="information technology" {{ $department->department_name == 'information technology' ? 'selected' : '' }}>Information Technology</option>
                    </select>
                    @error('department_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">
                        <img src="{{ asset($department->image) }}" alt="Current Image" width="100px">
                        <input type="file" name="image"  hidden  class="form-control @error('image') is-invalid @enderror" id="image">
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
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Enter Description">{{ $department->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Department Number -->
                <div class="form-group">
                    <label for="department_number">Department Number</label>
                    <input type="text" name="department_number" class="form-control @error('department_number') is-invalid @enderror" id="department_number" value="{{ $department->department_number }}" placeholder="Enter Department Number">
                    @error('department_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Update</button>
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
