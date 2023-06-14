<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900|Source+Sans+Pro:200,300,400,600,700,900);

* {
  box-sizing: border-box;
}

body {
  font-family: "Nunito", sans-serif;
}

a {
  text-decoration: none;
}

.text-center {
  text-align: center;
}

#user-menu a,
#neighborhood-menu a {
  color: #6f6f6f;
  font-size: 16px;
  line-height: 1;
  font-weight: 600;
  transition: 0.2s color;
}
#user-menu svg,
#neighborhood-menu svg {
  transition: 0.2s fill;
}

#neighborhood-menu svg {
  margin-right: 8px;
  width: 32px;
}
#neighborhood-menu a {
  margin: 0 24px;
}
#neighborhood-menu a:hover {
  color: #0095ee;
}
#neighborhood-menu a:first-of-type, #neighborhood-menu a:last-of-type {
  margin: 0;
}


#user-menu .notifications svg {
  width: 32px;
  margin-right: 24px;
}
#user-menu img {
  width: 40px;
  margin-right: 24px;
  box-shadow: 0 0 0 5px rgba(0, 0, 0, 0.1);
  transition: 0.2s all;
}
#user-menu #account svg {
  width: 18px;
  margin-left: 24px;
}
#user-menu #account:hover span {
  color: #0095ee;
}
#user-menu #account:hover img {
  box-shadow: 0 0 0 5px #fff, 0 0 0 7px #0095ee;
}

.circle {
  border-radius: 50%;
}

/**
 * Mega Menu Styles
 */
#main-menu .mega-menu {
  position: absolute;
  height: 0;
  overflow: hidden;
  transform-origin: top;
  transform: scaleY(0);
  padding: 0 20px;
  border-bottom: 1px solid #fafafa;
  opacity: 0;
  transition: transform 0.2s;
}
#main-menu .mega-menu .wrap {
  max-width: 1366px;
}
#main-menu .mega-menu .sub-menu {
  margin-top: 20px;
}
#main-menu .mega-menu h4 {
  margin: 0 0 0 -42px;
  display: inline-flex;
  align-items: center;
}
#main-menu .mega-menu a {
  display: inline-flex;
  width: 100%;
  margin: 0 0 12px;
  align-items: center;
}
#main-menu .mega-menu a.separator {
  border-top: 1px solid #dedede;
}
#main-menu .mega-menu a[data-num]:after {
  content: "(" attr(data-num) ")";
  font-size: 12px;
  margin-left: 4px;
  color: #0095ee;
}
#main-menu .mega-menu a.more {
  color: #0095ee;
  font-size: 14px;
}
#main-menu .mega-menu form {
  padding: 15px 0;
}
#main-menu .mega-menu form label {
  position: relative;
  margin: 0 15px;
}
#main-menu .mega-menu form label svg {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 10px;
  z-index: 10;
  width: 24px;
}
#main-menu .mega-menu form input[type=text] {
  border: 0;
  outline: 0;
  border-radius: 6px;
  vertical-align: middle;
  padding: 12px 24px 12px 42px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.1), 0 1px 3px 0 rgba(0, 0, 0, 0.08);
  transition: box-shadow 0.2s;
}
#main-menu .mega-menu form input[type=text]:focus {
  color: #0095ee;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.1), 0 1px 3px 0 rgba(0, 0, 0, 0.08), inset 0 0 0 1px #0095ee;
}
#main-menu a.active {
  color: #ff3275;
}
#main-menu a.active svg {
  fill: #ff3275;
}
#main-menu a.active + .mega-menu {
  box-shadow: 0 10px 15px -10px rgba(0, 0, 0, 0.12);
  background: #fff;
  overflow: auto;
  height: auto;
  transform: scaleY(1);
  padding: 20px;
  top: 95px;
  left: 0;
  right: 0;
  opacity: 1;
}
#main-menu #user-menu a.active + .mega-menu {
  left: auto;
  width: 250px;
  border: 1px solid #dedede;
  border-top: none;
  padding: 0;
}
#main-menu #user-menu a.active + .mega-menu hr {
  border: none;
  border-bottom: 1px solid #dedede;
}
#main-menu #user-menu a.active + .mega-menu svg {
  width: 28px;
  margin-right: 12px;
}
#main-menu #user-menu a.active + .mega-menu a {
  padding: 10px 20px;
  margin: 0;
}
#main-menu #user-menu a.active + .mega-menu a:hover {
  color: #0095ee;
}
#main-menu #user-menu a.active + .mega-menu a:first-of-type {
  padding-top: 20px;
}
#main-menu #user-menu a.active + .mega-menu a:last-of-type {
  padding-bottom: 20px;
  text-align: right;
}</style>
<body>
<nav id="main-menu">
		<div id="neighborhood-menu">
		</div>
		<div id="user-menu" class="right">
			<a id="account" href="#">
				<img class="circle" src="https://en.gravatar.com/userimage/145028317/8b0aa85cad1b557879f1fa4bad536434.jpg?size=200" />
			</a>
			<div class="mega-menu">
				<a href="#">Account</a>
				<a href="#">My Feed</a>
				<a href="#">Scrapbook</a>
				<hr>
				<a href="#">Log Out</a>
			</div>
		</div>
</nav>
</body>
<script>
var userMenu = document.querySelector('#user-menu');
var userMenuItems = userMenu.querySelectorAll('a');
userMenuItems.forEach(function(item){
	item.onclick = function(){
		if( this.classList.contains('active') ){
			this.classList.remove('active');
			return;
		}
		
		userMenuItems.forEach(function(i){
			i.classList.remove('active');
		});
		
		this.classList.toggle('active');
	}
});</script>
</html>