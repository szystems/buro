<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryCourse;
use App\Http\Requests\CategoryCourseFormRequest;
use Illuminate\Support\Facades\File;
use DB;

class CategoryCourseController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $queryCategory=$request->input('fcategory');
            $categories=DB::table('category_courses')
            ->where('name','LIKE','%'.$queryCategory.'%')
            ->where('status',1)
            ->orderBy('name','asc')
            ->paginate(25);
            $filterCategories = CategoryCourse::all();
            return view('admin.category_course.index', compact('categories','queryCategory','filterCategories'));
        }

    }

    public function show($id)
    {
        $category = CategoryCourse::find($id);
        return view('admin.category_course.show', compact('category'));
    }

    public function add()
    {
        return view('admin.category_course.add');
    }

    public function insert(CategoryCourseFormRequest $request)
    {
        $category = new CategoryCourse();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category_courses',$filename);
            $category->image = $filename;
        }

        $name_category = $request->input('name');
        $palabras = explode(' ', trim($name_category));
        $num_palabras = str_word_count($name_category);
        $slug = $palabras[0];
        for ($i = 1; $i <= $num_palabras-1; $i++) {
            $slug = $slug."-".ucwords($palabras[$i]);
            error_log("slug: ".$slug);
        }
        if(CategoryCourse::where('slug',$slug)->exists())
        {
            $slug = $slug.$category->id;
        }

        $category->name = $request->input('name');
        $category->slug = $slug;
        $category->description = $request->input('description');
        $category->show = $request->input('show') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->status = 1;
        $category->save();

        return redirect('course-categories')->with('status', __('Course Category Added Successfully'));
    }

    public function edit($id)
    {
        $category = CategoryCourse::find($id);
        return view('admin.category_course.edit', \compact('category'));
    }

    public function update(CategoryCourseFormRequest $request, $id)
    {
        $category = CategoryCourse::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category_courses/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category_courses',$filename);
            $category->image = $filename;
        }

        $name_category = $request->input('name');
        $palabras = explode(' ', trim($name_category));
        $num_palabras = str_word_count($name_category);
        $slug = $palabras[0];
        for ($i = 1; $i <= $num_palabras-1; $i++) {
            $slug = $slug."-".ucwords($palabras[$i]);
            error_log("slug: ".$slug);
        }
        if(CategoryCourse::where('slug',$slug)->exists())
        {
            $slug = $slug.$category->id;
        }

        $category->name = $request->input('name');
        $category->slug = $slug;
        $category->description = $request->input('description');
        $category->show = $request->input('show') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->update();

        return redirect('course-categories')->with('status',__('Course Category Updated Successfully'));
    }

    public function destroy($id)
    {
        $category = CategoryCourse::find($id);
        $category->status = 0;
        $category->update();
        return redirect('course-categories')->with('status',__('Course Category Deleted Successfully'));
    }
}
