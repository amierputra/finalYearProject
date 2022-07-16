function menu_open() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("sidebarOpen").style.display = 'none';
    document.getElementById("footer").style.width = '115%';
  }
  function menu_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("sidebarOpen").style.display = "inline-block";
    document.getElementById("footer").style.width = '100%';
  }