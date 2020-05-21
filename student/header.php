    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  	<script src="js/libs/jquery.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="header-script.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
		$(document).ready(function(){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
			$(".close").click(function(){
			  $(".popup").hide();
			});
		});
  </script>

  <script>
    const toggleButton = document.getElementsByClassName("togle")[0]
    const navbarLinks = document.getElementsByClassName("navbar-links")[0]
    const accButton = document.getElementsByClassName("profile")[0]
    const budy = document.getElementsByClassName("body")[0]

    toggleButton.addEventListener("click", () => {
      navbarLinks.classList.toggle("active")

      if(accButton.style.display=="none"){
        accButton.style.display="block";
      }

      else{
        accButton.style.display="none";
      }
    })
  </script>

<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Trade+Winds&display=swap');

*{
  margin: 0;
  padding: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
  font-family: 'Montserrat';
}

a{
   color: #7f8db0;
}

.wrapper{
  width: 100%;
  height: 100%;
}

.navbar{
  background: #fff;
  width: 100%;
  height: 60px;
  padding: 0 25px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.navbar .navbar_left .logo a{
  margin-top:20px;
  margin: 5px;
/*   font-family: 'Trade Winds';*/
   font-size: 20px;
   color: white;
}

.navbar .navbar_right{
   display: flex;
}

.navbar .navbar_right img{
  width: 35px;
}

.navbar .navbar_right .icon_wrap{
  cursor: pointer;
}

.navbar .navbar_right .profile{
  position: relative;
}

.navbar .profile .profile_dd{
  position: absolute;
  top: 48px;
  right: -15px;
  user-select: none;
  background: #fff;
  border: 1px solid #c7d8e2;
  width: 350px;
  height: auto;
  display: none;
  border-radius: 3px;
  box-shadow: 10px 10px 35px rgba(0,0,0,0.125),
              -10px -10px 35px rgba(0,0,0,0.125);
}

.navbar .profile .profile_dd:before{
    content: "";
    position: absolute;
    top: -20px;
    right: 15px;
    border: 10px solid;
    border-color: transparent transparent #fff transparent;
}

.navbar .navbar_right .profile .icon_wrap{
  margin-top: 1rem;
  display: flex;
  align-items: center;
}

.navbar .navbar_right .profile .name{
  display: inline-block;
  margin: 0 10px;
}

.navbar .navbar_right .icon_wrap:hover,
.navbar .navbar_right .profile.active .icon_wrap,
.navbar .navbar_right .notifications.active .icon_wrap{
  color: #3b80f9;
}
 
.navbar .profile .profile_dd{
  width: 225px;
  z-index: 1;
}
.navbar .profile .profile_dd:before{
  right: 10px;
}

.navbar .profile .profile_dd ul li {
    border-bottom: 1px solid #f1f2f4;
}

.navbar .profile .profile_dd ul li  a{
    display: block;
    padding: 15px 35px;
    position: relative;
}

.navbar .profile .profile_dd ul li  a .picon{
  display: inline-block;
  width: 30px;
}

.navbar .profile .profile_dd ul li  a:hover{
  color: #3b80f9;
  background: #f0f5ff;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.navbar .profile .profile_dd ul li.profile_li a:hover {
    background: transparent;
    cursor: default;
    color: #7f8db0;
}

.navbar .profile .profile_dd ul li .butoni_im{
    height: 32px;
    padding: 7px 10px;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    text-align: center;
    background: #3b80f9;
    width: 125px;
    margin: 5px auto 15px;
}

.navbar .profile .profile_dd ul li .butoni_im:hover{
  background: #6593e4;
}

.navbar .profile.active .profile_dd{
  display: block;
}

.navbar {
    display: flex;
    position: relative;
    justify-content: space-between;
    align-items: center;
    background-color: black;
    color: white;
}

.navbar-links {
    height: 100%;
}

.navbar-links ul {
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar-links li {
    list-style: none;
}

.navbar-links li a {
    display: block;
    text-decoration: none;
    color: white;
    padding: 1rem;
}

nav ul li:hover {
    background-color: #555;
}

.togle {
    position: absolute;
    top: .75rem;
    right: 1rem;
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 21px;
    margin-top: 10px;
}

.togle .bar {
    height: 3px;
    width: 100%;
    background-color: white;
    border-radius: 10px;
}

@media (max-width: 800px) {
    .navbar {
      flex-direction: column;
      height: 100%;
    }

    .profile {
      margin-bottom: 20px;
    }

    .navbar .navbar_left .logo{
      padding: 20px;
    }

    .togle {
      display: flex;
    }

    .navbar-links {
      display: none;
      width: 100%;
    }

    .navbar-links ul {
      margin-top: 8px;
      width: 100%;
      flex-direction: column;
      text-decoration: center;
    }

    .navbar-links ul li {
      text-align: center;
    }

    .navbar-links ul li a {
      padding: .5rem 1rem;
      text-align: center;
    }

    .navbar-links.active {
      display: block;
    }
}

</style>

<div class="wrapper">
  <div class="navbar">
    <div class="navbar_left">
      <div class="logo">
        <a href="#">Profili i Studentit</a>
      </div>
    </div>
    <div class="navbar_right">
      <a href="#" class="togle">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </a>
            <div class="navbar-links">
              <ul>
                <li><a href="#">Profili</a></li>
                <li><a href="#">Lendet</a></li>
                <li><a href="#">Dokument</a></li>
                <li><a href="#">Orari</a></li>
              </ul>
            </div>
      <div class="profile">
        <div class="icon_wrap">
          <!-- fucking foto -->
          <span class="name">Perdorues</span>
          <i class="fas fa-chevron-down"></i>
        </div>
        <div class="profile_dd">
          <ul class="profile_ul">
            <li class="profile_li"><a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i></span>Pershendetje</a>
              <!-- <div class="butoni_im">My Account</div> -->
            </li>
            <!-- <li><a class="address" href="#"><span class="picon"><i class="fas fa-map-marker"></i></span>Address</a></li>
            <li><a class="settings" href="#"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li> -->
            <li><a class="logout" href="#"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div> 
</div>

   