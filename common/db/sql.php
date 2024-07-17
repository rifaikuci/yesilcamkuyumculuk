<?php
function insert($data, $table, $db)
{
    $keys = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));

    $sql = "INSERT INTO $table ($keys) VALUES ($placeholders)";
    $stmt = $db->prepare($sql);

    $stmt->execute(array_values($data));

    return $db->lastInsertId();
}

function update($data, $table, $id, $db)
{
    $set = [];
    foreach ($data as $key => $value) {
        $set[] = "$key = ?";
    }

    $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE id = ?";
    $stmt = $db->prepare($sql);

// Değerleri bağla
    $data[] = $id; // ID'yi son olarak ekle
    $stmt->execute(array_values($data));

    return $stmt->rowCount(); // Güncellenen satır sayısını döndür
}

function delete($id, $table, $db)
{
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount(); // Silinen satır sayısını döndür
}

function getDataRow($id, $table, $db)
{
    $sql = "SELECT * FROM $table WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTableColumns($table, $db)
{
    $sql = "SHOW COLUMNS FROM $table";
    $getColumns = $db->query($sql);

    return $getColumns->fetchAll(PDO::FETCH_COLUMN);
}

function getAllData($table, $limit, $db)
{
    $columns = getTableColumns($table, $db);
    $sql = "SELECT * FROM $table ORDER BY id";

    if ($limit) {
        $sql .= " LIMIT ?";
    }

    $stmt = $db->prepare($sql);

// Limiti bağla (varsa)
    if ($limit) {
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
    }

    $stmt->execute();

    $data = [];
    $counter = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $counter++;
        $item = [];
        foreach ($columns as $column) {
            $item[$column] = $row[$column];
        }
        $item['counter'] = "#" . $counter;
        $data[] = $item;
    }

    return $data;
}

function getAllDataWithSort($table, $limit, $db, $sort)
{
    $columns = getTableColumns($table, $db);
    $sort = $sort ? $sort : "ASC";

    $sql = "SELECT * FROM $table ORDER BY id $sort";

    if ($limit) {
        $sql .= " LIMIT ?";
    }

    $stmt = $db->prepare($sql);

// Limiti bağla (varsa)
    if ($limit) {
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
    }

    $stmt->execute();

    $data = [];
    $counter = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $counter++;
        $item = [];
        foreach ($columns as $column) {
            $item[$column] = $row[$column];
        }
        $item['counter'] = "#" . $counter;
        $data[] = $item;
    }

    return $data;
}

function getDataRowByColumn($id, $table, $db, $columnName = 'id')
{
    $sql = "SELECT * FROM $table WHERE $columnName = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
