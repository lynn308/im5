<?php

$data = $args['data'] ?? [];

$eyebrow = $data['eyebrow'] ?? '';
$title = $data['title'] ?? '';

$button_text = $data['button_text'] ?? '';
$button_link = $data['button_link'] ?? '';

?>

<?php
$background = $data['background'] ?? 'lavender';

$background_class = $background === 'cream'
        ? 'contact-cta--cream'
        : 'contact-cta--lavender';
?>

<section class="contact-cta <?= esc_attr($background_class); ?>">

    <div class="contact-cta__container">

        <!-- Kleine Überschrift -->
        <?php if ($eyebrow): ?>

            <span class="contact-cta__eyebrow">
                <?= esc_html($eyebrow); ?>
            </span>

        <?php endif; ?>


        <!-- Haupttitel -->
        <?php if ($title): ?>

            <h2 class="contact-cta__title">
                <?= esc_html($title); ?>
            </h2>

        <?php endif; ?>


        <!-- Button -->
        <?php if ($button_text && $button_link): ?>

            <a
                href="<?= esc_url($button_link); ?>"
                class="contact-cta__button"
            >
                <?= esc_html($button_text); ?>
            </a>

        <?php endif; ?>

    </div>

</section>