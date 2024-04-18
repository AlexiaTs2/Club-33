
<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "djanam";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Проверка дали има заявка за изтриване на запис
if(isset($_GET['id'])) {
    try {
        $delete_id = $_GET['id'];
        $sql = "DELETE FROM reservation WHERE ID = ?";
        $connection->prepare($sql)->execute([$delete_id]);
    } catch(PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}

// Изпълнение на заявката за извличане на записи от таблицата "reservation"
try {
    $PDOstatement = $connection->prepare('SELECT * FROM reservation');
    $PDOstatement->execute();
    $result = $PDOstatement->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error fetching records: " . $e->getMessage();
}

?>

<table border="1">
    <tr>
        <th>Username</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    <?php foreach($result as $row): ?>
        <tr>
            <td><?php echo $row['Name']; ?></td>
            <td><a href="Panel.php?id=<?php echo $row['ID']; ?>" class="buttondel">Delete</a></td>
            <td><a href="editpage.php?id=<?php echo $row['ID']; ?>" class="buttonedit">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>
