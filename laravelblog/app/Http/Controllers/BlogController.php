<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function upload(Request $request)
    {
        $blog=new Blog();
        $blog->title=request('title');
        $blog->sdesc=request('sdesc');
        $blog->fdesc=request('fdesc');
        $blog->category=request('category');
        $blog->viewcounter=0;

        if($this->validate($request,['file'=>'required|image|mimes:jpg,png,gif|max:2048']))
        error_log("success sucesss");
        else
        error_log("failed failed failed failed failed failed failed");
        
        $image = $request->file('file');
        $newimagename = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads'),$newimagename);
        $blog->imglocation='/uploads/'.$newimagename;
        error_log('successfully uploadedsuccessfully uploadedsuccessfully uploadedsuccessfully uploadedsuccessfully uploadedsuccessfully uploadedsuccessfully uploaded');
        $blog->save();
        
        return redirect('/outdoor');
    }
    function admin()
    {
        return view('admin');
    }
    function search()
    {
        $user = Auth::user();  
        $email = $user->email;
        $searchterm= request('searchterm');
        $allblogs = Blog::where('title','like','%'.$searchterm.'%')->get();
        $blogscatcount = DB::table('blogs')
        ->select(DB::raw('count(*) as catcount'),'category')
        ->groupBy('category')
        ->get();
        return view('searchresults',compact('email','allblogs','blogscatcount'));
    }
    function single($id)
    {
        $user = Auth::user();   
        $email = $user->email;
        $blog = Blog::findOrFail($id);
        $blogscatcount = DB::table('blogs')
                    ->select(DB::raw('count(*) as catcount'),'category')
                    ->groupBy('category')
                    ->get();
        
        return view('detail',compact('email','blog','blogscatcount'));
    }
    function hot()
    { 
        $user = Auth::user();
        $allblogs = Blog::where('category','hot')->paginate(3);
        $email = $user->email;
        //select count(*) as categorycount, category from blogs group by category
        $blogscatcount = DB::table('blogs')
                    ->select(DB::raw('count(*) as catcount'),'category')
                    ->groupBy('category')
                    ->get();
        
        return view('hot',compact('email','allblogs','blogscatcount'));
    }
    function food()
    { 
        $user = Auth::user();   
        $allblogs = Blog::where('category','food')->paginate(3);
        $email = $user->email;
        //select count(*) as categorycount, category from blogs group by category
        $blogscatcount = DB::table('blogs')
                    ->select(DB::raw('count(*) as catcount'),'category')
                    ->groupBy('category')
                    ->get();
        
        return view('food',compact('email','allblogs','blogscatcount'));
    }
    function outdoor()
    { 
        $user = Auth::user();   
        $allblogs = Blog::where('category','outdoor')->paginate(3);
        $email = $user->email;
        //select count(*) as categorycount, category from blogs group by category
        $blogscatcount = DB::table('blogs')
                    ->select(DB::raw('count(*) as catcount'),'category')
                    ->groupBy('category')
                    ->get();
        
        return view('outdoor',compact('email','allblogs','blogscatcount'));
    }
}
