<footer>
    <div class="footer-infos">
        <div class="infos">
            <p>39 bellevue de la madeleine, 29600 Morlaix</p>
            <p>
                Tel: 06 15 06 82 08 |
                Email :
                <a href="mailto:ssapaysdemorlaix@mailo.com">
                    ssapaysdemorlaix@mailo.com
                </a>
            </p>
            <p><?= secure_html($str['footer_siret']) ?></p>
        </div>
        <img src="/assets/img/logo.svg" alt="SSA logo">
    </div>
</footer>

<?= $this->renderComponent('copyright.php', ['str' => $str]) ?>