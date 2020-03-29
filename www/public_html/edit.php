<?php
require_once "../inc.config.php";

$api = "{$api_gateway}/crud/{$_SESSION['crud']}/details/{$_GET['id']}";
$data = json_decode(file_get_contents($api), true);

function htmlform($data=[])
{
    foreach($data as $d => $datum)
    {
        echo "
    <tr>
        <td>{$d}</td>
        <td>
            <input name='data[{$d}]' value='{$datum}' type='text' class='w3-input' />
        </td>
    </tr>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $assets; ?>/css/w3.css" />
</head>
<body class="w3-teal">

<?php require_once "../inc.menus.php"; ?>

<form name="details" method="post" action="edit-update.php">
<table class="w3-table w3-striped">
<thead class="w3-red">
    <tr>
        <th>Key</th>
        <th>Value</th>
    </tr>
</thead>
<tbody class="w3-pale-yellow">
    <?php htmlform($data); ?>
</tbody>
<tfoot>
    <tr>
        <td>&nbsp;</td>
        <td>
            <input name="table" type="hidden" value="<?php echo $_SESSION['crud']; ?>" />
            <input name="edit" type="submit" value="Edit Record" class="w3-btn w3-red" />
            <a href="index.php" class="w3-btn w3-blue">Cancel</a>
        </td>
    </tr>
</tfoot>
</table>
</form>
</body>
</html>
