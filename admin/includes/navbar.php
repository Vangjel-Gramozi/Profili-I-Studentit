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


<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Trade+Winds&display=swap');

*{
  color: #d9d9d9;
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
}

.navbar .navbar_left .logo a{
  margin-top:20px;
  margin: 5px;
  font-size: 20px;
  color: white;
}

.navbar .navbar_right{
   display: flex;
}

.navbar .navbar_right .icon_wrap{
  cursor: pointer;
}

.navbar .navbar_right .profile{
  position: relative;
}

.navbar .profile .profile_dd{
  position: absolute;
  z-index: 100;
  top: 48px;
  right: -10px;
  user-select: none;
  background: #fff;
  border: 1px solid #c7d8e2;
  width: 350px;
  height: 108px;
  display: none;
  border-radius: 3px;
  box-shadow: 10px 10px 35px rgba(0,0,0,0.125),
              -10px -10px 35px rgba(0,0,0,0.125);
}

.navbar .navbar_right .profile .icon_wrap{
  margin-top: 1rem;
  display: flex;
  align-items: center;
}

.navbar .navbar_right .profile .name{
  display: inline-block;
  user-select: none;
  margin: 0 10px;
}
 
.navbar .profile .profile_dd{
  width: 225px;
  z-index: 100;
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

.navbar .profile.active .profile_dd{
  display: block;
  z-index: 100;
}

.navbar {
    display: flex;
    position: relative;
    justify-content: space-between;
    align-items: center;
    background-color: #1a1a1a;
    color: white;
    opacity: 0.9;
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

.asd:hover {
  background: #f12020;
  transition: 0.3s;
  opacity: 0.9; 
}

.logout {
  color: black;
  opacity: 0.7;
}

.logout:hover {
  color: #f12020;
  transition: 0.3s;
  opacity: 0.9; 
}

.pro {
  color: black;
  opacity: 0.7;
}

.pro:hover {
  text-decoration: underline;
  text-decoration-color: #ffffff;
  color: black;
  opacity: 0.7;
}

.navbar_left a:hover {
  text-decoration: underline;
  text-decoration-color: #1a1a1a;
}



@media (max-width: 800px) {
    .navbar {
      flex-direction: column;
      
    }

    .profile {
      margin-bottom: 20px;
    }

    .navbar .navbar_left .logo{
      padding: 20px;
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

}

</style>

<div class="wrapper">
  <div class="navbar">
    <div class="navbar_left">
      <div class="logo">
        <a href="../perdorues/admin.php">Profili i Studentit</a>
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
                <li class="asd"><a href="../perdorues/admin.php">Perdorues</a></li>
                <li class="asd"><a href="../lende/menaxho_lende.php">Lende</a></li>
                <li class="asd"><a href="../grupe/menaxho_grupe.php">Grup</a></li>
                <li class="asd"><a href="../dege/menaxho_dege.php">Dege</a></li>
              </ul>
            </div>
      <div class="profile">
        <div class="icon_wrap">
          <!-- fucking foto -->
          <span class="name"><?php echo $_SESSION['emer']; ?></span>
          <i class="fas fa-chevron-down"></i>
        </div>
        <div class="profile_dd">
          <ul class="profile_ul">
            <li class="profile_li"><a class="pro" href="#"><span class="picon"><i class="fas fa-user-alt"></i></span>Pershendetje</a>
              <!-- <div class="butoni_im">My Account</div> -->
            </li>
            <!-- <li><a class="address" href="#"><span class="picon"><i class="fas fa-map-marker"></i></span>Address</a></li>
            <li><a class="settings" href="#"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li> -->
            <li><a class="logout" href="../../includes/logout.php"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div> 
</div>

   