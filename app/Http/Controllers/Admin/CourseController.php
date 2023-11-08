<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryCourse;
use App\Models\Course;
use App\Http\Requests\CourseFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use DB;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $queryCourse=$request->input('fcourse');
            $queryCategory=$request->input('fcategory');
            $courses=Course::where('status','=',1)
            ->where('name','LIKE','%'.$queryCourse.'%')
            ->where('category_course_id','LIKE',$queryCategory)
            ->orderBy('updated_at','desc')
            ->get();
            $filterCategories = CategoryCourse::where('status', 1)->get();
            $filterCourses = Course::Where('status', 1)->get();
            return view('admin.course.index', compact('courses','queryCourse','queryCategory','filterCategories','filterCourses'));
        }
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('admin.course.show', compact('course'));
    }

    public function add()
    {
        $filterCategories = CategoryCourse::where('status',1)->get();
        return view('admin.course.add', compact('filterCategories'));
    }

    public function insert(CourseFormRequest $request)
    {
        $course = new Course();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/courses',$filename);
            $course->image = $filename;
        }

        if($request->hasFile('file_pdf'))
        {
            $file1 = $request->file('file_pdf');
            $ext1 = $file1->getClientOriginalExtension();
            $filename1 = time().'.'.$ext1;
            $file1->move('assets/uploads/courses_pdf',$filename1);
            $course->file_pdf = $filename1;
        }

        $name_course = $request->input('name');
        $palabras = explode(' ', trim($name_course));
        $num_palabras = str_word_count($name_course);
        $slug = $palabras[0];
        for ($i = 1; $i <= $num_palabras-1; $i++) {
            $slug = $slug."-".ucwords($palabras[$i]);
            error_log("slug: ".$slug);
        }
        if(Course::where('slug',$slug)->exists())
        {
            $slug = $slug.$course->id;
        }

        $course->category_course_id = $request->input('category_course_id');
        $course->name = $request->input('name');
        $course->slug = $slug;
        $course->description = $request->input('description');
        $course->show = $request->input('show') == TRUE ? '1':'0';
        $course->popular = $request->input('popular') == TRUE ? '1':'0';
        $course->status = 1;
        $course->save();

        return redirect('index-courses')->with('status', __('Course Added Successfully'));
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $filterCategories = CategoryCourse::where('status',1)->get();
        return view('admin.course.edit', compact('course','filterCategories'));
    }

    public function update(CourseFormRequest $request, $id)
    {
        $course = Course::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/courses/'.$course->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/courses',$filename);
            $course->image = $filename;
        }

        if($request->hasFile('file_pdf'))
        {
            $path1 = 'assets/uploads/courses/'.$course->file_pdf;
            if(File::exists($path1))
            {
                File::delete($path1);
            }
            $file1 = $request->file('file_pdf');
            $ext1 = $file1->getClientOriginalExtension();
            $filename1 = time().'.'.$ext1;
            $file1->move('assets/uploads/courses_pdf',$filename1);
            $course->file_pdf = $filename1;
        }

        $name_course = $request->input('name');
        $palabras = explode(' ', trim($name_course));
        $num_palabras = str_word_count($name_course);
        $slug = $palabras[0];
        for ($i = 1; $i <= $num_palabras-1; $i++) {
            $slug = $slug."-".ucwords($palabras[$i]);
            error_log("slug: ".$slug);
        }
        if(Course::where('slug',$slug)->exists())
        {
            $slug = $slug.$course->id;
        }

        $course->category_course_id = $request->input('category_course_id');
        $course->name = $request->input('name');
        $course->slug = $slug;
        $course->description = $request->input('description');
        $course->show = $request->input('show') == TRUE ? '1':'0';
        $course->popular = $request->input('popular') == TRUE ? '1':'0';
        $course->update();

        return redirect('index-courses')->with('status',__('Course Updated Successfully'));
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->status = 0;
        $course->update();
        return redirect('index-courses')->with('status',__('Course Deleted Successfully'));
    }
}
