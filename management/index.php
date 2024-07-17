<?php

if (file_exists("utils/index.php")) {
    require_once "utils/index.php" ;
} elseif (file_exists("../utils/index.php")) {
    require_once "../utils/index.php";
} elseif(file_exists("../../utils/index.php")) {
    require_once "../../utils/index.php";
} elseif(file_exists("../../../utils/index.php")) {
    require_once "../../../utils/index.php";
}

?>


<?php
/*
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.collectapi.com/economy/cripto",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "authorization: apikey 1iPgs1pMdlf5yduQsSdYtf:0pm5j9ifaeyFLJl1HlPb6V",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}

exit();
*/
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="<?php echo baseUrlBack() . "style/dist/img/favIcon/icon.png";?>">

    <title><?php echo function_exists('firmName') ? firmName() . " | " : "" ?> Anasayfa</title>
    <?php
    if (file_exists("include/style.php")) {
        require_once "include/style.php";
    } elseif (file_exists("../include/style.php")) {
        require_once "../include/style.php";
    } elseif (file_exists("../../include/style.php")) {
        require_once "../../include/style.php";
    } elseif (file_exists("../../../include/style.php")) {
        require_once "../../../include/style.php";
    }

    ?>
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <?php
        if (file_exists("include/sidebar-menu-icon.php")) {
            require_once "include/sidebar-menu-icon.php";
            require_once "include/top-bar-notification.php";
        } elseif (file_exists("../include/sidebar-menu-icon.php")) {
            require_once "../include/sidebar-menu-icon.php";
            require_once "../include/top-bar-notification.php";
        } elseif (file_exists("../../include/sidebar-menu-icon.php")) {
            require_once "../../include/sidebar-menu-icon.php";
            require_once "../../include/top-bar-notification.php";
        } elseif (file_exists("../../../include/sidebar-menu-icon.php")) {
            require_once "../../../include/sidebar-menu-icon.php";
            require_once "../../../include/top-bar-notification.php";
        } ?>
    </nav>

    <?php
    if (file_exists("include/sidebar.php")) {
        require_once "include/sidebar.php";
    } elseif (file_exists("../include/sidebar.php")) {
        require_once "../include/sidebar.php";
    } elseif (file_exists("../../include/sidebar.php")) {
        require_once "../../include/sidebar.php";
    } elseif (file_exists("../../../include/sidebar.php")) {
        require_once "../../../include/sidebar.php";
    }
    ?>

    <div class="content-wrapper">
        <?php require_once "main.php";?>
    </div>

    <?php
    if (file_exists("include/footer.php")) {
        require_once "include/footer.php";
    } elseif (file_exists("../include/footer.php")) {
        require_once "../include/footer.php";
    } elseif (file_exists("../../include/footer.php")) {
        require_once "../../include/footer.php";
    } elseif (file_exists("../../../include/footer.php")) {
        require_once "../../../include/footer.php";
    }


    ?>
</div>

<?php
if (file_exists("include/script.php")) {
    require_once "include/script.php";
} elseif (file_exists("../include/script.php")) {
    require_once "../include/script.php";
} elseif (file_exists("../../include/script.php")) {
    require_once "../../include/script.php";
} elseif (file_exists("../../../include/script.php")) {
    require_once "../../../include/script.php";
}

?>

<script>
    $(function () {
        var date = new Date();
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();

        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                center: 'title',
            },
            themeSystem: 'bootstrap',
            events: function (fetchInfo, successCallback, failureCallback) {
                // Axios ile tatil verilerini getirme
                axios.get('<?php echo baseUrlBack() . "kusva/index.php/?getHolidays=true"?>')
                    .then(function (response) {
                        var holidays = response.data;// Gelen JSON verisi
                        successCallback(holidays);// FullCalendar'a etkinlikleri ekle
                        console.log(holidays)
                    })
                    .catch(function (error) {
                        console.error('Hata:', error);
                        failureCallback(error);
                    });
            },
            initialEvents: []
        });

        calendar.render();
    });
</script>

</body>
</html>
