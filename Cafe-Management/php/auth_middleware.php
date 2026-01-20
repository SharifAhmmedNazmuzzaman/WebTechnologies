<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['user_role']);
}
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: /WebTechnologies/php/login.php");
        exit();
    }
}

function requireRole($allowedRoles) {
    requireLogin();
    
    if (!in_array($_SESSION['user_role'], $allowedRoles)) {
        switch($_SESSION['user_role']) {
            case 'admin':
                header("Location: /WebTechnologies/php/admin/dashboard.php");
                break;
            case 'staff':
                header("Location: /WebTechnologies/php/staff/staff-orders.php");
                break;
            case 'customer':
                header("Location: /WebTechnologies/php/customer/dashboard.php");
                break;
            default:
                header("Location: /WebTechnologies/index.php");
        }
        exit();
    }
}

function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        switch($_SESSION['user_role']) {
            case 'admin':
                header("Location: /WebTechnologies/php/admin/dashboard.php");
                break;
            case 'staff':
                header("Location: /WebTechnologies/php/staff/staff-orders.php");
                break;
            case 'customer':
                header("Location: /WebTechnologies/php/customer/dashboard.php");
                break;
            default:
                header("Location: /WebTechnologies/index.php");
        }
        exit();
    }
}
?>