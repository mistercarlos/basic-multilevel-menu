<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Exception;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_auth', ['except' => ['signin', 'signup']]);
        $this->middleware('is_admin', ['only' => ['admin', 'menu_create']]);
    }

    public function home()
    {

        $menus = Menu::all();
        $menus = json_decode(json_encode($menus), true);

        foreach ($menus as $key => $menu) {
            if ($menu['menu_id']) {
                $menu_id = $menu['menu_id'];
                
                $this->traverseArray($menus, $menu_id, $menu);
                
                // array_walk_recursive($menus, function (&$value, $key) use($menu_id, $menu) {
                //     // print_r($value);
                //     if ( $key == 'id' && $value == $menu_id) {
                //         $value['children'][] = $menu;
                //     }
                //     // if (is_array($value)) {

                //     //     if ($value['id'] == $menu_id) {
                //     //         $value['children'][] = $menu;
                //     //     }
                //     // }

                // });
                // $index = array_search($menu['menu_id'], array_column($menus, 'id'));
                // $menus[$index]['children'][] = $menu;
                unset($menus[$key]);
            }
        }

        // dd($menus);
        $htm = '<li><a href="#">Home</a></li>';
        return view('pages.home')->with([
            'menus' => $menus,
            'htm' => $htm
        ]);
    }

    public function admin()
    {
        return view('pages.admin');
    }

    public function menu_index()
    {
        $menus = Menu::all();
        return view('pages.menu')->with([
            'menus' => $menus
        ]);
    }


    public function menu_create()
    {
        $menus = Menu::all();
        return view('pages.menu-create')->with([
            'menus' => $menus
        ]);
    }

    public function menu_store(Request $request)
    {
        try {
            $data = [];
                                            
            $message = [
                'required' => "Name and route's name field must be filled",
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'link' => 'required',
            ],$message);

            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $data['name'] = htmlspecialchars(trim(stripslashes($request->name)));

            if ($request->ref && $request->ref != -1) {
                $data['menu_id'] = htmlspecialchars(trim($request->ref));
            }
            $data['link'] = htmlspecialchars(trim($request->link));

            $menu = Menu::create($data);
            
            return redirect()->route('menu.index')->with(['status' => true, 'message' => "Menu created successfully"]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->route('menu.create')->with(['status' => false, 'message' => "Issue. Please, contact administrator !!!"]);
        }
    }

    public function signup()
    {
        if (session()->has('connected')) {
            return redirect()->route('home');
        }
        return view('pages.signup');
    }

    public function signin()
    {
        if (session()->has('connected')) {
            return redirect()->route('home');
        }
        return view('pages.signin');
    }


    protected function findInArray($e, $array, $lookfor, $take)
    {
        $key = array_search($e, array_column($array , $lookfor));
        return $key === false ? null : $array[$key][$take];//retrieve page id
    }

    protected function traverseArray(&$array, $menu_id, $entry)
    {

        foreach($array as $key=>&$value)
        {
            if(is_array($value))
            {
                $this->traverseArray($value, $menu_id, $entry);
            }
            if($key == "id" && $value == $menu_id) 
            {
                // array_push($array["children"], $entry); 
                $array['children'][] = $entry;

            }
        }
    }


}
