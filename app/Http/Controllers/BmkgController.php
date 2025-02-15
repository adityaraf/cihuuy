<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;


class BmkgController extends Controller
{
    public function gempa()
    {
        $user = Auth::user(); // Dapatkan user yang sedang login
        $menus = Menu::whereIn('menu_id', function ($query) use ($user) {
            $query->select('menu_id')
                ->from('setting_menu_user')
                ->where('id_jenis_user', $user->id_jenis_user)
                ->where('delete_mark', false);
        })->get();

        return view('bmkg.gempa', compact('menus'));
    }

    public function cuaca()
    {
        $user = Auth::user(); // Dapatkan user yang sedang login
        $menus = Menu::whereIn('menu_id', function ($query) use ($user) {
            $query->select('menu_id')
                ->from('setting_menu_user')
                ->where('id_jenis_user', $user->id_jenis_user)
                ->where('delete_mark', false);
        })->get();

        return view('bmkg.cuaca', compact('menus'));
    }
}
