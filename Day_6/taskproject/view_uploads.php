<?php
$page_title = "Upload Log";
include_once('partials/header.php');
include_once('partials/navbar.php');

$log_file = 'logs/uploads.log';
$logs = file_exists($log_file) ? file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>📁 Upload Log</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Path</th>
                        <th>MIME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($logs)): ?>
                        <tr><td colspan="5" class="text-center">No upload logs found.</td></tr>
                    <?php else: ?>
                        <?php foreach (array_reverse($logs) as $log_line):
                            $parts = explode(' | ', $log_line);
                            if (count($parts) < 5) continue; // Skip malformed lines
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($parts[0]); ?></td>
                            <td><?php echo htmlspecialchars($parts[1]); ?></td>
                            <td>
                                <?php 
                                $type = htmlspecialchars($parts[2]);
                                $badge_class = $type == 'avatar' ? 'info' : 'primary';
                                echo "<span class='badge bg-{$badge_class}'>{$type}</span>";
                                ?>
                            </td>
                            <td><code><?php echo htmlspecialchars($parts[3]); ?></code></td>
                            <td><?php echo htmlspecialchars($parts[4]); ?></td>
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