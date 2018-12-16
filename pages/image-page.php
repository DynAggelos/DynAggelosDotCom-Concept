<?php

    $temp_time_1 = date('m:s:v');

    /* Page Preparations */
    // Define URL to Use
    $temp_site_url_array = explode('index.php', $_SERVER['PHP_SELF']);
    $site_url = 'http://' . DOMAIN . $temp_site_url_array[0];
    $piwigo_url = 'piwigo/ws.php';

    // Define Commands to Use
    $list_albums_command = '?format=json&method=pwg.categories.getList';
    $album_images_info_command = '?format=json&method=pwg.categories.getImages&cat_id=';
    $image_info_command = '?format=json&method=pwg.images.getInfo&image_id=';

    // Get the ID's and Image Count of Each Album
    $album_list_array = json_decode(file_get_contents($site_url . $piwigo_url . $list_albums_command), true);

    foreach ($album_list_array['result']['categories'] as $key => $category)
    {
        if (stripos($category['name'], 'web') !== false)
        {
            $web_album_id = $category['id'];
            $web_album_image_count = $category['nb_images'];
            $web_album_description = $category['comment'];
        }
        elseif (stripos($category['name'], 'Programming') !== false)
        {
            $programming_album_id = $category['id'];
            $programming_album_image_count = $category['nb_images'];
            $programming_album_description = $category['comment'];
        }
        elseif (stripos($category['name'], 'ProgramWithMinecraft.com') !== false)
        {
            $minecraft_album_id = $category['id'];
            $minecraft_album_image_count = $category['nb_images'];
            $minecraft_album_description = $category['comment'];
        }
        elseif (stripos($category['name'], 'BiblicalWiki.com') !== false)
        {
            $bible_album_id = $category['id'];
            $bible_album_image_count = $category['nb_images'];
            $bible_album_description = $category['comment'];
        }
    }

    // Get Random Programming Album Image URL to Use
    $random_number = rand(1, $programming_album_image_count) - 1;
    $programming_thumbnail_command =
        $album_images_info_command . $programming_album_id;
    $programming_thumbnail_JSON = file_get_contents(
        $site_url . $piwigo_url . $programming_thumbnail_command);
    $programming_thumbnail_array =
        json_decode($programming_thumbnail_JSON, true);
    $programming_thumbnail_url =
        $programming_thumbnail_array['result']['images']["$random_number"]
            ['derivatives']['small']['url'];
    $programming_thumbnail_alt =
        $programming_thumbnail_array['result']['images']["$random_number"]
            ['comment'];

    // Get Random Web Development Album Image URL to Use
    $random_number = rand(1, $web_album_image_count) - 1;
    $web_thumbnail_command = $album_images_info_command . $web_album_id;
    $web_thumbnail_JSON = file_get_contents(
        $site_url . $piwigo_url . $web_thumbnail_command);
    $web_thumbnail_array =
        json_decode($web_thumbnail_JSON, true);
    $web_thumbnail_url =
        $web_thumbnail_array['result']['images']["$random_number"]
            ['derivatives']['small']['url'];
    $web_thumbnail_alt =
        $web_thumbnail_array['result']['images']["$random_number"]
            ['comment'];

    // Get Random ProgramWithMinecraft.com Album Image URL to Use
    $random_number = rand(1, $minecraft_album_image_count) - 1;
    $minecraft_thumbnail_command =
        $album_images_info_command . $minecraft_album_id;
    $minecraft_thumbnail_JSON = file_get_contents(
        $site_url . $piwigo_url . $minecraft_thumbnail_command);
    $minecraft_thumbnail_array =
        json_decode($minecraft_thumbnail_JSON, true);
    $minecraft_thumbnail_url =
        $minecraft_thumbnail_array['result']['images']["$random_number"]
            ['derivatives']['small']['url'];
    $minecraft_thumbnail_alt =
        $minecraft_thumbnail_array['result']['images']["$random_number"]
            ['comment'];

    // Get Random BiblicalWiki.com Album Image URL to Use
    $random_number = rand(1, $bible_album_image_count) - 1;
    $bible_thumbnail_command = $album_images_info_command . $bible_album_id;
    $bible_thumbnail_JSON = file_get_contents(
        $site_url . $piwigo_url . $bible_thumbnail_command);
    $bible_thumbnail_array =
        json_decode($bible_thumbnail_JSON, true);
    $bible_thumbnail_url =
        $bible_thumbnail_array['result']['images']["$random_number"]
            ['derivatives']['small']['url'];
    $bible_thumbnail_alt =
        $bible_thumbnail_array['result']['images']["$random_number"]
            ['comment'];

?>

<h3>Images</h3>
<div class="row mb-3" id="blocks">
    <div class="col-6 pt-1 text-light image-category-block">
        <h4 class="text-center">Programming Album</h4>
        <div class="row mb-auto">
            <a href="http://localhost/workspace/piwigo/index.php?/category/4"><img class="figure-image mr-auto ml-auto border-solid" style="background-color: #eee;" src="<?= $programming_thumbnail_url; ?>" alt="<?= $programming_thumbnail_alt ?>"></a>
        </div>
    </div>
    <div class="col-6 pt-1 text-light image-category-block-right">
        <h4 class="text-center">Web Development Album</h4>
        <div class="row mb-auto">
            <a href="http://localhost/workspace/piwigo/index.php?/category/5"><img class="figure-image mr-auto ml-auto border-solid" style="background-color: #eee;" src="<?= $web_thumbnail_url; ?>" alt="<?= $web_thumbnail_alt ?>"></a>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <p><?= $programming_album_description ?></p>
    </div>
    <div class="col-6">
        <p><?= $web_album_description ?></p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6 pt-1 text-light image-category-block">
        <h4 class="text-center">ProgramWithMinecraft.com Album</h4>
        <div class="row mb-auto">
            <a href="http://localhost/workspace/piwigo/index.php?/category/2"><img class="figure-image mr-auto ml-auto border-solid" style="background-color: #eee;" src="<?= $minecraft_thumbnail_url; ?>" alt="<?= $minecraft_thumbnail_alt ?>"></a>
        </div>
    </div>
    <div class="col-6 pt-1 text-light image-category-block-right">
        <h4 class="text-center">BiblicalWiki.com Album</h4>
        <div class="row mb-auto">
            <a href="http://localhost/workspace/piwigo/index.php?/category/1"><img class="figure-image mr-auto ml-auto border-solid" style="background-color: #eee;" src="<?= $bible_thumbnail_url; ?>" alt="<?= $bible_thumbnail_alt ?>"></a>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <p><?= $minecraft_album_description ?></p>
    </div>
    <div class="col-6">
        <p><?= $bible_album_description ?></p>
    </div>
</div>
