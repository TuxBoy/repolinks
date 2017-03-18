<?php
namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Link;
use App\TuxBoy\Has_Rules;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{

  use Has_Rules;

  const NBR_LINK_PER_PAGE = 10;

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
    /** @var $links Link */
    $links = Link::linksByOrder()->where('user_id', Auth::id())->paginate(self::NBR_LINK_PER_PAGE);
    return view('links.index', compact('links'));
  }

  /**
   * @param User $user
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
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
    if (!empty($request->all())) {
      Link::create([
        'url'         => $request->input('url'),
        'description' => $request->input('description'),
        'favory'      => $request->input('favory') ? true : false,
        'private'     => $request->input('private') ? true : false,
        'priority'    => $request->input('priority'),
        'user_id'     => $request->input('user_id'),
      ]);
      return redirect()->route('link.index')->with('success', 'Le lien a bien été sauvegardé.');
    }
    return false;
  }

  public function destroy(Link $link)
  {
    $link->delete();
    return redirect()->route('link.index')->with('success', 'Le lien a bien �t� supprim�.');
  }

  /**
   * @param Link $link
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function edit(Link $link)
  {
    return view('links.edit', compact('link'));
  }

  /**
   * @param Request $request
   * @param Link $link
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(Request $request, Link $link)
  {
    $this->validator($request->all())->validate();
    // Met à jour le lien
    $link->update([
      'url'         => $request->input('url'),
      'description' => $request->input('description'),
      'favory'      => $request->input('favory') ? true : false,
      'private'     => $request->input('private') ? true : false,
      'priority'    => $request->input('priority'),
    ]);
    return redirect()->route('link.index')->with('success', 'Votre lien a bien été mis à jour.');
  }

  /**
   * Update validation
   * @param array $data
   */
  protected function validator(array $data)
  {
    return Validator::make($data, $this->defaultRules());
  }

}
