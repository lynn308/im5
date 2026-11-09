<?php

$data = $args['data'] ?? [];

$title = $data['title'] ?? '';
$projects = $data['projects'] ?? [];

?>

<section class="selected-projects">

    <div class="selected-projects__container">

        <!-- Hauptüberschrift -->
        <?php if ($title): ?>

            <h2 class="selected-projects__title">
                <?= esc_html($title); ?>
            </h2>

        <?php endif; ?>


        <!-- Projektkarten -->
        <?php if (!empty($projects)): ?>

            <div class="selected-projects__grid">

                <?php foreach ($projects as $index => $project): ?>

                    <?php
                    $project_name = $project['project_name'] ?? '';
                    $category = $project['category'] ?? '';

                    $image_url = $project['image_url'] ?? '';
                    $image_alt = $project['image_alt'] ?? '';

                    $project_link = $project['project_link'] ?? '';
                    ?>

                    <article class="selected-projects__card">

                        <?php if ($project_link): ?>
                        <a
                            href="<?= esc_url($project_link); ?>"
                            class="selected-projects__card-link"
                            aria-label="<?= esc_attr(
                                'Projekt ansehen: ' . $project_name
                            ); ?>"
                        >
                            <?php endif; ?>

                            <!-- Projektbild -->
                            <div class="selected-projects__visual">

                                <?php if ($image_url): ?>

                                    <img
                                        src="<?= esc_url($image_url); ?>"
                                        alt="<?= esc_attr($image_alt); ?>"
                                        class="selected-projects__image"
                                        loading="lazy"
                                    >

                                <?php else: ?>

                                    <div class="selected-projects__placeholder">

                                        Projekt <?= esc_html($index + 1); ?>

                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- Projektinformationen -->
                            <div class="selected-projects__info">

                                <?php if ($project_name): ?>

                                    <h3 class="selected-projects__name">
                                        <?= esc_html($project_name); ?>
                                    </h3>

                                <?php endif; ?>


                                <?php if ($category): ?>

                                    <span class="selected-projects__category">
                                    <?= esc_html($category); ?>
                                </span>

                                <?php endif; ?>

                            </div>

                            <?php if ($project_link): ?>
                        </a>
                    <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>