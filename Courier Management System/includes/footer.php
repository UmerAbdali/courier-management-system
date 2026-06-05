<?php
// Common footer for Courier Management System pages
$currentDir = basename(dirname($_SERVER['SCRIPT_NAME']));
$currentScript = basename($_SERVER['SCRIPT_NAME']);
$isSidebar = in_array($currentDir, ['admin', 'agent']) && $currentScript !== 'login.php';
?>
    </main>
    <?php if ($isSidebar): ?>
    </div>
    <?php endif; ?>
    <footer>
        <p>&copy; Courier Management System</p>
    </footer>
</body>
</html>
