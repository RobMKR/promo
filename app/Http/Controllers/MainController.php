<?php

namespace App\Http\Controllers;

use App\PromoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tab = $request->get('tab');

        if (!$tab) {
            return redirect()->to('/home?tab=form');
        }

        if ($tab === 'results') {
            $data = PromoUser::query()
                ->where('creator_id', Auth::id())
                ->orderBy('id', 'desc')
                ->limit(30)
                ->get();
        } else if ($tab === 'super') {
            $data['rows'] = PromoUser::query()
                ->orderBy('id', 'desc')
                ->limit(100)
                ->with('creator')
                ->get();

            $data['counts']['total'] = PromoUser::query()->count();
            $data['counts']['unique'] = DB::table('promo_users')->count(DB::raw('DISTINCT passport'));;
        } else {
            $data = [];
        }

        return view('main', [
            'data' => $data
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function form(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:128',
            'passport' => 'required|min:9|max:9',
            'phone' => 'required|min:8|max:12'
        ]);

        $passport = $request->input('passport');
        $name = $request->input('name');
        $phone = $request->input('phone');

        $checkPassport = PromoUser::query()
            ->where('passport', $passport)
            ->with('creator')
            ->get();

        if ($checkPassport->count() > 1) {
            $dates = [];
            $count = 1;

            foreach ($checkPassport as $item) {
                $dates[] = '<br>' . $count . '. ' . $item->creator->name . ' on ' . $item->created_at->setTimezone('Asia/Yerevan')->format('d.m.Y H:i');
                $count++;
            }

            Session::flash('error', 'User has already registered 2 promos: ' . implode(', ', $dates));

            return redirect()->back();
        }

        $created = PromoUser::query()->create([
            'name' => $name,
            'passport' => $passport,
            'phone_number' => $phone,
            'creator_id' => Auth::id()
        ]);

        Session::flash('success', 'User registered under ID: ' . $created->id);

        return redirect()->back();
    }
}
