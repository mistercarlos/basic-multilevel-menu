<?php

if (!function_exists('traverse_recur')) {
    function traverse_recur($array, &$empty = '')
    {
        //
        foreach($array as $key=> $value)
        {

            if ($key === 'children') {
                dd($array);
                $rand_id = uniqid(rand(), true);
                $empty.= '
                        <li>
                            <label for="drop-'.$rand_id.'" class="toggle">'. $array['name'] .' +</label>
                            <a href="#">'. $array['name'] .'</a>
                            <input type="checkbox" id="drop-'.$rand_id.'"/>
                            <ul>
                        ';
                foreach ($value as $key3 => $va) {
                    $empty.= '<li><a href="#">'. $va['name'] . '</a></li>';
                }
                $empty.= '</ul> </li>';
                traverse_recur($value, $empty);
            }

            if ($key === 'name' && !array_key_exists('children', $array) ) {
                // dd($key);

                // dd($value);
                $empty.= '<li><a href="#">'. $value . '</a></li>';
            }

            // if (array_key_exists('children', $value)) {
            //     // if (is_array($value)) {
            //     // }
            //     if ($key == 'name') {
            //         $rand_id = uniqid(rand(), true);
            //         $empty.= '
            //                 <li>
            //                     <label for="drop-'.$rand_id.'" class="toggle">'. $value.' +</label>
            //                     <a href="#">'. $value.'</a>
            //                     <input type="checkbox" id="drop-'.$rand_id.'"/>
            //                     <ul>
            //                 ';
            //     }
            //     if ($key == 'children') {
            //             foreach ($value as $key3 => $va) {
            //                 $empty.= '<li><a href="#">'. $va['name'] . '</a></li>';
            //             }
            //             $empty.= '</ul> </li>';
            //         traverse_recur($value, $empty);
            //     }
            // } else {
            //     if ($key == 'name') {
            //         // dd($key);

            //         // dd($value);
            //         $empty.= '<li><a href="#">'. $value['name'] . '</a></li>';
            //     }
            // }

            // if(is_array($value))
            // {
                
            //     traverse_recur($value, $empty);
            // }

            
        }
        return $empty;
    }
}
