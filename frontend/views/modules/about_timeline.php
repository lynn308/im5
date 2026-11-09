<?php

$data = $args['data'] ?? [];

$title = $data['title'] ?? '';
$subtitle = $data['subtitle'] ?? '';

$milestones = $data['milestones'] ?? [];

?>

<section class="about-timeline">

    <div class="about-timeline__container">

        <!-- Überschrift -->
        <h2 class="about-timeline__heading">

            <?= esc_html($title); ?>

            <?php if ($subtitle): ?>
                <span>
                    <?= esc_html($subtitle); ?>
                </span>
            <?php endif; ?>

        </h2>


        <!-- Timeline -->
        <?php if (!empty($milestones)): ?>

            <ol class="about-timeline__list">

                <?php foreach ($milestones as $milestone): ?>

                    <li class="about-timeline__item">

                        <span
                            class="about-timeline__dot"
                            aria-hidden="true"
                        ></span>

                        <?php if (!empty($milestone['year'])): ?>

                            <span class="about-timeline__year">
                                <?= esc_html($milestone['year']); ?>
                            </span>

                        <?php endif; ?>


                        <?php if (!empty($milestone['heading'])): ?>

                            <h3 class="about-timeline__title">
                                <?= esc_html($milestone['heading']); ?>
                            </h3>

                        <?php endif; ?>


                        <?php if (!empty($milestone['description'])): ?>

                            <p class="about-timeline__description">
                                <?= nl2br(
                                    esc_html($milestone['description'])
                                ); ?>
                            </p>

                        <?php endif; ?>

                    </li>

                <?php endforeach; ?>

            </ol>

        <?php endif; ?>

    </div>

</section>