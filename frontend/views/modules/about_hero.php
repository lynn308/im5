<?php

$data = $args['data'] ?? [];

$eyebrow = $data['eyebrow'] ?? '';
$title_before = $data['title_before'] ?? '';
$title_emphasis = $data['title_emphasis'] ?? '';
$title_after = $data['title_after'] ?? '';

$button_text = $data['button_text'] ?? '';
$button_link = $data['button_link'] ?? '';

?>

<section class="about-hero">

    <div class="about-hero__container">

        <?php if ($eyebrow): ?>
            <p class="about-hero__eyebrow">
                <?= esc_html($eyebrow); ?>
            </p>
        <?php endif; ?>

        <h1 class="about-hero__title">

            <?= esc_html($title_before); ?>

            <?php if ($title_emphasis): ?>
                <em>
                    <?= esc_html($title_emphasis); ?>
                </em>
            <?php endif; ?>

            <?= esc_html($title_after); ?>

        </h1>

        <?php if ($button_text && $button_link): ?>

            <a
                href="<?= esc_url($button_link); ?>"
                class="about-hero__button"
            >
                <?= esc_html($button_text); ?>
            </a>

        <?php endif; ?>

    </div>

</section>