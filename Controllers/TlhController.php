<?php

namespace Pixyboy\Tlh\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tlh;
class TlhController extends Controller {
   public function index() {
      return view('MyView::master');
   }

public function selector(Request $request){
    $result = '';
    if($request->id == 0){
        return $result;
    }
    if($request->child == "child1"){
        $tag = "سطح دوم" ;
    }else if($request->child == "child2"){
        $tag = "سطح سوم" ;
    }
    $category = Tlh::where('parent_id' , $request->id)->get();
    if(count($category)){
        $result = '<option value="0">'.$tag.'</option>';
        foreach($category as $item){
            $result .= "<option value =".$item->id.">".$item->title."</option>" ;
        }
    }
    return $result;
}
public function addCategory(){
    $category = Tlh::where('parent_id', 0)->get();
    $category_all = Tlh::get();

    return view('MyView::master', compact('category', 'category_all'));

}
public function postCategory(Request $request){
    $category = new Tlh();
    if ($request->child_2_parent) {
        $category_message = 'دسته بندی سطح3';
        $parent_id = $request->child_2_parent;
    }elseif ($request->child_1_parent) {
        $category_message = 'دسته بندی سطح2';
        $parent_id = $request->child_1_parent;
    }else {
        $parent_id = $request->main_parent;
        $category_message = 'دسته بندی سطح1';
    }

    $category->parent_id = $parent_id;
    $category->title = $request->title;
    $category->save();


    return view('MyView::master');
}


}
