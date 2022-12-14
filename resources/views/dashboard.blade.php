<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https:://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>

<body>


    <nav>
        <div class="logo-div">
            <img class="rl-logo" src="{{ asset('images/RLlogo_prev_ui.png') }}" alt="">
            <div class="socials">
                <a class="git-logo" href="https://github.com/hnasser44?tab=repositories"><i class="fa-brands fa-github"
                        title="GITHUB"></i></a>
                <a href="https://www.instagram.com/hasan_nasser_/">
                    <i class="fa-brands fa-instagram ig" title="INSTAGRAM"></i>
                </a>
                <a href="https://www.linkedin.com/in/hassan-nasser-08b59b230/">
                    <i class="fa-brands fa-linkedin ld" title="LINKEDIN"></i>
                </a>
            </div>
        </div>
        <div class="profile">
            <img class="no-profile-logo" src="{{ asset('images/no-profile-removebg-preview.png') }}" alt="no-proifle">
            <span class="user-name">{{ Session::get('userName') }}</span>
            <a href="logout">
                <i class="gg-log-out"></i>
            </a>
        </div>

    </nav>

    <div class="stats-search">
        <div class="container">
            <form action="{{ route('showdata') }}" method="GET">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Epic Games account ID or Console ID" name="name">
                <button id="btn" type="submit">
                    Search
                </button>
            </form>
        </div>

        @if (Session::has('data'))
            <div class="stats">
                <div>
                    <h1>Stats (Total)</h1>
                </div>
                <div class="temp-container">

                    <div class="stat-container">
                        <img src="{{ asset('images/wins.png') }}" alt="">
                        @if (Session::has('wval'))
                            <span>{{ Session::get('wval') }} Wins</span>
                        @else
                            <a href="{{ route('showWins') }}">
                                <button>SHOW</button>
                            </a>
                        @endif
                    </div>
                    <div class="stat-container">
                        <img src="{{ asset('images/mvps.png') }}" alt="">
                        @if (Session::has('mval'))
                            <span>{{ Session::get('mval') }} Wins</span>
                        @else
                            <a href="{{ route('showMVPS') }}">
                                <button>SHOW</button>
                            </a>
                        @endif
                    </div>
                    <div class="stat-container">
                        <img src="{{ asset('images/goals.png') }}" alt="">
                        @if (Session::has('gval'))
                            <span>{{ Session::get('gval') }} Wins</span>
                        @else
                            <a href="{{ route('showGoals') }}">
                                <button>SHOW</button>
                            </a>
                        @endif
                    </div>
                    <div class="stat-container">
                        <img src="{{ asset('images/assists.png') }}" alt="">
                        @if (Session::has('assistsval'))
                            <span>{{ Session::get('assistsval') }} Assists</span>
                        @else
                            <a href="{{ route('showAssists') }}">
                                <button>SHOW</button>
                            </a>
                        @endif
                    </div>
                    <div class="stat-container">
                        <img src="{{ asset('images/saves.png') }}" alt="">
                        @if (Session::has('savesval'))
                            <span>{{ Session::get('savesval') }} Saves</span>
                        @else
                            <a href="{{ route('showSaves') }}">
                                <button>SHOW</button>
                            </a>
                        @endif
                    </div>
                    <div class="stat-container">
                        <img src="{{ asset('images/shots.png') }}" alt="">
                        @if (Session::has('shotsval'))
                            <span>{{ Session::get('shotsval') }} Shots</span>
                        @else
                            <a href="{{ route('showShots') }}">
                                <button>SHOW</button>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
            @php
                $ranks = Session::get('data')[0];
                $rewards = Session::get('data')[1];
                $rank_1s = $ranks[0];
                $rank_2s = $ranks[1];
                $rank_3s = $ranks[2];
                $rank_hoops = $ranks[3];
                $rank_rumble = $ranks[4];
                $rank_dropshot = $ranks[5];
                $rank_snowday = $ranks[6];
            @endphp
            <div class=" season-reward-levels">
                <div>
                    <h2>Season Reward Rank</h2>
                </div>
                @if ($rewards['level'] == 'Grand Champion')
                    <img src="{{ asset('images/ranks/gc1.png') }}" alt="">
                @elseif ($rewards['level'] == 'Bronze')
                    <img src="{{ asset('images/ranks/bronze-season.png') }}" alt="">
                @elseif ($rewards['level'] == 'Gold')
                    <img src="{{ asset('images/ranks/gold1-season.png') }}" alt="">
                @elseif ($rewards['level'] == 'Platinum')
                    <img src="{{ asset('images/ranks/plat1.png') }}" alt="">
                @elseif ($rewards['level'] == 'Silver')
                    <img src="{{ asset('images/ranks/silver-season.png') }}" alt="">
                @elseif ($rewards['level'] == 'Champion')
                    <img src="{{ asset('images/ranks/champ1.png') }}" alt="">
                @elseif ($rewards['level'] == 'Diamond')
                    <img src="https://rlstats.net/images/ranks/s17rl5.png" alt="">
                @elseif ($rewards['level'] == 'Supersonic Legend')
                    <img src="https://rlstats.net/images/ranks/s17rl8.png" alt="">
                @else
                    <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                @endif
                <div role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"
                    style="--value: {{ $rewards['progress'] * 10 }}">
                </div>
                <div class="reward-msg">
                    {{ $rewards['progress'] }}/10 till next Reward level
                </div>
            </div>

            <div class="ranks-grid">
                <div class="grid-item">
                    <h6>1v1 Solo Duel</h6>
                    <h6>{{ $rank_1s['rank'] }}</h6>
                    <h6>MMR: {{ $rank_1s['mmr'] }}</h6>
                    @if ($rank_1s['rank'] == 'Bronze I')
                        <img src="{{ asset('images/ranks/Bronze1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Bronze II')
                        <img src="{{ asset('images/ranks/Bronze2_rank_icon_.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Bronze III')
                        <img src="{{ asset('images/ranks/Bronze3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Champion I')
                        <img src="{{ asset('images/ranks/Champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Champion II')
                        <img src="{{ asset('images/ranks/Champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Champion III')
                        <img src="{{ asset('images/ranks/Champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Diamond I')
                        <img src="{{ asset('images/ranks/Diamond1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Diamond II')
                        <img src="{{ asset('images/ranks/Diamond2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Diamond III')
                        <img src="{{ asset('images/ranks/Diamond3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Gold I')
                        <img src="{{ asset('images/ranks/Gold1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Gold II')
                        <img src="{{ asset('images/ranks/Gold2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Gold III')
                        <img src="{{ asset('images/ranks/Gold3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Grand Champion I')
                        <img src="{{ asset('images/ranks/Grand_champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Grand Champion II')
                        <img src="{{ asset('images/ranks/Grand_champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Grand Champion III')
                        <img src="{{ asset('images/ranks/Grand_champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Platinum I')
                        <img src="{{ asset('images/ranks/Platinum1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Platinum II')
                        <img src="{{ asset('images/ranks/Platinum2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Platinum III')
                        <img src="{{ asset('images/ranks/Platinum3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_1s['rank'] == 'Supersonic Legend')
                        <img src="{{ asset('images/ranks/Supersonic_Legend_rank_icon.webp') }}" alt="">
                    @else
                        <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                    @endif
                    <h6>Matches Played: {{ $rank_1s['played'] }}</h6>
                    <h6>Streak: {{ $rank_1s['streak'] }}</h6>
                </div>
                <div class="grid-item">
                    <h6>2v2 Doubles</h6>
                    <h6>{{ $rank_2s['rank'] }}</h6>
                    <h6>MMR: {{ $rank_2s['mmr'] }}</h6>
                    @if ($rank_1s['rank'] == 'Bronze I')
                        <img src="{{ asset('images/ranks/Bronze1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Bronze II')
                        <img src="{{ asset('images/ranks/Bronze2_rank_icon_.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Bronze III')
                        <img src="{{ asset('images/ranks/Bronze3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Champion I')
                        <img src="{{ asset('images/ranks/Champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Champion II')
                        <img src="{{ asset('images/ranks/Champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Champion III')
                        <img src="{{ asset('images/ranks/Champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Diamond I')
                        <img src="{{ asset('images/ranks/Diamond1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Diamond II')
                        <img src="{{ asset('images/ranks/Diamond2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Diamond III')
                        <img src="{{ asset('images/ranks/Diamond3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Gold I')
                        <img src="{{ asset('images/ranks/Gold1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Gold II')
                        <img src="{{ asset('images/ranks/Gold2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Gold III')
                        <img src="{{ asset('images/ranks/Gold3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Grand Champion I')
                        <img src="{{ asset('images/ranks/Grand_champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Grand Champion II')
                        <img src="{{ asset('images/ranks/Grand_champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Grand Champion III')
                        <img src="{{ asset('images/ranks/Grand_champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Platinum I')
                        <img src="{{ asset('images/ranks/Platinum1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Platinum II')
                        <img src="{{ asset('images/ranks/Platinum2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Platinum III')
                        <img src="{{ asset('images/ranks/Platinum3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_2s['rank'] == 'Supersonic Legend')
                        <img src="{{ asset('images/ranks/Supersonic_Legend_rank_icon.webp') }}" alt="">
                    @else
                        <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                    @endif
                    <h6>Matches Played: {{ $rank_2s['played'] }}</h6>
                    <h6>Streak: {{ $rank_2s['streak'] }}</h6>
                </div>
                <div class="grid-item">
                    <h6>3v3 Standard</h6>
                    <h6>{{ $rank_3s['rank'] }}</h6>
                    <h6>MMR: {{ $rank_3s['mmr'] }}</h6>
                    @if ($rank_3s['rank'] == 'Bronze I')
                        <img src="{{ asset('images/ranks/Bronze1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Bronze II')
                        <img src="{{ asset('images/ranks/Bronze2_rank_icon_.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Bronze III')
                        <img src="{{ asset('images/ranks/Bronze3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Champion I')
                        <img src="{{ asset('images/ranks/Champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Champion II')
                        <img src="{{ asset('images/ranks/Champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Champion III')
                        <img src="{{ asset('images/ranks/Champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Diamond I')
                        <img src="{{ asset('images/ranks/Diamond1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Diamond II')
                        <img src="{{ asset('images/ranks/Diamond2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Diamond III')
                        <img src="{{ asset('images/ranks/Diamond3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Gold I')
                        <img src="{{ asset('images/ranks/Gold1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Gold II')
                        <img src="{{ asset('images/ranks/Gold2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Gold III')
                        <img src="{{ asset('images/ranks/Gold3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Grand Champion I')
                        <img src="{{ asset('images/ranks/Grand_champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Grand Champion II')
                        <img src="{{ asset('images/ranks/Grand_champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Grand Champion III')
                        <img src="{{ asset('images/ranks/Grand_champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Platinum I')
                        <img src="{{ asset('images/ranks/Platinum1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Platinum II')
                        <img src="{{ asset('images/ranks/Platinum2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Platinum III')
                        <img src="{{ asset('images/ranks/Platinum3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_3s['rank'] == 'Supersonic Legend')
                        <img src="{{ asset('images/ranks/Supersonic_Legend_rank_icon.webp') }}" alt="">
                    @else
                        <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                    @endif
                    <h6>Matches Played: {{ $rank_3s['played'] }}</h6>
                    <h6>Streak: {{ $rank_3s['streak'] }}</h6>
                </div>
                <div class="grid-item">
                    <h6>2v2 Hoops</h6>
                    <h6>{{ $rank_hoops['rank'] }}</h6>
                    <h6>MMR: {{ $rank_hoops['mmr'] }}</h6>
                    @if ($rank_hoops['rank'] == 'Bronze I')
                        <img src="{{ asset('images/ranks/Bronze1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Bronze II')
                        <img src="{{ asset('images/ranks/Bronze2_rank_icon_.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Bronze III')
                        <img src="{{ asset('images/ranks/Bronze3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Champion I')
                        <img src="{{ asset('images/ranks/Champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Champion II')
                        <img src="{{ asset('images/ranks/Champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Champion III')
                        <img src="{{ asset('images/ranks/Champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Diamond I')
                        <img src="{{ asset('images/ranks/Diamond1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Diamond II')
                        <img src="{{ asset('images/ranks/Diamond2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Diamond III')
                        <img src="{{ asset('images/ranks/Diamond3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Gold I')
                        <img src="{{ asset('images/ranks/Gold1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Gold II')
                        <img src="{{ asset('images/ranks/Gold2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Gold III')
                        <img src="{{ asset('images/ranks/Gold3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Grand Champion I')
                        <img src="{{ asset('images/ranks/Grand_champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Grand Champion II')
                        <img src="{{ asset('images/ranks/Grand_champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Grand Champion III')
                        <img src="{{ asset('images/ranks/Grand_champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Platinum I')
                        <img src="{{ asset('images/ranks/Platinum1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Platinum II')
                        <img src="{{ asset('images/ranks/Platinum2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Platinum III')
                        <img src="{{ asset('images/ranks/Platinum3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_hoops['rank'] == 'Supersonic Legend')
                        <img src="{{ asset('images/ranks/Supersonic_Legend_rank_icon.webp') }}" alt="">
                    @else
                        <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                    @endif
                    <h6>Matches Played: {{ $rank_hoops['played'] }}</h6>
                    <h6>Streak: {{ $rank_hoops['streak'] }}</h6>
                </div>
                <div class="grid-item">
                    <h6>3v3 Rumble</h6>
                    <h6>{{ $rank_rumble['rank'] }}</h6>
                    <h6>MMR: {{ $rank_rumble['mmr'] }}</h6>
                    @if ($rank_rumble['rank'] == 'Bronze I')
                        <img src="{{ asset('images/ranks/Bronze1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Bronze II')
                        <img src="{{ asset('images/ranks/Bronze2_rank_icon_.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Bronze III')
                        <img src="{{ asset('images/ranks/Bronze3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Champion I')
                        <img src="{{ asset('images/ranks/Champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Champion II')
                        <img src="{{ asset('images/ranks/Champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Champion III')
                        <img src="{{ asset('images/ranks/Champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Diamond I')
                        <img src="{{ asset('images/ranks/Diamond1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Diamond II')
                        <img src="{{ asset('images/ranks/Diamond2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Diamond III')
                        <img src="{{ asset('images/ranks/Diamond3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Gold I')
                        <img src="{{ asset('images/ranks/Gold1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Gold II')
                        <img src="{{ asset('images/ranks/Gold2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Gold III')
                        <img src="{{ asset('images/ranks/Gold3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Grand Champion I')
                        <img src="{{ asset('images/ranks/Grand_champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Grand Champion II')
                        <img src="{{ asset('images/ranks/Grand_champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Grand Champion III')
                        <img src="{{ asset('images/ranks/Grand_champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Platinum I')
                        <img src="{{ asset('images/ranks/Platinum1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Platinum II')
                        <img src="{{ asset('images/ranks/Platinum2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Platinum III')
                        <img src="{{ asset('images/ranks/Platinum3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_rumble['rank'] == 'Supersonic Legend')
                        <img src="{{ asset('images/ranks/Supersonic_Legend_rank_icon.webp') }}" alt="">
                    @else
                        <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                    @endif
                    <h6>Matches Played: {{ $rank_rumble['played'] }}</h6>
                    <h6>Streak: {{ $rank_rumble['streak'] }}</h6>
                </div>
                <div class="grid-item">
                    <h6>3v3 Dropshot</h6>
                    <h6>{{ $rank_dropshot['rank'] }}</h6>
                    <h6>MMR: {{ $rank_dropshot['mmr'] }}</h6>
                    @if ($rank_dropshot['rank'] == 'Bronze I')
                        <img src="{{ asset('images/ranks/Bronze1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Bronze II')
                        <img src="{{ asset('images/ranks/Bronze2_rank_icon_.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Bronze III')
                        <img src="{{ asset('images/ranks/Bronze3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Champion I')
                        <img src="{{ asset('images/ranks/Champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Champion II')
                        <img src="{{ asset('images/ranks/Champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Champion III')
                        <img src="{{ asset('images/ranks/Champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Diamond I')
                        <img src="{{ asset('images/ranks/Diamond1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Diamond II')
                        <img src="{{ asset('images/ranks/Diamond2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Diamond III')
                        <img src="{{ asset('images/ranks/Diamond3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Gold I')
                        <img src="{{ asset('images/ranks/Gold1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Gold II')
                        <img src="{{ asset('images/ranks/Gold2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Gold III')
                        <img src="{{ asset('images/ranks/Gold3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Grand Champion I')
                        <img src="{{ asset('images/ranks/Grand_champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Grand Champion II')
                        <img src="{{ asset('images/ranks/Grand_champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Grand Champion III')
                        <img src="{{ asset('images/ranks/Grand_champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Platinum I')
                        <img src="{{ asset('images/ranks/Platinum1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Platinum II')
                        <img src="{{ asset('images/ranks/Platinum2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Platinum III')
                        <img src="{{ asset('images/ranks/Platinum3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_dropshot['rank'] == 'Supersonic Legend')
                        <img src="{{ asset('images/ranks/Supersonic_Legend_rank_icon.webp') }}" alt="">
                    @else
                        <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                    @endif
                    <h6>Matches Played: {{ $rank_dropshot['played'] }}</h6>
                    <h6>Streak: {{ $rank_dropshot['streak'] }}</h6>
                </div>
                <div class="grid-item">
                    <h6>3v3 Snow Day</h6>
                    <h6>{{ $rank_snowday['rank'] }}</h6>
                    <h6>MMR: {{ $rank_snowday['mmr'] }}</h6>
                    @if ($rank_snowday['rank'] == 'Bronze I')
                        <img src="{{ asset('images/ranks/Bronze1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Bronze II')
                        <img src="{{ asset('images/ranks/Bronze2_rank_icon_.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Bronze III')
                        <img src="{{ asset('images/ranks/Bronze3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Champion I')
                        <img src="{{ asset('images/ranks/Champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Champion II')
                        <img src="{{ asset('images/ranks/Champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Champion III')
                        <img src="{{ asset('images/ranks/Champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Diamond I')
                        <img src="{{ asset('images/ranks/Diamond1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Diamond II')
                        <img src="{{ asset('images/ranks/Diamond2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Diamond III')
                        <img src="{{ asset('images/ranks/Diamond3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Gold I')
                        <img src="{{ asset('images/ranks/Gold1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Gold II')
                        <img src="{{ asset('images/ranks/Gold2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Gold III')
                        <img src="{{ asset('images/ranks/Gold3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Grand Champion I')
                        <img src="{{ asset('images/ranks/Grand_champion1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Grand Champion II')
                        <img src="{{ asset('images/ranks/Grand_champion2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Grand Champion III')
                        <img src="{{ asset('images/ranks/Grand_champion3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Platinum I')
                        <img src="{{ asset('images/ranks/Platinum1_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Platinum II')
                        <img src="{{ asset('images/ranks/Platinum2_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Platinum III')
                        <img src="{{ asset('images/ranks/Platinum3_rank_icon.webp') }}" alt="">
                    @elseif ($rank_snowday['rank'] == 'Supersonic Legend')
                        <img src="{{ asset('images/ranks/Supersonic_Legend_rank_icon.webp') }}" alt="">
                    @else
                        <img src="{{ asset('images/ranks/unranked.png') }}" alt="">
                    @endif

                    <h6>Matches Played: {{ $rank_snowday['played'] }}</h6>
                    <h6>Streak: {{ $rank_snowday['streak'] }}</h6>
                </div>

            </div>
        @endif

        <section id="loading-svg" class="hidden" style="margin-top: 1em;">
            <div class="loader">
                <span style="--i:1;"></span>
                <span style="--i:2;"></span>
                <span style="--i:3;"></span>
                <span style="--i:4;"></span>
                <span style="--i:5;"></span>
                <span style="--i:6;"></span>
                <span style="--i:7;"></span>
                <span style="--i:8;"></span>
                <span style="--i:9;"></span>
                <span style="--i:10;"></span>
                <span style="--i:11;"></span>
                <span style="--i:12;"></span>
                <span style="--i:13;"></span>
                <span style="--i:14;"></span>
                <span style="--i:15;"></span>
                <span style="--i:16;"></span>
                <span style="--i:17;"></span>
                <span style="--i:18;"></span>
                <span style="--i:19;"></span>
                <span style="--i:20;"></span>
            </div>
        </section>


        <script>
            const btn = document.getElementById('btn')
            const loadingSVG = document.getElementById('loading-svg')
            btn.addEventListener('click', (e) => {
                loadingSVG.classList.remove('hidden')
                @if (Session::has('data'))
                    loadingSVG.classList.add('hidden')
                @endif
            })
        </script>
</body>

</html>
