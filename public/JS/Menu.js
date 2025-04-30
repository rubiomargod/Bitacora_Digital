function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const content = document.getElementById('content');
  sidebar.classList.toggle('collapsed'); // Alternar la clase 'collapsed'
  sidebar.classList.toggle('expanded'); // Alternar la clase 'expanded'
}