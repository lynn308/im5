
<?php
$project = get_project_by_id(get_the_ID());
?>

<main class="project-detail">

    <!-- PROJEKTNAME UND HAUPTBILD -->
    <section class="project-intro">

        <div class="project-container">

            <p class="project-subtitle">
                ← zurück zu den Projekten
            </p>

            <h1><?= esc_html($project['title']) ?></h1>

            <!-- Kategorien und Leistungen -->
            <div class="project-tags">

                <?php foreach ($project['categories'] as $category): ?>
                    <span class="project-tag">
                        <?= esc_html($category) ?>
                    </span>
                <?php endforeach; ?>


                <?php if (!empty($project['services'])): ?>
                    <span class="project-tag">
        <?= esc_html($project['services']) ?>
    </span>
                <?php endif; ?>


            </div>

            <!-- Hauptbild -->
            <?php if (!empty($project['image']['src'])): ?>

                <img
                    class="project-main-image"
                    src="<?= esc_url($project['image']['src']) ?>"
                    alt="<?= esc_attr($project['image']['alt'] ?? '') ?>"
                >

            <?php endif; ?>

        </div>

    </section>


    <!-- PROJEKTINFORMATIONEN -->
    <section class="project-info">

        <div class="project-container project-info-grid">

            <div>
                <p class="project-label">Kunde</p>
                <p><?= esc_html($project['client']) ?></p>
            </div>

            <div>
                <p class="project-label">Jahr</p>
                <p><?= esc_html($project['year']) ?></p>
            </div>

            <div>
                <p class="project-label">Leistungen</p>

                <p>

                    <?= esc_html($project['services']) ?>

                </p>
            </div>

            <div>
                <p class="project-label">Dauer</p>
                <p><?= esc_html($project['duration']) ?></p>
            </div>

        </div>

    </section>


    <!-- AUFGABE UND LÖSUNG -->
    <section class="project-description">

        <div class="project-container project-text-grid">

            <!-- Aufgabe -->
            <div>
                <p class="project-label">die Aufgabe</p>

                <h2>Worum ging es?</h2>

                <div class="project-text">
                    <?= wp_kses_post(
                        wpautop($project['challenge'])
                    ) ?>
                </div>
            </div>

            <!-- Lösung -->
            <div>
                <p class="project-label">meine Lösung</p>

                <h2>Was habe ich gemacht?</h2>

                <div class="project-text">
                    <?= wp_kses_post(
                        wpautop($project['solution'])
                    ) ?>
                </div>
            </div>

        </div>

    </section>


    <!-- DETAILBILDER -->
    <section class="project-gallery">

        <div class="project-container project-gallery-grid">

            <?php foreach ($project['gallery'] as $item): ?>

                <?php if (!empty($item['image'])): ?>

                    <?php
                    $image = get_media_by_id($item['image']);
                    ?>

                    <?php if (!empty($image['src'])): ?>

                        <img
                            src="<?= esc_url($image['src']) ?>"
                            alt="<?= esc_attr($image['alt'] ?? '') ?>"
                        >

                    <?php endif; ?>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>

    </section>

</main>
