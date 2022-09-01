<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $saved = $user->save();
        if ($saved)
            return redirect('login');
        return back()->with('fail', 'Something Went Wrong!');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                $request->session()->put('userName', $user->name);
                return redirect('dashboard');
            } else
                return back()->with('fail', 'Password doesnt match');
        } else
            return back()->with('fail', 'This email is not registered on our platform');
    }

    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::find(Session::get('loginId'));
        }
        return view('dashboard', compact('data'));
    }
    public function logout()
    {
        if (Session::has('loginId'))
            Session::pull('loginId');
        return redirect('login');
    }

    public function showData(Request $request)
    {
        $playerID = $request->name;
        Session::put('playerId', $playerID);
        $ranks = Http::withHeaders([
            'X-RapidAPI-Host' => 'rocket-league1.p.rapidapi.com',
            'X-RapidAPI-Key' => '4018dc4802msh79cdf4f3320d20ep19042ejsnfa92b6f34fd1'
        ])->get("https://rocket-league1.p.rapidapi.com/ranks/{$playerID}");
        $ranksArray = $ranks->json();
        $ranks = $ranksArray['ranks'];
        $reward = $ranksArray['reward'];
        $data = [$ranks, $reward];
        Session::put('data', $data);
        return back();
    }

    public function showWins()
    {
        $playerID = Session::get('playerId');
        $wins = Http::withHeaders([
            'X-RapidAPI-Host' => 'rocket-league1.p.rapidapi.com',
            'X-RapidAPI-Key' => '4018dc4802msh79cdf4f3320d20ep19042ejsnfa92b6f34fd1'
        ])->get("https://rocket-league1.p.rapidapi.com/stat/{$playerID}/wins");
        $winsVal = $wins->json();
        $winsVal = $winsVal['value'];
        Session::put('wval', $winsVal);
        return back();
    }
    //YOU MUST SETUP DIFFERENT VALUES WHEN REDIRECTING BACK TO THE VIEW OR ALL OF THE VALUES WILL BE THE SAME
    public function showMVPS()
    {
        $playerID = Session::get('playerId');
        $mvps = Http::withHeaders([
            'X-RapidAPI-Host' => 'rocket-league1.p.rapidapi.com',
            'X-RapidAPI-Key' => '4018dc4802msh79cdf4f3320d20ep19042ejsnfa92b6f34fd1'
        ])->get("https://rocket-league1.p.rapidapi.com/stat/{$playerID}/mvps");
        $mvpsVal = $mvps->json();
        $mvpsVal = $mvpsVal['value'];
        Session::put('mval', $mvpsVal);
        return back();
    }

    public function showGoals()
    {
        $playerID = Session::get('playerId');
        $goals = Http::withHeaders([
            'X-RapidAPI-Host' => 'rocket-league1.p.rapidapi.com',
            'X-RapidAPI-Key' => '4018dc4802msh79cdf4f3320d20ep19042ejsnfa92b6f34fd1'
        ])->get("https://rocket-league1.p.rapidapi.com/stat/{$playerID}/goals");
        $goalsVal = $goals->json();
        $goalsVal = $goalsVal['value'];
        Session::put('gval', $goalsVal);
        return back();
    }

    public function showSaves()
    {
        $playerID = Session::get('playerId');
        $saves = Http::withHeaders([
            'X-RapidAPI-Host' => 'rocket-league1.p.rapidapi.com',
            'X-RapidAPI-Key' => '4018dc4802msh79cdf4f3320d20ep19042ejsnfa92b6f34fd1'
        ])->get("https://rocket-league1.p.rapidapi.com/stat/{$playerID}/saves");
        $savesVal = $saves->json();
        $savesVal = $savesVal['value'];
        Session::put('savesval', $savesVal);
        return back();
    }

    public function showAssists()
    {
        $playerID = Session::get('playerId');
        $assists = Http::withHeaders([
            'X-RapidAPI-Host' => 'rocket-league1.p.rapidapi.com',
            'X-RapidAPI-Key' => '4018dc4802msh79cdf4f3320d20ep19042ejsnfa92b6f34fd1'
        ])->get("https://rocket-league1.p.rapidapi.com/stat/{$playerID}/assists");
        $assistsVal = $assists->json();
        $assistsVal = $assistsVal['value'];
        Session::put('assistsval', $assistsVal);
        return back();
    }

    public function showShots()
    {
        $playerID = Session::get('playerId');
        $shots = Http::withHeaders([
            'X-RapidAPI-Host' => 'rocket-league1.p.rapidapi.com',
            'X-RapidAPI-Key' => '4018dc4802msh79cdf4f3320d20ep19042ejsnfa92b6f34fd1'
        ])->get("https://rocket-league1.p.rapidapi.com/stat/{$playerID}/shots");
        $shotsVal = $shots->json();
        $shotsVal = $shotsVal['value'];
        Session::put('shotsval', $shotsVal);
        return back();
    }
}
