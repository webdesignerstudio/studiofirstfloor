<?php
$pageTitle = 'Tarieven';
$currentPage = 'tarieven';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section style="padding-top: 150px; padding-bottom: 60px;">
        <div class="container">
            <div class="reveal">
                <p class="section-label">Investeer in jezelf</p>
                <h1 style="text-align: center;">Tarieven</h1>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div class="pricing-section reveal">
                <table class="pricing-table">
                    <tr>
                        <td colspan="3" style="background: var(--bg-secondary); padding: 16px 24px;">
                            <p class="section-label" style="margin: 0;">Maand abonnement</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>1× per week</h4>
                        </td>
                        <td>1 groepsles per week</td>
                        <td>€49,99<span style="font-size: 0.9rem; color: var(--text-muted);">/maand</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4>2× per week</h4>
                        </td>
                        <td>2 groepslessen per week</td>
                        <td>€89,99<span style="font-size: 0.9rem; color: var(--text-muted);">/maand</span></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background: var(--bg-secondary); padding: 16px 24px;">
                            <p class="section-label" style="margin: 0;">Zonder abonnement</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Try out</h4>
                        </td>
                        <td>3 proeflessen (1 maand geldig)</td>
                        <td>€29,99</td>
                    </tr>
                    <tr>
                        <td>
                            <h4>10 rittenkaart</h4>
                        </td>
                        <td>10 lessen (3 maanden geldig)</td>
                        <td>€119,99</td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Losse les</h4>
                        </td>
                        <td>Eenmalige deelname</td>
                        <td>€14,50</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background: var(--bg-secondary); padding: 16px 24px;">
                            <p class="section-label" style="margin: 0;">Op aanvraag</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Personal Pilates Training</h4>
                        </td>
                        <td>1-op-1 sessie</td>
                        <td>Op aanvraag</td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Duo Pilates Training</h4>
                        </td>
                        <td>2 personen</td>
                        <td>Op aanvraag</td>
                    </tr>
                </table>
            </div>

            <div class="pricing-note reveal">
                <p class="section-label">Voorwaarden</p>
                <p style="max-width: 600px; margin: 0 auto; font-size: 0.9rem;">
                    Strippenkaarten zijn 3 maanden geldig. Abonnementen zijn maandelijks opzegbaar met een opzegtermijn van 1 maand. 
                    Afspraken kunnen tot 24 uur van tevoren kosteloos worden verplaatst. Bij no-show wordt de les in rekening gebracht.
                </p>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
