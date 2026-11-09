<?php

$data = $args['data'] ?? [];

$title = $data['title'] ?? '';
$content = $data['content'] ?? '';

?>

<section class="legal-text">

    <div class="legal-text__container">

        <!-- Titel -->
        <?php if ($title): ?>

            <h1 class="legal-text__title">
                <?= esc_html($title); ?>
            </h1>

        <?php endif; ?>


        <!-- Textinhalt -->
        <?php if ($content): ?>

            <div class="legal-text__content">
                <?= wp_kses_post($content); ?>
            </div>

        <?php endif; ?>

    </div>

</section>