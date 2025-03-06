<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class _SiteController extends Controller
{
    public function __invoke()
    {
        return view('index');
    }

    public function admin()
    {
        $contacts = Contact::query()
            ->where('user_id', Auth::id())
            ->with([
                'user',
                'category',
            ])
            ->orderBy('id', 'desc')
            ->paginate(10);

            $categories = Category::query()->orderBy('name','ASC')->get();

        return view('admin.index', [
            'contacts' => $contacts,
            'categories' => $categories,
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}