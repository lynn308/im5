<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])
            // -> hero_front
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'subline', 'Subline')->set_required(),
            ])

            // -> intro_about
            ->add_fields('intro_about', 'Über mich Intro', [

                Field::make('text', 'eyebrow', 'Kleine Überschrift')
                    ->set_default_value('endlich...'),

                Field::make('textarea', 'title', 'Titel')
                    ->set_rows(2)
                    ->set_required(),

                Field::make('textarea', 'description', 'Beschreibung')
                    ->set_rows(3)
                    ->set_required(),

                Field::make('text', 'button_text', 'Button Text')
                    ->set_default_value('LERNE MICH KENNEN'),

                Field::make('text', 'button_link', 'Button Link')
                    ->set_default_value('#about'),

                Field::make('image', 'image', 'Polaroid Bild')
                    ->set_value_type('id'),

                Field::make('text', 'ticker_text', 'Lauftext')
                    ->set_default_value(
                        'Kreative ✺ Selbstständige ✺ Marken ✺ Coaches ✺'
                    ),

            ])

            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules(): void {

    $modules = carbon_get_the_post_meta('modules');

    if (empty($modules)) {
        return;
    }

    foreach ($modules as $module) {

        // -> Modifiziere die Daten je nach Modultyp
        switch ($module['_type']) {

            // -> example
            case 'example':
                $module['image'] = get_media_by_id(
                    $module['image'],
                    'full'
                );
                break;


            // -> intro_about (NEU)
            case 'intro_about':

                $image_id = !empty($module['image'])
                    ? (int) $module['image']
                    : 0;

                $module['image_url'] = $image_id
                    ? wp_get_attachment_image_url($image_id, 'large')
                    : '';

                $module['image_alt'] = $image_id
                    ? get_post_meta(
                        $image_id,
                        '_wp_attachment_image_alt',
                        true
                    )
                    : '';

                break;

            // -> Weitere Module später hier ergänzen

        }


        // -> Template laden und Daten übergeben
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );

    }
}
