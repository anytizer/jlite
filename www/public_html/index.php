<?php
require_once "../inc.config.php";

$api = "{$api_gateway}/crud/{$_SESSION['crud']}/list";
$data = json_decode(file_get_contents($api), true);

$headers = array_keys($data[0]);

function thead($headers=[])
{
    echo "<th>Edit</th>";
    foreach($headers as $h => $header)
    {
        $header = strtoupper($header);
        echo "<th>{$header}</th>";
    }
}

# Must have ID Column
function tbody($primary_key="id", $rows=[])
{
    foreach($rows as $r => $row)
    {
        $pk_value = $row[$primary_key];
        echo "<tr>";
        echo "<td><a href='edit.php?id={$pk_value}'>Edit</a></td>";
        foreach($row as $d => $datum)
        {
            echo "<td>{$datum}</td>";
        }
        echo "</tr>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="<?php echo $assets; ?>/css/crud.css" />
</head>
<body class="w3-teal">

<?php require_once "../inc.menus.php"; ?>

<table class="w3-table w3-striped w3-white">
<thead class="w3-red">
    <tr>
        <?php thead($headers); ?>
    </tr>
</thead>
<tbody class="w3-pale-yellow">
    <?php tbody($cruds[$_SESSION["crud"]][2], $data); ?>
</tbody>
</table>
</body>
</html>
