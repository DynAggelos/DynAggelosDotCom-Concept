<?php

    $copyright_start_date = '2018';
    $copyright_end_date = date('Y');
    $copyright_date = '';

    // Display Date Range if Start Date is Not Equal to End Date
    if (strcmp($copyright_start_date, $copyright_end_date) === 0)
    {
        $copyright_date = $copyright_start_date;
    }
    else
    {
        $copyright_date =
            $copyright_start_date . '-' . $copyright_end_date;
    }

?>

<div class="container">
    <p class="text-center">Copyright <?= $copyright_date ?>, Joshua Gerrity</p>
</div>
