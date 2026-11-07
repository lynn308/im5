
<?php
// Daten aus dem Backend übernehmen
$module = $args['data'];

// Inhalte aus Carbon Fields laden
$title = $module['title'];
$subline = $module['subline'];
?>

<section data-module="hero_front">

    <div class="hero-content">

        <!-- Begrüssung -->
        <p class="hero-eyebrow">
            hallo, ich bin Lynn!
        </p>

        <!-- Haupttitel -->

        <h1 class="hero-title">
            <?= esc_html($title) ?>
        </h1>


        <!-- Beschreibung -->
        <p class="hero-subline">
            <?= nl2br(esc_html($subline)) ?>
        </p>

        <!-- Buttons -->
        <div class="hero-buttons">

            <a
                href="<?= esc_url(home_url('/projekte/')) ?>"
                class="hero-button"
            >
                PROJEKTE ANSEHEN
            </a>

            <a
                href="<?= esc_url(home_url('/kontakt/')) ?>"
                class="hero-button"
            >
                Kontakt aufnehmen
            </a>

        </div>

    </div>

</section>
