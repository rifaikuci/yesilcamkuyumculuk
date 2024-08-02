<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <?php require_once "sidebar-top.php"; ?>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <?php

                menuTreeSubTitle("Tatil Günleri",
                    "far fas fa-bed nav-icon",
                    "src/holidays",
                    "", "");

                menuTreeSubTitle("Api Key",
                    "far fas fa-key nav-icon",
                    "src/collectionApi",
                    "", "");

                menuTreeSubTitle("Döviz Listesi",
                    "far fas fa-dollar-sign nav-icon",
                    "src/currency",
                    "", "");

                menuTreeSubTitle("Personeller",
                    "far fas fa-user-secret nav-icon",
                    "src/personel",
                    "", "");

                menuTreeSubTitle("Müşteriler",
                    "far fas fa-users nav-icon",
                    "src/customer",
                    "", "");

                menuTreeSubTitle("Hizmetler",
                    "far fas fa-list nav-icon",
                    "src/services",
                    "", "");

                menuTreeSubTitle("S. Medya Hesapları",
                    "far fas fa-share nav-icon",
                    "src/smedia",
                    "", "");

                menuTreeSubTitle("Referanslar",
                    "far fas fa-copy nav-icon",
                    "src/reference",
                    "", "");


                menuLabel("Site Bilgileri", "green");

                menuTitleWithDot("Siteye Giriş", "primary", baseUrlFront(), "_blank");
                menuTitleWithDot("Çıkış Yap", "danger", baseUrlBack() . "kusva/?logout=true", "");
                ?>
            </ul>
        </nav>
    </div>
</aside>
