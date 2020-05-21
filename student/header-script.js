  const toggleButton = document.getElementsByClassName("toggle-button")[0]
  const navbarLinks = document.getElementsByClassName("navbar-links")[0]
  const accButton = document.getElementsByClassName("profile")[0]
  /*const budy = document.getElementsByClassName("body")[0]*/


  function vetlla(){
    navbarLinks.classList.toggle("active")

    if(accButton.style.display=="none"){
      accButton.style.display="block";
    }

    else{
      accButton.style.display="none";
    }
  }

  toggleButton.addEventListener("click", vetlla)