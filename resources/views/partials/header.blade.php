
<nav class=" navbar-light navbargradient">
    <div id="logo">Test App</div>
    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
        <ul class="menu">
        {{--

            {!! traverse_recur($menus) !!}
            --}}

        @foreach($menus as $key=> $value)

            @if(array_key_exists('children', $value))
                @php
                    $valu_2 = $value
                @endphp

                    @while(array_key_exists('children', $valu_2))
                        @php
                            $rand_id = uniqid(rand(), true);
                        @endphp
                        <li>
                            <label for="drop-{{$rand_id}}" class="toggle"> {{$valu_2['name']}} +</label>
                            <a href="#"> {{$valu_2['name']}} </a>
                            <input type="checkbox" id="drop-{{$rand_id}}"/>
                            <ul>
                            @foreach($valu_2['children'] as $key_depth1 => $child)
                                <li><a href="#"> {{$child['name']}} </a></li>
                            @endforeach
                            </ul> </li>
                            @php
                                $valu_2 = $valu_2['children']
                            @endphp
                    @endwhile

            @else
                <li><a href="#">{{$value['name']}}</a></li>
            @endif
        @endforeach
{{--


    @php


    array_walk_recursive($menus, function (&$value, $key) {

        if (!is_array($value)) {
    @endphp

            <li><a href="#"> <?= $value ?> </a></li>
            @php

        } else {
            @endphp

            <li>
                <!-- First Tier Drop Down -->
                <label for="drop-1" class="toggle"><?= $value[0] ?> +</label>
                <a href="#"><?= $value[0] ?></a>
                <input type="checkbox" id="drop-<?= $key ?>"/>
                <ul>
                @php
                
                foreach ($value as $key => $val) {
                    if($key != 0) {
                        @endphp

                        <li><a href="#">$val</a></li>
                        @php

                    }
                }
                @endphp

                </ul> 

            </li>
            @php

        }

    });

    @endphp
    --}}

    {{--


            <li><a href="#">Home</a></li>
            <li>
                <!-- First Tier Drop Down -->
                <label for="drop-1" class="toggle">WordPress +</label>
                <a href="#">WordPress</a>
                <input type="checkbox" id="drop-1"/>
                <ul>
                    <li><a href="#">Themes and stuff</a></li>
                    <li><a href="#">Plugins</a></li>
                    <li><a href="#">Tutorials</a></li>
                </ul> 

            </li>

            <li>

            <!-- First Tier Drop Down -->
            <label for="drop-2" class="toggle">Web Design +</label>
            <a href="#">Web Design</a>
            <input type="checkbox" id="drop-2"/>
            <ul>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Links</a></li>
                <li>
                    
                <!-- Second Tier Drop Down -->        
                <label for="drop-3" class="toggle">Tutorials +</label>
                <a href="#">Tutorials</a>         
                <input type="checkbox" id="drop-3"/>

                <ul>
                    <li><a href="#">HTML/CSS</a></li>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
                </li>
            </ul>
            </li>
            <li><a href="#">Graphic Design</a></li>
            <li><a href="#">Inspiration</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
        
            --}}

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </ul>
    </nav>