<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>
        @foreach ($DStheloai as $theloai)
            @if (count($theloai->loaitin) > 0)
                <li href="#" class="list-group-item menu1">
                    {{ $theloai->Ten }}
                </li>
                <ul>
                    @foreach($theloai->loaitin as $loaitin)
                    <li class="list-group-item">
                        <a href="loaitin/{{ $loaitin->id }}">{{ $loaitin->Ten }}</a>
                    </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>
