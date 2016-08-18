<?php

//
if ($_GET['id']) {
    global $wpdb;
    $data = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_postdata` WHERE `form_id`=' . esc_sql($_GET['id']) . ' ORDER BY `post_id` DESC', ARRAY_A);
} else {
    echo '<h1>No Posts</h1>';
    exit;
}

if (!is_array($data)) {
    echo '<h1>No Posts</h1>';
    exit;
}

?>

<div class="bs_container">

    <div class="col-12">
        <h1 class="bs_title">Posts</h1>
    </div>

    <div class="clear"></div>

    <div class="col-9">
    <?php
    foreach($data as $key => $d) {


        if ($d['post_data']) {

            $posts = explode(':', $d['post_data']);

            echo '<div class="panel"><h2 class="panel-title">Post Date: '.$d['post_added'].'</h2><div class="inner">';

            echo '<table class="form-table"><tbody>';



            foreach ($posts as $p) {

                echo '<tr>';

                $post = explode(',',$p);

                echo '<th>'.strtoupper($post[0]).': </th>';
                echo '<td>'.$post[1].'</td>';

                echo '</tr>';
            }

            echo '</tbody></table>';

            echo '</div></div>';


        }
    }

    ?>


    </div>

</div>
