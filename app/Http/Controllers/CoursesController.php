<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DTO\courseDTO;
use App\Http\Requests\CourseRequest;
use App\Repository\interface\ICourseRepository;


class CoursesController extends Controller
{

    protected $courseRepository;

    public function __construct(ICourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(courseRequest $request)
    {
        
        $data = courseDTO::handleInputs($request);
        $this->courseRepository->create($data);
        return redirect()->route('course.index');
        toast('Success Toast','success');
    }

    public function show(string $id)
    {
        //$courses = $this->courseRepository->getById($id);
        //return view('layouts.dashboard.department.show', compact('department'));
    }

    public function edit($id)
    {
        $course = $this->courseRepository->getById($id);
        return view('course.edit', compact('course'));
    }

    public function update(departmentRequest $request, string $id)
    {
        // Convert the request to a DTO
        $data = courseDTO::handleInputs($request);

        // Pass the DTO data as an array to the repository
        $this->courseRepository->update($data, $id);

        return redirect()->route('course.index')->with('success', 'Course updated successfully');
    }

    public function destroy($id)
    {
        $this->courseRepository->delete($id);
        return redirect()->back();
    }}
    }
}
