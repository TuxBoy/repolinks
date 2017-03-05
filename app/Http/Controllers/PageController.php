<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

  public function index()
  {
    $all_links = Link::linksByOrder()->paginate(15);
    return view('pages.index', [
      'links' => $all_linksgit
    ]);
  }

}
