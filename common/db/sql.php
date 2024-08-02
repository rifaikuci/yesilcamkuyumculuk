<?php
function insert($data, $table, $db)
{
    try {
        $keys = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($keys) VALUES ($placeholders)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array_values($data));
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }

}

function update($data, $table, $id, $db)
{
    try {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = ?";
        }
        $data[] = $id;


        try {
            $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE mId = ?";

            $stmt = $db->prepare($sql);
            $stmt->execute(array_values($data));

        } catch (Exception $e) {
            $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array_values($data));
        }

        return $stmt->rowCount();
    } catch (PDOException $e) {
        print_r(array_values($data));

        echo $e->getMessage();
        exit();
        return false;
    }
}

function delete($id, $table, $db)
{

    $row = getDataRow($id, $table, $db);


    try {
        $sql = "DELETE FROM $table WHERE mId = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

    } catch (PDOException $e) {
        $sql = "DELETE FROM $table WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
    }

    if(isset($row['image']) && $row['image'] && file_exists("../" . $row['image'])) {
            unlink("../" . $row['image']);
    }

    return $stmt->rowCount();
}

function getDataRow($id, $table, $db)
{
    try {
        $sql = "SELECT * FROM $table WHERE mId = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

    } catch (Exception $e) {
        $sql = "SELECT * FROM $table WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
    }

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

function updateMd5($lastId, $table, $db) {
    $tempData['mId'] = md5($lastId);
    $set = [];
    foreach ($tempData as $key => $value) {
        $set[] = "$key = ?";
    }

    try {
        $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE id = ?";
        $stmt = $db->prepare($sql);
        $data2 = array_values($tempData);
        $data2[] = $lastId;

        $stmt->execute($data2);
    } catch (Exception $e) {
        echo "Hata: " . $e->getMessage();
    }
}
