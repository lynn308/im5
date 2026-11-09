<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// ========================================
// KONFIGURATION DER MODULE
// ========================================

Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')

            // ========================================
            // EXAMPLE
            // ========================================
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')
                    ->set_required(),
                Field::make('image', 'image', 'Bild')
                    ->set_required(),
            ])

            // ========================================
            // HERO FRONT – STARTSEITE
            // ========================================
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make('text', 'title', 'Titel')
                    ->set_required(),
                Field::make('textarea', 'subline', 'Subline')
                    ->set_required(),
            ])

            // ========================================
            // INTRO ABOUT – STARTSEITE
            // ========================================
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
                    ->set_default_value('Kreative ✺ Selbstständige ✺ Marken ✺ Coaches ✺'),
            ])

            // ========================================
            // CONTACT CTA
            // ========================================
            ->add_fields('contact_cta', 'Kontakt CTA', [
                Field::make('text', 'eyebrow', 'Kleine Überschrift')
                    ->set_default_value('bereit?'),
                Field::make('text', 'title', 'Titel')
                    ->set_default_value('Ich freue mich auf deine Nachricht')
                    ->set_required(),
                Field::make('text', 'button_text', 'Button Text')
                    ->set_default_value('KONTAKT AUFNEHMEN'),
                Field::make('text', 'button_link', 'Button Link')
                    ->set_default_value('/kontakt/'),
                Field::make('select', 'background', 'Hintergrundfarbe')
                    ->add_options([
                        'lavender' => 'Hellviolett',
                        'cream' => 'Creme',
                    ])
                    ->set_default_value('lavender'),
            ])

            // ========================================
            // LEGAL TEXT
            // ========================================
            ->add_fields('legal_text', 'Rechtlicher Text', [
                Field::make('text', 'title', 'Titel')
                    ->set_required(),
                Field::make('rich_text', 'content', 'Text')
                    ->set_required(),
            ])

            // ========================================
            // ABOUT HERO – ÜBER MICH / PROJEKTE
            // ========================================
            ->add_fields('about_hero', 'Über mich / Projekte Hero', [
                Field::make('text', 'eyebrow', 'Kleine Überschrift')
                    ->set_default_value('wer steckt dahinter?'),
                Field::make('text', 'title_before', 'Titel Anfang')
                    ->set_default_value('Die'),
                Field::make('text', 'title_emphasis', 'Titel kursiv')
                    ->set_default_value('Designerin'),
                Field::make('text', 'title_after', 'Titel Ende')
                    ->set_default_value('hinter dem Studio'),
                Field::make('textarea', 'description', 'Beschreibung')
                    ->set_rows(3),
                Field::make('text', 'button_text', 'Button Text')
                    ->set_default_value('PROJEKTE ANSEHEN'),
                Field::make('text', 'button_link', 'Button Link')
                    ->set_default_value('/projekte/'),
            ])

            // ========================================
            // ABOUT PROFILE – ÜBER MICH
            // ========================================
            ->add_fields('about_profile', 'Über mich Profil', [
                Field::make('text', 'section_title', 'Grosse Überschrift')
                    ->set_default_value('LERNE MICH KENNEN'),
                Field::make('image', 'image', 'Portraitfoto')
                    ->set_value_type('id'),
                Field::make('text', 'eyebrow', 'Kleine Überschrift')
                    ->set_default_value('schön, dass du da bist!'),
                Field::make('text', 'title', 'Titel')
                    ->set_default_value('Deine Kernbotschaft in einem Satz'),
                Field::make('textarea', 'description', 'Beschreibung')
                    ->set_rows(5),
            ])

            // ========================================
            // ABOUT TIMELINE – ÜBER MICH
            // ========================================
            ->add_fields('about_timeline', 'Mein Weg Timeline', [
                Field::make('text', 'title', 'Titel')
                    ->set_default_value('Mein Weg'),
                Field::make('text', 'subtitle', 'Titel Zusatz')
                    ->set_default_value('(bisher)'),
                Field::make('complex', 'milestones', 'Meilensteine')
                    ->add_fields([
                        Field::make('text', 'year', 'Jahr / Zeitpunkt')
                            ->set_required(),
                        Field::make('text', 'heading', 'Meilenstein')
                            ->set_required(),
                        Field::make('textarea', 'description', 'Beschreibung')
                            ->set_rows(2),
                    ])
                    ->set_layout('tabbed-vertical'),
            ])

            // ========================================
            // SELECTED PROJECTS – STARTSEITE
            // ========================================
            ->add_fields('selected_projects', 'Ausgewählte Projekte', [
                Field::make('text', 'title', 'Überschrift')
                    ->set_default_value('Ausgewählte Projekte')
                    ->set_required(),
                Field::make('complex', 'projects', 'Projekte')
                    ->add_fields([
                        Field::make('text', 'project_name', 'Projektname')
                            ->set_required(),
                        Field::make('text', 'category', 'Kategorie')
                            ->set_required(),
                        Field::make('image', 'image', 'Projektbild')
                            ->set_value_type('id'),
                        Field::make('text', 'project_link', 'Projektlink')
                            ->set_help_text('Optional: Link zur Projektseite, z. B. /projekte/mein-projekt/'),
                    ])
                    ->set_layout('tabbed-vertical'),
            ])

            // ========================================
            // PROJECTS OVERVIEW – PROJEKTÜBERSICHT
            // Eigenständiges Modul auf derselben Ebene
            // wie selected_projects, nicht darin verschachtelt!
            // ========================================
            ->add_fields('projects_overview', 'Alle Projekte', [
                Field::make('text', 'eyebrow', 'Kleine Überschrift')
                    ->set_default_value('einmal umschauen?'),
                Field::make('text', 'title', 'Überschrift')
                    ->set_default_value('Alle Projekte')
                    ->set_required(),
                Field::make('complex', 'projects', 'Projekte')
                    ->add_fields([
                        Field::make('text', 'project_name', 'Projektname')
                            ->set_required(),
                        Field::make('textarea', 'description', 'Projektbeschreibung')
                            ->set_rows(3),
                        Field::make('text', 'categories', 'Kategorien')
                            ->set_help_text('Mehrere Kategorien mit Komma trennen, z. B. Webdesign, Branding')
                            ->set_required(),
                        Field::make('image', 'image', 'Projektbild')
                            ->set_value_type('id'),
                        Field::make('text', 'project_link', 'Projektlink')
                            ->set_help_text('Optional: Link zur Projektseite, z. B. /projekte/mein-projekt/'),
                    ])
                    ->set_layout('tabbed-vertical'),
            ])

            // ========================================
            // SETTINGS DES ÄUSSEREN MODULBAUKASTENS
            // ========================================
            ->set_layout('tabbed-vertical'),
    ]);


// ========================================
// MODULE AUF DER SEITE AUSGEBEN
// ========================================

function render_modules(): void
{
    $modules = carbon_get_the_post_meta('modules');

    if (empty($modules)) {
        return;
    }

    foreach ($modules as $module) {
        if (empty($module['_type'])) {
            continue;
        }

        switch ($module['_type']) {

            // Beispiel-Modul (bestehende Datenaufbereitung)
            case 'example':
                $module['image'] = get_media_by_id(
                    $module['image'],
                    'full'
                );
                break;

            // Bildmodul Startseite / Bildmodul Über mich
            case 'intro_about':
            case 'about_profile':
                $image_id = !empty($module['image'])
                    ? (int) $module['image']
                    : 0;

                $module['image_url'] = $image_id
                    ? (wp_get_attachment_image_url($image_id, 'large') ?: '')
                    : '';

                $module['image_alt'] = $image_id
                    ? get_post_meta($image_id, '_wp_attachment_image_alt', true)
                    : '';
                break;

            // Projektbilder für Startseite und Projektübersicht
            case 'selected_projects':
            case 'projects_overview':
                if (!empty($module['projects']) && is_array($module['projects'])) {
                    foreach ($module['projects'] as &$project) {
                        $image_id = !empty($project['image'])
                            ? (int) $project['image']
                            : 0;

                        $project['image_url'] = $image_id
                            ? (wp_get_attachment_image_url($image_id, 'large') ?: '')
                            : '';

                        $project['image_alt'] = $image_id
                            ? get_post_meta($image_id, '_wp_attachment_image_alt', true)
                            : '';
                    }
                    unset($project);
                }
                break;

            // Andere Module brauchen keine zusätzliche Aufbereitung.
        }

        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            ['data' => $module]
        );
    }
}
