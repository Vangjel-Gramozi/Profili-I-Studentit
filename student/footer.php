<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
  *{
    margin: 0;
    padding: 0;
    color: #d9d9d9;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  .content1{
    position: relative;
    margin: 130px auto;
    text-align: center;
    padding: 0 20px;
  }
  .content1 .text{
    font-size: 2.5rem;
    font-weight: 600;
    color: #202020;
  }
  .content1 .p{
    font-size: 2.1875rem;
    font-weight: 600;
    color: #202020;
  }
  footer{
    position: relative;
    margin-top: 100px;
    bottom: 0px;
    width: 100%;
    background: #111;
  }
  .main-content{
    display: flex;
  }
  .main-content .box{
    flex-basis: 50%;
    padding: 10px 20px;
  }
  .box h2{
    font-size: 1.125rem;
    font-weight: 600;
    text-transform: uppercase;
  }
  .box .content{
    margin: 20px 0 0 0;
    position: relative;
  }
  .box .content:before{
    position: absolute;
    content: '';
    top: -10px;
    height: 2px;
    width: 100%;
    background: #1a1a1a;
  }
  .box .content:after{
    position: absolute;
    content: '';
    height: 2px;
    width: 15%;
    background: #f12020;
    top: -10px;
  }
  .left{
    align-items: center;
  }

  .left .content p{
    text-align: justify;
  }
  .left .content .social{
    margin: 20px 0 0 0;
  }
  .left .content .social a{
    padding: 0 2px;
  }
  .left .content .social a span{
    height: 40px;
    width: 40px;
    background: #1a1a1a;
    line-height: 40px;
    text-align: center;
    font-size: 18px;
    border-radius: 5px;
    transition: 0.3s;
  }
  .left .content .social a span:hover{
    background: #f12020;
  }


  .right .content .fas{
    font-size: 1.4375rem;
    background: #1a1a1a;
    height: 45px;
    width: 45px;
    line-height: 45px;
    text-align: center;
    border-radius: 50%;
    transition: 0.3s;
    cursor: pointer;
  }
  .right .content .fas:hover{
    background: #f12020;
  }

  .right form .text{
    font-size: 1.0625rem;
    margin-bottom: 2px;
    color: #656565;
  }
  .right form .msg{
    margin-top: 10px;
  }
  .right form input, .right form .msgForm{
    width: 100%;
    font-size: 1.0625rem;
    background: #151515;
    padding-left: 10px;
    border: 1px solid #222222;
  }
  .right form input:focus,
  .right form .msgForm:focus{
    outline-color: #3498db;
  }
  .right form input{
    height: 35px;
  }
  .right form .btn{
    margin-top: 10px;
  }
  .right form .btn button{
    height: 40px;
    width: 100%;
    border: none;
    outline: none;
    background: #f12020;
    font-size: 1.0625rem;
    font-weight: 500;
    cursor: pointer;
    transition: .3s;
  }
  .right form .btn button:hover{
    background: #000;
  }
  .bottom{
    width: 100%;
    padding: 5px;
    font-size: 0.9375rem;
    background: #151515;
  }
  .bottom span{
    color: #656565;
  }
  .bottom a{
    color: #f12020;
    text-decoration: none;
  }
  .bottom a:hover{
    text-decoration: underline;
  }
  @media screen and (max-width: 900px) {
    footer{
      position: relative;
      bottom: 0px;
    }
    .main-content{
      flex-wrap: wrap;
      flex-direction: column;
    }
    .main-content .box{
      margin: 5px 0;
    }
  }
</style>

<footer>
      <div class="main-content">
        <div class="left box">
          <h2>About us</h2>
          <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat.</p>
          <div class="social">
                        <a href="#"><span class="fab fa-facebook-f"></span></a>
                        <a href="#"><span class="fab fa-twitter"></span></a>
                        <a href="#"><span class="fab fa-instagram"></span></a>
                        <a href="#"><span class="fab fa-youtube"></span></a>
                      </div>
          </div>
          </div>
          <div class="right box">
                    <h2>Address</h2>
          <div class="content">
                      <div class="place">
                        <span class="fas fa-map-marker-alt"></span>
                        <span class="text">Tiranë, Albania</span>
                      </div>
          <div class="phone">
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">+355 06XXXXXXXX</span>
                      </div>
          <div class="email">
                        <span class="fas fa-envelope"></span>
                        <span class="text">abc@fshn.edu.al</span>
                      </div>
                    </div>
          </div>
        </div>
          <div class="bottom">
          <center>
                    <span class="credit">Created By FRIENDS</a> | </span>
                    <span class="far fa-copyright"></span> 2020 All rights reserved.
                  </center>
          </div>
      
    
</footer>