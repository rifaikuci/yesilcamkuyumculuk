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


                menuLabel("Site Bilgileri", "green");

                menuTitleWithDot("Siteye Giriş", "primary", baseUrlFront(), "_blank");
                menuTitleWithDot("Çıkış Yap", "danger", baseUrlBack() . "kusva/?logout=true", "");
                ?>
            </ul>
        </nav>
    </div>
</aside>
