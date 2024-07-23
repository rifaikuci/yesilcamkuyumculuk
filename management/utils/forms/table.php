<?php

function getTable($params)
{
    $params = array_merge([
        'data' => [],
        'isVisibleColumn' => [],
        'columnName' => [],
        'isInsert' => false,
        'isView' => false,
        'isDelete' => false,
        'isUpdate' => false,
        'isMultipleImage' => false,
        'title' => '',
        'titleBackground' => '',
        'titleText' => '',
        'rowBackground' => '',
        'rowText' => '',
        'tableHeaderBackground' => '',
        'tableHeaderText' => ''
    ], $params);

    echo buildTableHtml($params);
}

function buildTableHtml($params)
{
    $header = buildTableHeader($params);
    $body = buildTableBody($params);

    return '<div class="card ' . htmlspecialchars($params['titleBackground']) . '">
        <div class="card-header">
            <h3 class="card-title ' . htmlspecialchars($params['titleText']) . '">' . htmlspecialchars($params['title']) . '</h3>
        </div>
        <div class="card-body">' .
        ($params['isInsert'] ? buildInsertButton() : '') .
        '<table id="example1" class="table table-bordered table-striped ' . htmlspecialchars($params['rowBackground']) . ' ' . htmlspecialchars($params['rowText']) . '">
            <thead>' . $header . '</thead>
            <tbody>' . $body . '</tbody>
        </table>
    </div>
</div>';
}

function buildTableHeader($params)
{
    $columns = implode('', array_map(fn($name) => '<th>' . htmlspecialchars($name) . '</th>', $params['columnName']));
    if ($params['isView'] || $params['isDelete'] || $params['isUpdate'] || $params['isMultipleImage']) {
        $columns .= '<th style="text-align: center">İşlem</th>';
    }
    return '<tr class="' . htmlspecialchars($params['tableHeaderText']) . ' ' . htmlspecialchars($params['tableHeaderBackground']) . '">' . $columns . '</tr>';
}

function buildTableBody($params)
{
    $rows = '';
    foreach ($params['data'] as $row) {
        $rows .= '<tr>' . buildTableRow($row, $params) . '</tr>';
    }
    return $rows;
}

function buildTableRow($row, $params)
{
    $cells = implode('', array_map(fn($column) => '<td>' . htmlspecialchars(wordSplice($row[$column], 10)) . '</td>', $params['isVisibleColumn']));
    $actions = buildActionButtons(isset($row['mId']) && $row['mId'] ? $row['mId'] : $row['id'], $params);

    if ($params['isView'] || $params['isDelete'] || $params['isUpdate'] || $params['isMultipleImage']) {
        $cells .= '<td style="text-align: center">' . $actions . '</td>';
    }

    return $cells;
}

function buildActionButtons($id, $params)
{
    $buttons = '';
    if ($params['isMultipleImage']) {
        $buttons .= '<a style="margin-right: 15px" href="uploadImages/?id=' . $id . '" class="btn btn-outline-secondary"><i class="fa fa-images"></i></a>';
    }
    if ($params['isView']) {
        $buttons .= '<a style="margin-right: 15px" href="view/?id=' . $id . '" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>';
    }
    if ($params['isUpdate']) {
        $buttons .= '<a style="margin-right: 15px" href="update/?id=' . $id . '" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>';
    }
    if ($params['isDelete']) {
        $buttons .= buildDeleteButton($id);
    }
    return $buttons;
}

function buildDeleteButton($id)
{
    $cur_dir = getcwd();
    $cur_dir = explode("/", $cur_dir);
    $tempKeyword = $cur_dir[count($cur_dir) - 1] . "Delete";
    $path = '';
    if (file_exists("../../kusva")) {
        $path = "../../kusva/?";
    } elseif (file_exists("../../../kusva")) {
        $path = "../../../kusva/?";
    }

    return '<a style="margin-right: 15px" href="' . $path . $tempKeyword . '=' . $id . '" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
}

function buildInsertButton()
{
    return '<div style="text-align: right; margin-bottom: 5px; margin-left: 30px;">
                <a href="insert/" class="btn btn-primary"><i class="fa fa-plus"></i> Ekle</a>
            </div>';
}

?>
