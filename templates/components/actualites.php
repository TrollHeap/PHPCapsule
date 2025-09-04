<?php

/** @var array<string, string> $str */
/** @var array<int, array<string, string>> $articles */
$articles = [
    [
        'title'    => 'Atelier sur la santé alimentaire',
        'content'  => 'Participez à notre atelier pour découvrir les bienfaits d’une alimentation durable.',
        'category' => 'sante',
        'image'    => '/assets/img/banner.webp',
        'link'     => 'actualites.html',
    ],
    [
        'title'    => 'Rencontre avec les paysans locaux',
        'content'  => 'Échangez avec les producteurs pour une agriculture respectueuse de l’environnement.',
        'category' => 'environnement',
        'image'    => '/assets/img/banner.webp',
        'link'     => 'actualites.html',
    ],
    [
        'title'    => 'Marche citoyenne pour le climat',
        'content'  => 'Joignez-vous à notre mobilisation pour un avenir plus vert.',
        'category' => 'mobilisation',
        'image'    => '/assets/img/banner.webp',
        'link'     => '/#news',
    ],
];
?>

<section id="news" class="news">
    <h2><?= secure_html($str['news_title']) ?></h2>

    <div class="filters">
        <button class="filter-btn" data-filter="all"><?= secure_html($str['news_filter_all']) ?></button>
        <button class="filter-btn" data-filter="sante"><?= secure_html($str['news_filter_sante']) ?></button>
        <button class="filter-btn" data-filter="environnement"><?= secure_html($str['news_filter_env']) ?></button>
        <button class="filter-btn" data-filter="mobilisation"><?= secure_html($str['news_filter_mob']) ?></button>
    </div>

    <div class="news-grid">
        <?php foreach ($articles as $article): ?>
            <article class="news-item" data-category="<?= secure_html($article['category']) ?>">
                <h3><?= secure_html($article['title']) ?></h3>
                <p><?= secure_html($article['content']) ?></p>
                <img src="<?= $article['image'] ?>" alt="illustration article">
                <a href="<?= secure_url($article['link']) ?>" class="read-more">
                    <?= secure_html($str['read_more']) ?>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
