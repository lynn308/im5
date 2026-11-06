
<?php
function get_project_by_id(int $id): array {

    // → collect data
    $title = get_the_title($id);

    $image_id = carbon_get_post_meta($id, 'image');
    $image = get_media_by_id($image_id);

    $lead = carbon_get_post_meta($id, 'lead');
    $description = carbon_get_post_meta($id, 'description');
    $text = carbon_get_post_meta($id, 'text');

    $client = carbon_get_post_meta($id, 'client');
    $year = carbon_get_post_meta($id, 'year');

    $services = carbon_get_post_meta($id, 'year');


    $duration = carbon_get_post_meta($id, 'duration');

    $challenge = carbon_get_post_meta($id, 'challenge');
    $solution = carbon_get_post_meta($id, 'solution');

    $gallery = carbon_get_post_meta($id, 'gallery');

    $categories = wp_get_post_terms(
        $id,
        'projekt_kategorie',
        ['fields' => 'names']
    );


    $services = carbon_get_post_meta($id, 'services'

    );



    // → return data
    return [
        'title' => $title,
        'image' => $image,
        'lead' => $lead,
        'description' => $description,
        'text' => $text,
        'client' => $client,
        'year' => $year,
        'duration' => $duration,
        'challenge' => $challenge,
        'solution' => $solution,
        'gallery' => $gallery,
        'categories' => is_wp_error($categories) ? [] : $categories,
        'services' => $services,
    ];
}
