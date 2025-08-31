<style>
    body {
        min-height: 100vh;
        overflow-x: hidden;
    }
    .sidebar {
        min-width: 250px;
        max-width: 250px;
        background-color: #343a40;
        color: #fff;
        transition: all 0.3s;
    }
    .sidebar a {
        color: #fff;
        text-decoration: none;
    }
    .sidebar a:hover {
        background-color: #495057;
        color: #fff;
    }
    .sidebar .active {
        background-color: #007bff;
    }
    .content {
        width: 100%;
        padding: 20px;
    }
    .sidebar-collapsed {
        min-width: 80px;
        max-width: 80px;
    }
    .sidebar-collapsed .sidebar-link-text {
        display: none;
    }
    .sidebar-collapsed a {
        text-align: center;
    }
</style>
<div id="sidebar" class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4">Admin</h4>
    <a href="admin_panel.php" class="d-block py-2 px-3 mb-2 active"><i class="fas fa-boxes me-2"></i><span class="sidebar-link-text">Packages</span></a>
    <a href="#" class="d-block py-2 px-3 mb-2"><i class="fas fa-users me-2"></i><span class="sidebar-link-text">Users</span></a>
    <a href="#" class="d-block py-2 px-3 mb-2"><i class="fas fa-chart-line me-2"></i><span class="sidebar-link-text">Reports</span></a>
    <a href="#" class="d-block py-2 px-3 mt-auto"><i class="fas fa-sign-out-alt me-2"></i><span class="sidebar-link-text">Logout</span></a>
    </div>