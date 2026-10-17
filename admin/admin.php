<?php
require '../config/database.php';
$user = 'Guest321';
$pass = 'place321';

if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != $user ||  $_SERVER['PHP_AUTH_PW'] != $pass)
{
    header('WWW-Authenticate: Basic realm="Admin"');
    http_response_code(401);
    exit('Login Required.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = (int) $_POST['id'];

    if ($_POST['status'] == 'confirmed')
    {
        $newStat = 'confirmed';
    }

    else
    {
        $newStat = 'cancelled';
    }

    $save = $db->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $save->execute([$newStat, $id]);

    header('location: admin.php');
    exit;
}

$result = $db->query("SELECT * FROM bookings ORDER BY booking_date, booking_time");
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style_ad.css">
</head>
<body>
    <!-- Displays table with booking information -->
    <table>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Service</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['booking_date']) ?></td>
            <td><?= date('g:i A', strtotime($row['booking_time'])) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['service']) ?></td>
            <td class="<?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" name="status" value="confirmed">Confirm</button>
                    <button type="submit" name="status" value="cancelled"
                    onclick="return confirm('Cancel this booking?')">Cancel</button>
                </form>
            </td>
        </tr>   
        <?php endforeach; ?>
    </table>
</body>
</html>
