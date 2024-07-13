<?php

function showAlert($type, $content)
{
    $alertType = ($type === 'success') ? 'success' : 'danger';
    $strongMessage = ($type === 'success') ? 'Başarılı!' : 'Hata!';

    echo "<div class='alert alert-$alertType alert-dismissible fade show' role='alert'>
        <strong>$strongMessage</strong> $content
        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
}

function getErrorMessage($key)
{
    $messages = [
        'image_invalid_type' => "Geçersiz Dosya Tipi!",
        'image_large' => "Dosya boyutu fazla büyük!",
        'image_not_upload' => "Resim yüklenirken bir hata oluştu!",
        'pdf_invalid_type' => "Pdf için yanlış Dosya Tipi!",
        'pdf_large' => "Pdf boyutu fazla büyük!",
        'pdf_not_upload' => "PDF yüklenirken bir hata oluştu!",
    ];

    return $messages[$key] ?? null;
}

function handleInsertStatus($status)
{
    if ($status === 'ok') {
        showAlert('success', "Kayıt başarılı bir şekilde eklendi.");
    } else {
        showAlert('danger', "Kayıt eklenirken bir hata oluştu.");
    }
}

function handleDeleteStatus($status)
{
    if ($status === 'ok') {
        showAlert('success', "Kayıt başarılı bir şekilde silindi.");
    } else {
        showAlert('danger', "Kaydı Silerken bir hata oluştu!");
    }
}

function handleUpdateStatus($status)
{
    if ($status === 'ok') {
        showAlert('success', "Kayıt başarılı bir şekilde Güncellendi.");
    } else {
        showAlert('danger', "Kaydı Güncellerken bir hata oluştu!");
    }
}

function statusAlert()
{
    if (isset($_GET['hata'])) {
        $errorMessage = getErrorMessage($_GET['hata']);
        if ($errorMessage) {
            showAlert('danger', $errorMessage);
            return;
        }
    }

    if (isset($_GET['insert'])) {
        handleInsertStatus($_GET['insert']);
    }

    if (isset($_GET['delete'])) {
        handleDeleteStatus($_GET['delete']);
    }

    if (isset($_GET['update'])) {
        handleUpdateStatus($_GET['update']);
    }
}

?>
