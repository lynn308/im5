<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field ::make("image", "image", "Bild")->set_required (),
        // Beschreibung
        Field::make('textarea', 'description', 'Beschreibung')
            ->set_required(true),

        // Lead
        Field::make('textarea', 'lead', 'Lead')
            ->set_required(true),

        // Text
        Field::make('rich_text', 'text', 'Text')
            ->set_required(true),

        // Kunde
        Field::make('text', 'client', 'Kunde')
            ->set_required(true),


        Field::make('text', 'services', 'Leistungen')
            ->set_required(true),


        // Jahr
        Field::make('text', 'year', 'Jahr')
            ->set_required(true),

        // Dauer
        Field::make('text', 'duration', 'Dauer')
            ->set_required(true),

        // Aufgabe
        Field::make('rich_text', 'challenge', 'Aufgabe')
            ->set_required(true),

        // Lösung
        Field::make('rich_text', 'solution', 'Lösung')
            ->set_required(true),

        // Detailbilder
        Field::make('complex', 'gallery', 'Detailbilder')
            ->add_fields([
                Field::make('image', 'image', 'Bild')
                    ->set_value_type('id')
                    ->set_required(true),
            ]),

        // Auf Startseite anzeigen
        Field::make('checkbox', 'featured', 'Auf Startseite anzeigen'),

        // Sortierung
        Field::make('text', 'sort_order', 'Sortierung'),
    ]);