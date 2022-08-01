@if (Session::has('data'))
    @php
        $data = Session::get('data');
        $ranks = $data['ranks'];
        $reward = $data['reward'];
        $progressLevel = $reward['progress'];
        $level = $reward['level'];
        $rankin1s = $ranks[0];
    @endphp
    {{ $rankin1s['rank'] }}
@endif
