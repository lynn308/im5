<?php

$data = $args['data'] ?? [];

$section_title = $data['section_title'] ?? '';

$image_url = $data['image_url'] ?? '';
$image_alt = $data['image_alt'] ?? '';

$eyebrow = $data['eyebrow'] ?? '';
$title = $data['title'] ?? '';
$description = $data['description'] ?? '';

?>

<section class="about-profile">

    <div class="about-profile__container">

        <?php if ($section_title): ?>

            <h2 class="about-profile__heading">
                <?= esc_html($section_title); ?>
            </h2>

        <?php endif; ?>


        <div class="about-profile__grid">

            <!-- Linke Spalte: Bild -->
            <div class="about-profile__visual">

                <?php if ($image_url): ?>

                    <img
                        src="<?= esc_url($image_url); ?>"
                        alt="<?= esc_attr($image_alt); ?>"
                        class="about-profile__image"
                        loading="lazy"
                    >

                <?php else: ?>

                    <div class="about-profile__placeholder">
                        Dein Foto hier
                    </div>

                <?php endif; ?>

            </div>


            <!-- Rechte Spalte: Text -->
            <div class="about-profile__content">

                <?php if ($eyebrow): ?>

                    <p class="about-profile__eyebrow">
                        <?= esc_html($eyebrow); ?>
                    </p>

                <?php endif; ?>


                <?php if ($title): ?>

                    <h3 class="about-profile__title">
                        <?= esc_html($title); ?>
                    </h3>

                <?php endif; ?>


                <?php if ($description): ?>

                    <p class="about-profile__description">
                        <?= nl2br(esc_html($description)); ?>
                    </p>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>