
<?php

$data = $args['data'] ?? [];

$eyebrow = $data['eyebrow'] ?? '';
$title = $data['title'] ?? '';
$email = sanitize_email($data['email'] ?? '');

?>

<section class="contact-page">

    <div class="contact-page__container">

        <!-- Kleine blaue Überschrift -->
        <?php if ($eyebrow): ?>

            <p class="contact-page__eyebrow">
                <?= esc_html($eyebrow); ?>
            </p>

        <?php endif; ?>


        <!-- Haupttitel -->
        <?php if ($title): ?>

            <h1 class="contact-page__title">
                <?= esc_html($title); ?>
            </h1>

        <?php endif; ?>


        <!-- E-Mail-Adresse -->
        <?php if ($email && is_email($email)): ?>

            <p class="contact-page__email">

                E-Mail:

                <a href="<?= esc_url('mailto:' . $email); ?>">
                    <?= esc_html($email); ?>
                </a>

            </p>

        <?php endif; ?>

    </div>

</section>
