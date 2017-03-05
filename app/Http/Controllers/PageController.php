<?php

namespace App\Http\Controllers;

use App\Link;

class PageController extends Controller
{

  public function index()
  {
    $all_links = Link::linksByOrder()->paginate(15);
    return view('pages.index', [
      'links' => $all_links
    ]);
  }

}
