<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $queryCategory=$request->input('fcategory');
            $categories=DB::table('categories')
            ->where('name','LIKE','%'.$queryCategory.'%')
            ->orderBy('name','asc')
            ->paginate(25);
            $filterCategories = Category::all();
            return view('admin.category.index', compact('categories','queryCategory','filterCategories'));
        }

    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.show', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(CategoriaFormRequest $request)
    {
        $category = new Category();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
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
        if(Category::where('slug',$slug)->exists())
        {
            $slug = $slug.$category->id;
        }

        $category->name = $request->input('name');
        $category->slug = $slug;
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->save();

        return redirect('/categories')->with('status', __('Category Added Successfully'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', \compact('category'));
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
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
        if(Category::where('slug',$slug)->exists())
        {
            $slug = $slug.$category->id;
        }

        $category->name = $request->input('name');
        $category->slug = $slug;
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->update();

        return redirect('/categories')->with('status',__('Category Updated Successfully'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if (File::exists($path))
            {
                File::delete($path);

            }
        }
        $category->delete();
        return redirect('/categories')->with('status',__('Category Deleted Successfully'));
    }
}
