<?php

$data = $args['data'] ?? [];

$eyebrow = $data['eyebrow'] ?? '';
$title = $data['title'] ?? '';
$description = $data['description'] ?? '';

$button_text = $data['button_text'] ?? '';
$button_link = $data['button_link'] ?? '';

$image_url = $data['image_url'] ?? '';
$image_alt = $data['image_alt'] ?? '';

$ticker_text = $data['ticker_text'] ?? '';

?>

<section class="intro-about">

    <!-- Dekorative obere Kante -->
    <div class="intro-about__decoration"></div>

    <div class="intro-about__container">

        <!-- Linke Spalte -->
        <div class="intro-about__content">

            <?php if ($eyebrow): ?>
                <span class="intro-about__eyebrow">
                    <?= esc_html($eyebrow); ?>
                </span>
            <?php endif; ?>


            <?php if ($title): ?>
                <h2 class="intro-about__title">
                    <?= nl2br(esc_html($title)); ?>
                </h2>
            <?php endif; ?>


            <?php if ($description): ?>
                <p class="intro-about__description">
                    <?= nl2br(esc_html($description)); ?>
                </p>
            <?php endif; ?>


            <?php if ($button_text && $button_link): ?>
                <a
                    href="<?= esc_url($button_link); ?>"
                    class="intro-about__button"
                >
                    <?= esc_html($button_text); ?>
                </a>
            <?php endif; ?>

        </div>


        <!-- Rechte Spalte: Polaroid -->
        <div class="intro-about__visual">

            <div class="intro-about__polaroid">

                <?php if ($image_url): ?>

                    <img
                        src="<?= esc_url($image_url); ?>"
                        alt="<?= esc_attr($image_alt); ?>"
                        class="intro-about__image"
                        loading="lazy"
                    >

                <?php else: ?>

                    <div class="intro-about__placeholder">
                        Dein Foto hier
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>


    <!-- Animierter Lauftext -->
    <?php if ($ticker_text): ?>

        <div class="intro-about__ticker">

            <div class="intro-about__ticker-track">

                <div class="intro-about__ticker-group">

                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <span>
                            <?= esc_html($ticker_text); ?>
                        </span>
                    <?php endfor; ?>

                </div>

                <div
                    class="intro-about__ticker-group"
                    aria-hidden="true"
                >

                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <span>
                            <?= esc_html($ticker_text); ?>
                        </span>
                    <?php endfor; ?>

                </div>

            </div>

        </div>

    <?php endif; ?>

</section>