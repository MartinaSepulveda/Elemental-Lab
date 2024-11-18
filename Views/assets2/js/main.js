document.addEventListener('DOMContentLoaded', function() {
    const toggleSidebarButton = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('sidebar');
    const dashboardView = document.getElementById('dashboard-view');
    const profileView = document.getElementById('profile-view');
  
    // Toggle sidebar
    toggleSidebarButton.addEventListener('click', function() {
      sidebar.classList.toggle('collapsed');
    });
  
    // Show dashboard view by default
    dashboardView.classList.add('active');
  
    // Switch views when menu items are clicked
    document.getElementById('view-dashboard').addEventListener('click', function() {
      dashboardView.classList.add('active');
      profileView.classList.remove('active');
    });
  
    document.getElementById('view-profile').addEventListener('click', function() {
      profileView.classList.add('active');
      dashboardView.classList.remove('active');
    });
  });
  