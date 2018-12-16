<?php

    class SQLEncodeDecode {
        // Encode Array Ordered by Plaintext
        private $encode_array = [
            ['A', 'Rn'],
            ['B', 'eW'],
            ['C', '5t'],
            ['D', 'I0'],
            ['E', 'gL'],
            ['F', 'Vk'],
            ['G', 'UY'],
            ['H', 'd-'],
            ['I', 'cx'],
            ['J', 'yN'],
            ['K', 'Fh'],
            ['L', 'EJ'],
            ['M', 'A3'],
            ['N', 'jO'],
            ['O', 'Dp'],
            ['P', 'oq'],
            ['Q', 'Kf'],
            ['R', 'Z4'],
            ['S', 'mw'],
            ['T', '8u'],
            ['U', 'BH'],
            ['V', '2l'],
            ['W', 'za'],
            ['X', 'Gr'],
            ['Y', 'Sv'],
            ['Z', 'M1'],

            ['a', '5a'],
            ['b', 'Ag'],
            ['c', 'Rt'],
            ['d', 'U0'],
            ['e', 'LW'],
            ['f', 'V-'],
            ['g', 'IY'],
            ['h', 'dk'],
            ['i', 'Dx'],
            ['j', 'NK'],
            ['k', 'pM'],
            ['l', 'Jc'],
            ['m', 'e3'],
            ['n', 'jw'],
            ['o', 'Eq'],
            ['p', 'Fo'],
            ['q', 'Zf'],
            ['r', 'y4'],
            ['s', 'mO'],
            ['t', 'B8'],
            ['u', '2H'],
            ['v', 'Sl'],
            ['w', 'zr'],
            ['x', 'Gn'],
            ['y', 'uv'],
            ['z', '1h'],

            ['1', 'bQ'],
            ['2', 'Cs'],
            ['3', '9P'],
            ['4', 'T_'],
            ['5', '76'],
            ['6', '6p'],
            ['7', 'Xi'],
            ['8', 'RC'],
            ['9', 'Kh'],
            ['0', 'Gl'],

            ['`', 'b_'],
            ['~', 'R9'],
            ['!', 'Xj'],
            ['@', 'VY'],
            ['#', 'Uf'],
            ['$', 'dj'],
            ['%', 'VO'],
            ['^', 'mx'],
            ['&', 'hv'],
            ['*', '6Z'],
            ['(', 'MR'],
            [')', 'Zp'],
            ['-', 'H1'],
            ['_', 'Cl'],
            ['=', 'Gj'],
            ['+', 'K-'],
            ['[', 'A6'],
            ['{', 'Ij'],
            [']', 'FZ'],
            ['}', 'pA'],
            ['\\', 'BG'],
            ['|', 'E7'],
            [';', '-c'],
            [':', '0Q'],
            ['\'', '3Z'],
            ['\"', 'Y4'],
            [',', 'pW'],
            ['<', 'dT'],
            ['.', '4c'],
            ['>', 'ys'],
            ['/', 'KA'],
            ['?', 'nA'],
            [' ', '1d'],
            ['\t', 'R3'],
            ['\n', '4x'],
        ];

        // Decode Array Ordered by Encoded Text
        private $decode_array = [
            ['Rn', 'A'],
            ['eW', 'B'],
            ['5t', 'C'],
            ['I0', 'D'],
            ['gL', 'E'],
            ['Vk', 'F'],
            ['UY', 'G'],
            ['d-', 'H'],
            ['cx', 'I'],
            ['yN', 'J'],
            ['Fh', 'K'],
            ['EJ', 'L'],
            ['A3', 'M'],
            ['jO', 'N'],
            ['Dp', 'O'],
            ['oq', 'P'],
            ['Kf', 'Q'],
            ['Z4', 'R'],
            ['mw', 'S'],
            ['8u', 'T'],
            ['BH', 'U'],
            ['2l', 'V'],
            ['za', 'W'],
            ['Gr', 'X'],
            ['Sv', 'Y'],
            ['M1', 'Z'],

            ['5a', 'a'],
            ['Ag', 'b'],
            ['Rt', 'c'],
            ['U0', 'd'],
            ['LW', 'e'],
            ['V-', 'f'],
            ['IY', 'g'],
            ['dk', 'h'],
            ['Dx', 'i'],
            ['NK', 'j'],
            ['pM', 'k'],
            ['Jc', 'l'],
            ['e3', 'm'],
            ['jw', 'n'],
            ['Eq', 'o'],
            ['Fo', 'p'],
            ['Zf', 'q'],
            ['y4', 'r'],
            ['mO', 's'],
            ['B8', 't'],
            ['2H', 'u'],
            ['Sl', 'v'],
            ['zr', 'w'],
            ['Gn', 'x'],
            ['uv', 'y'],
            ['1h', 'z'],

            ['bQ', '1'],
            ['Cs', '2'],
            ['9P', '3'],
            ['T_', '4'],
            ['76', '5'],
            ['6p', '6'],
            ['Xi', '7'],
            ['RC', '8'],
            ['Kh', '9'],
            ['Gl', '0'],

            ['b_', '`'],
            ['R9', '~'],
            ['Xj', '!'],
            ['VY', '@'],
            ['Uf', '#'],
            ['dj', '$'],
            ['VO', '%'],
            ['mx', '^'],
            ['hv', '&'],
            ['6Z', '*'],
            ['MR', '('],
            ['Zp', ')'],
            ['H1', '-'],
            ['Cl', '_'],
            ['Gj', '='],
            ['K-', '+'],
            ['A6', '['],
            ['Ij', '{'],
            ['FZ', ']'],
            ['pA', '}'],
            ['BG', '\\'],
            ['E7', '|'],
            ['-c', ';'],
            ['0Q', ':'],
            ['3Z', '\''],
            ['Y4', '\"'],
            ['pW', ','],
            ['dT', '<'],
            ['4c', '.'],
            ['ys', '>'],
            ['KA', '/'],
            ['nA', '?'],
            ['1d', ' '],
            ['R3', '\t'],
            ['4x', '\n'],
        ];

        function encode($input)
        {
            javascript_alert("sql_translator->encode: " . $input);
            $input_length = strlen($input);
            $lowest_index_searched = 0;
            $highest_index_searched = $input_length;
            $middle_index_remainder = $highest_index_searched % 2;
            $middle_index =
                ($highest_index_searched - $middle_index_remainder) / 2;
            $highest_lowest_difference = 0;
            $output = '';

            javascript_alert("sql_translator->encode[\$input_length]: " . $input_length);
            javascript_alert("sql_translator->encode[\$middle_index]: " . $middle_index);

            // Traverse Through $input
            for ($i = 0; $i < $input_length; $i++)
            {
                // Find Character Match for &input[$i] Using Binary Search
                while ($lowest_index_searched <= $highest_index_searched)
                {
                    javascript_alert("sql_translator->encode[\$encode_array[\$middle_index][0]]: " . $encode_array[$middle_index][0]);
                    // Move Bounderies of Binary Search Up or Down
                    if ($input[$i] < $encode_array[$middle_index][0])
                    {
                        $lowest_index_searched = $middle_index + 1;
                    }
                    elseif ($input[$i] > $encode_array[$middle_index][0])
                    {
                        $highest_index_searched = $middle_index - 1;
                    }

                    // If Boundaries Touch, Test if Match
                    elseif ($input[$i] === $encode_array[$middle_index][0])
                    {
                        $output .=
                            $encode_array[$middle_index][1];
                        break;
                    }

                    // If Not Match, Output Error and Stop Searching
                    else
                    {
                        $output .=
                            'Error! Match not found for ' . $input[$i] . '!';
                        break;
                        break;
                    }


                    // Calculate New Midpoint to Test Based on New Boundaries
                    $highest_lowest_difference =
                        $highest_index_searched - $lowest_index_searched;
                    $middle_index_remainder = (
                        $highest_lowest_difference % 2 == 0 ?
                            $highest_lowest_difference
                            : $highest_lowest_difference - 1);
                    $middle_index =
                        $highest_index_searched - (
                            $middle_index_remainder / 2);

                }
            }

            return $output;
        }

        function decode($input)
        {
            $input_length = strlen($input);
            $lowest_index_searched = 0;
            $highest_index_searched = $input_length;
            $middle_index_remainder = $highest_index_searched % 2;
            $middle_index =
                ($highest_index_searched - $middle_index_remainder) / 2;
            $highest_lowest_difference = 0;
            $temp_string = '';
            $output = '';

            if (($input_length / 2) != 0)
                return 'Error! Input string corrupted, invalid length.';

            // Traverse Through $input
            for ($i = 0; $i < $input_length; $i += 2)
            {
                $temp_string = $input[$i] . $input[$i + 1];

                // Find Character Match for $temp_string Using Binary Search
                while ($lowest_index_searched <= $highest_index_searched)
                {
                    // Move Bounderies of Binary Search Up or Down
                    if ($temp_string < $decode_array[$middle_index][0])
                    {
                        $lowest_index_searched = $middle_index + 1;
                    }
                    elseif ($temp_string > $decode_array[$middle_index][0])
                    {
                        $highest_index_searched = $middle_index - 1;
                    }

                    // If Boundaries Touch, Test if Match
                    elseif ($temp_string === $decode_array[$middle_index][0])
                    {
                        $output .=
                            $decode_array[$middle_index][1];
                        break;
                    }

                    // If Not Match, Output Error and Stop Searching
                    else
                    {
                        $output .=
                            'Error! Match not found for ' . $temp_string . '.';
                        break;
                        break;
                    }
                    

                    // Calculate New Midpoint to Test Based on New Boundaries
                    $highest_lowest_difference =
                        $highest_index_searched - $lowest_index_searched;
                    $middle_index_remainder = (
                        $highest_lowest_difference % 2 == 0 ?
                            $highest_lowest_difference
                            : $highest_lowest_difference - 1);
                    $middle_index =
                        $highest_index_searched - (
                            $middle_index_remainder / 2);

                }
            }

            return $output;
        }

        function validate_internal_arrays()
        {
            $diff_count = 0;
            $differences = array();

            foreach ($encode_array as $key => $value)
            {
                if (
                    $encode_array[$key][0] !== $decode_array[$key][1]
                    || $encode_array[$key][1] !== $decode_array[$key][0])
                {
                    $diff_count++;
                    $differences[] = $key;
                }
            }

            if ($diff_count < 1)
            {
                return "The arrays match.";
            }
            else
            {
                return
                    "The arrays don't match at these indexes: "
                    . implode(', ', $differences);
            }
        }
    }

?>
