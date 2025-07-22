<?php
$page_title = "Login Log";
include_once('partials/header.php');
include_once('partials/navbar.php');

$log_file = 'logs/login.log';
$logs = file_exists($log_file) ? file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>🔑 Login Log</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($logs)): ?>
                        <tr><td colspan="3" class="text-center">No login logs found.</td></tr>
                    <?php else: ?>
                        <?php foreach (array_reverse($logs) as $log_line):
                            $parts = explode(' | ', $log_line);
                            if (count($parts) < 3) continue; // Skip malformed lines
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($parts[0]); ?></td>
                            <td><?php echo htmlspecialchars($parts[1]); ?></td>
                            <td class="text-center">
                                <?php
                                $status = htmlspecialchars(trim($parts[2]));
                                $badge_class = $status == 'SUCCESS' ? 'success' : 'danger';
                                echo "<span class='badge bg-{$badge_class}'>{$status}</span>";
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>