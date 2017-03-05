<?php
namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Link;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LinkController extends Controller
{

  const NBR_LINK_PER_PAGE = 10;

  public function index()
  {
    $links = Link::linksByOrder()->where('user_id', Auth::id())->paginate(self::NBR_LINK_PER_PAGE);
    return view('links.index', compact('links'));
  }

  public function user(User $user)
  {
    $links_to_user = Link::where('user_id', $user->id)->get();
    return view('links.user', [
      'links' => $links_to_user,
      'user'  => $user
    ]);
  }

  public function store(LinkRequest $request)
  {
    $favory = $request->input('favory');
    if (!empty($request->all())) {
      Link::create([
        'url'      => $request->input('url'),
        'priority' => $request->input('priority'),
        'favory'   => (isset($favory)) ? 1 : 0,
        'user_id'  => $request->user()->id
      ]);
      return redirect()->route('link.index')->with('success', 'Le lien a bien �t� sauvegard�.');
    }
    return false;
  }

  public function destroy(Link $link)
  {
    $link->delete();
    return redirect()->route('link.index')->with('success', 'Le lien a bien �t� supprim�.');
  }

}
