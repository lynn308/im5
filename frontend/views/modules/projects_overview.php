
<?php

$data = $args['data'] ?? [];

$eyebrow = $data['eyebrow'] ?? '';
$title = $data['title'] ?? '';
$projects = $data['projects'] ?? [];

// Projekte und Kategorien vorbereiten
$prepared_projects = [];
$filter_categories = [];

foreach ($projects as $index => $project) {

    $category_text = $project['categories'] ?? '';

    // Kategorien durch Komma trennen
    $categories = preg_split('/[,;]+/u', $category_text);

    $categories = array_values(
        array_unique(
            array_filter(
                array_map('trim', $categories)
            )
        )
    );

    // Filter-Schlüssel vorbereiten
    $category_slugs = [];

    foreach ($categories as $category) {

        $slug = sanitize_title($category);

        if ($slug === '') {
            continue;
        }

        $category_slugs[] = $slug;

        if (!isset($filter_categories[$slug])) {
            $filter_categories[$slug] = $category;
        }
    }

    $project['category_labels'] = $categories;
    $project['category_slugs'] = array_unique($category_slugs);

    $project['number'] = $index + 1;

    $prepared_projects[] = $project;
}

$project_count = count($prepared_projects);

// Eindeutige ID für dieses Modul
$module_id = wp_unique_id('projects-overview-');

?>

<section
    class="projects-overview"
    id="<?= esc_attr($module_id); ?>"
>

    <div class="projects-overview__container">

        <!-- ==================================
             HEADER
        ================================== -->

        <div class="projects-overview__header">

            <div class="projects-overview__heading-group">

                <?php if ($eyebrow): ?>
                    <p class="projects-overview__eyebrow">
                        <?= esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="projects-overview__title">
                        <?= esc_html($title); ?>
                    </h2>
                <?php endif; ?>

            </div>

            <!-- Projektanzahl -->
            <p
                class="projects-overview__count"
                aria-live="polite"
            >
                <span data-project-count>
                    <?= esc_html($project_count); ?>
                </span>
                <span data-project-count-label>
                    <?= $project_count === 1 ? 'Projekt' : 'Projekte'; ?>
                </span>
                ·
                <span data-category-label>
                    alle Kategorien
                </span>
            </p>

        </div>


        <!-- ==================================
             FILTER
        ================================== -->

        <div
            class="projects-overview__filters"
            role="group"
            aria-label="Projekte nach Kategorie filtern"
        >

            <button
                type="button"
                class="projects-overview__filter is-active"
                data-filter="all"
                aria-pressed="true"
            >
                Alle
            </button>

            <?php foreach ($filter_categories as $slug => $label): ?>

                <button
                    type="button"
                    class="projects-overview__filter"
                    data-filter="<?= esc_attr($slug); ?>"
                    aria-pressed="false"
                >
                    <?= esc_html($label); ?>
                </button>

            <?php endforeach; ?>

        </div>


        <!-- ==================================
             PROJEKT GRID
        ================================== -->

        <div class="projects-overview__grid">

            <?php foreach ($prepared_projects as $project): ?>

                <?php

                $project_name = $project['project_name'] ?? '';
                $description = $project['description'] ?? '';

                $image_url = $project['image_url'] ?? '';
                $image_alt = $project['image_alt'] ?? '';

                $project_link = $project['project_link'] ?? '';

                $categories = $project['category_labels'];
                $category_slugs = $project['category_slugs'];

                ?>

                <article
                    class="projects-overview__card"
                    data-project-card
                    data-categories="<?= esc_attr(
                        implode(' ', $category_slugs)
                    ); ?>"
                >

                    <!-- Bild -->
                    <div class="projects-overview__visual">

                        <?php if ($image_url): ?>

                            <img
                                src="<?= esc_url($image_url); ?>"
                                alt="<?= esc_attr(
                                    $image_alt ?: $project_name
                                ); ?>"
                                class="projects-overview__image"
                                loading="lazy"
                            >

                        <?php else: ?>

                            <div class="projects-overview__placeholder">
                                Projekt <?= esc_html($project['number']); ?>
                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- Text -->
                    <div class="projects-overview__info">

                        <?php if ($project_name): ?>

                            <h3 class="projects-overview__name">
                                <?= esc_html($project_name); ?>
                            </h3>

                        <?php endif; ?>


                        <?php if ($description): ?>

                            <p class="projects-overview__description">
                                <?= nl2br(esc_html($description)); ?>
                            </p>

                        <?php endif; ?>


                        <!-- Kategorien -->
                        <div class="projects-overview__categories">

                            <?php foreach ($categories as $category): ?>

                                <span class="projects-overview__category">
                                    <?= esc_html($category); ?>
                                </span>

                            <?php endforeach; ?>

                        </div>


                        <!-- Projektlink -->
                        <?php if ($project_link): ?>

                            <a
                                href="<?= esc_url($project_link); ?>"
                                class="projects-overview__link"
                            >
                                <span>Projekt ansehen</span>
                                <span aria-hidden="true">↗</span>
                            </a>

                        <?php endif; ?>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

        <p
            class="projects-overview__empty"
            data-empty-message
            hidden
        >
            Keine Projekte in dieser Kategorie gefunden.
        </p>

    </div>

</section>
