/* === Remove input autofocus webkit === */
*:focus {outline: none;}

/* === Form Typography === */
/*body {font: 14px/21px "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif;}*/
body {font: 14px/21px "Helvetica";}
/*.contact_form h2, .contact_form label {font-family:Georgia, Times, "Times New Roman", serif;}*/
.contact_form h2, .contact_form label {font-family:Helvetica;}
.form_hint, .required_notification {font-size: 11px;}

/* === List Styles === */
.contact_form ul {
    width:750px;
    list-style-type:none;
  list-style-position:outside;
  margin:0px;
	padding:0px;
}
.contact_form li{
	padding:12px; 
	border-bottom:1px solid #eee;
	position:relative;
} 
.contact_form li:first-child, .contact_form li:last-child {
	border-bottom:1px solid #777;
}

/* === Form Header === */
.contact_form h2 {
	margin:0;
	display: inline;
}
.required_notification {
	color:#d45252; 
	margin:5px 0 0 0; 
	display:inline;
	float:right;
}

/* === Form Elements === */
.contact_form label {
	width:150px;
	margin-top: 3px;
	display:inline-block;
	float:left;
	padding:3px;
}
.contact_form input {
	height:20px; 
	width:220px; 
	padding:5px 8px;
}
.contact_form textarea {padding:8px; width:300px;}
.contact_form button {margin-left:156px;}

	/* form element visual styles */
	.contact_form input, .contact_form textarea { 
		border:1px solid #aaa;
		box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
		border-radius:2px;
		padding-right:30px;
		-moz-transition: padding .25s; 
		-webkit-transition: padding .25s; 
		-o-transition: padding .25s;
		transition: padding .25s;
	}
	.contact_form input:focus, .contact_form textarea:focus {
		background: #fff; 
		border:1px solid #555; 
		box-shadow: 0 0 3px #aaa; 
		padding-right:70px;
	}

/* === HTML5 validation styles === */	
.contact_form input:required, .contact_form textarea:required {
	background: #fff url(images/red_asterisk.png) no-repeat 98% center;
}
.contact_form input:required:valid, .contact_form textarea:required:valid {
	background: #fff url(images/valid.png) no-repeat 98% center;
	box-shadow: 0 0 5px #5cd053;
	border-color: #28921f;
}
.contact_form input:focus:invalid, .contact_form textarea:focus:invalid {
	background: #fff url(images/invalid.png) no-repeat 98% center;
	box-shadow: 0 0 5px #d45252;
	border-color: #b03535
}

/* === Form hints === */
.form_hint {
	background: #d45252;
	border-radius: 3px 3px 3px 3px;
	color: white;
	margin-left:8px;
	padding: 1px 6px;
	z-index: 999; /* hints stay above all other elements */
	position: absolute; /* allows proper formatting if hint is two lines */
	display: none;
}
.form_hint::before {
	content: "\25C0";
	color:#d45252;
	position: absolute;
	top:1px;
	left:-6px;
}
.contact_form input:focus + .form_hint {display: inline;}
.contact_form input:required:valid + .form_hint {background: #28921f;}
.contact_form input:required:valid + .form_hint::before {color:#28921f;}
	
/* === Button Style === */
button.submit {
/*	background-color: #68b12f;*/
        background-color: #df0c0c;
	background: -webkit-gradient(linear, left top, left bottom, from(#df0c0c), to(#960808));
	background: -webkit-linear-gradient(top, #df0c0c, #960808);
	background: -moz-linear-gradient(top, #df0c0c, #960808);
	background: -ms-linear-gradient(top, #df0c0c, #960808);
	background: -o-linear-gradient(top, #df0c0c, #960808);
	background: linear-gradient(top, #df0c0c, #960808);
	border: 1px solid #ae0909;
	border-bottom: 1px solid #960808;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-ms-border-radius: 3px;
	-o-border-radius: 3px;
	box-shadow: inset 0 1px 0 0 #df0c0c;
	-webkit-box-shadow: 0 1px 0 0 #df0c0c inset ;
	-moz-box-shadow: 0 1px 0 0 #df0c0c inset;
	-ms-box-shadow: 0 1px 0 0 #df0c0c inset;
	-o-box-shadow: 0 1px 0 0 #df0c0c inset;
	color: white;
	font-weight: bold;
	padding: 6px 20px;
	text-align: center;
	text-shadow: 0 -1px 0 #4d0404;
}
button.submit:hover {
	opacity:.85;
	cursor: pointer; 
}
button.submit:active {
	border: 1px solid #960808;
	box-shadow: 0 0 10px 5px #960808 inset; 
	-webkit-box-shadow:0 0 10px 5px #960808 inset ;
	-moz-box-shadow: 0 0 10px 5px #960808 inset;
	-ms-box-shadow: 0 0 10px 5px #960808 inset;
	-o-box-shadow: 0 0 10px 5px #960808 inset;
	
}
h1
{
font-family: Helvetica;
text-align: center;
font-size: 36px;
}

h4
{
font-family: Helvetica;
font-size: 16px;
}

h5
{
font-family: Helvetica;
text-align: center;
font-size: 16px;
color: #837A7A;
}

/*
body
{
background-image:url('http://i44.tinypic.com/mw5ksj.png');
font-size: 12px;
font-family: Helvetica;
}
*/


#register
{
position: relative;
}

#status 
{
font-family: Helvetica;
font-size: 12;
position:relative;
float: right;
/* border: 1 solid; */
top: 10px;
}

#welcome
{
font-family: Helvetica;
/* border: 1 solid; */
position: relative;
top:50px;
/* left:50px; */
font-size: 25px;
text-align: start;
}

#message
{
font-family: Helvetica;
border: 1 solid;
/* width:500px; */
position: relative;
top:250px;
left: 10px;
}

#login_widget
{
font-family: Helvetica;
font-size: 12;
position:relative;
float: right;
/* border: 1 solid; */
top: 10px;
}

#create_blog
{
position: relative;
/* left:400px; */
top:150px;
width: 200px;
/* border: 1px solid; */
}

#recent
{
position: relative;
top:115px;
left:650px;
/* float: right; */
/* border: 1 solid; */
width: auto;
height: auto;
}

/*comments.php*/
#body
{
/* border: 1px solid; */
background-color: rgba(176,175,175,0.41);
/* top:150px; */
/* left: 200px; */
left:25%;
margin: 0 auto;
top: 0;
/* position: absolute; */
width: 950px;
height: 1000px;
overflow: hidden;
background-image:url('pen.png');
background-position:center bottom;
font-family: Helvetica;
/* overflow: scroll; */
}

#bodyII
{
/* border: 1px solid; */
background-color: rgba(176,175,176,0.41);
/* left:20%; */
top:150px;
/* position: fixed; */
margin: 0 auto;
width: 950px;
height: 100%;
/* top: 200px; */
overflow: hidden;
background-image:url('pen.png');
background-position:center bottom;
font-family: Helvetica;
}


#welcome_message
{
position:fixed;
/* border: 1px solid; */
background-color: #9e1111;
top: 0px;
left: 0px;
width: 100%;
z-index: 999;
height: 150px;
}

/*index.php*/
#index_top
{
position:fixed;
/* border: 1px solid; */
background-color: #960808;
top: 0px;
left: 0px;
width:100%;
z-index: 999;
font-size: 12;
height: 20px;
/* margin-left:70%;  */
/* left: 850px; */
}

/*index.php*/
#index_login
{
margin: 0 auto;
/* position:fixed; */
/* border: 2px solid; */
/* background-color: #960808; */
top: 0px;
left: 0px;
width:950px;
z-index: 999;
font-size: 12;
text-align: right;
/* margin-left:70%;  */
/* left: 850px; */
}

/*index.php*/
#recent_blogs
{
font-family: Helvetica;
position: relative;
/* border: 1px solid; */
top:200px;
overflow:scroll;
height: 600px;
width: 400px;
/* left:4no00px; */
}

/* comments.php */
#comments_blogs
{
position:fixed;
/* border: 1px solid; */
background-color: #9e1111;
top: 0px;
left: 0px;
width: 100%;
z-index: 999;
height: 60px;
}

/*comments.php*/
#main_page
{
margin: 0 auto;
/* position:fixed; */
/* border: 2px solid; */
/* top: 0px; */
/* background-color: #960808; */
/* left: 90%; */
width:950px;
/* z-index: 1; */
font-size: 15;
text-align: left;
/* margin-top: -1.5%;  */
/* left: 850px; */		
}

/*comments.php*/
#archives
{
position:fixed;
/* margin: 0 auto; */
/* border: 2px solid; */
/* background-color: #9e1111; */
top: 10px;
left: 50%;
font-size: 40px;
font-family: cursive;
/* width: 100%; */
z-index: 1;
/* height: 50px; */

}

/*comments.php*/
#logout_widget 
{
/* top: 10px; */
margin: 0 auto;
/* position:fixed; */
/* border: 2px solid; */
/* vertical-align: middle; */
/* bottom: 10px; */
/* background-color: #960808; */
/* left: 90%; */
width:950px;
/* z-index: 1; */
font-size: 15;
text-align: right;
/* margin-top: 2%;  */
/* overflow: hidden; */
/* left: 850px; */		
}

/*comments.php*/
#comment_block
{
/* border: 2px solid; */
width: 950px;
height: 100px;
margin: 0 auto;
position: relative;
overflow: scroll;
/* top:40px; */
}

/*comments.php*/
#comment_blockII
{
/* border: 2px solid; */
width: 950px;
margin: 0 auto;
position: relative;
top:200px;
}

/*comments.php*/
#comment_blockIV
{
/* border: 2px solid; */
width: 950px;
margin: 0 auto;
height: 600px;
position: relative;
overflow: scroll;
top:300px;
}

/*comments.php*/
#post_section
{
/* border: 2px solid; */
/* margin: 0 auto; */
position: relative;
top: 50px;	
}

/*comments.php*/
#comment_section
{
/* border: 2px solid; */
/* margin: 0 auto; */
position: relative;
top: 150px;	
}

/*commentsIII.php*/
#posted_comments
{
/* border: 2px solid; */
/* margin: 0 auto; */
position: relative;
top: 150px;
height: auto;
overflow: scroll;
}

/*members.php*/
#subject
{
margin: 0 auto;
position: relative;
/* border: 2px solid; */
top:300px;
/* background-color: #d9d9d9;	 */
}


/*members.php*/
#members_welcome
{
/* border: 2px solid; */
position: absolute;
width:100%;
height: 150px;
top:0;
left: 0;
z-index: 0;
background-color: #9e1111;
}

/*members.php*/
#members_login
{
margin: auto;
/* border: 2px solid; */
background-color: #960808;
/* top:300px; */
top:0;
width: 950px;;
height: 20px;
z-index: 10;
text-align: right;
font-family: Helvetica;
}

/*members.php*/
#members_main
{
position: fixed;
/* margin: auto; */
/* border: 2px solid; */
top:0;
width: 950px;
font-family: Helvetica;
z-index: 9;
text-align: left;
}

/*members.php*/
#your_home
{
/* border: 2px solid; */
position: fixed;
top:50px;
font-family: Helvetica;
font-size: 30px;
width: 100%;
text-align: center;
font-family: fantasy
}


#members_comment
{
/* border: 2px solid; */
/* margin: 0 auto; */
position: relative;
width: 100%;
top:150px;
text-align: center;
}

/*login.php*/
#login
{
position: relative;
text-align: left;
/* border: 1 solid; */
}

/*login.php*/
#login_account
{
/* border: 2px solid; */
position: fixed;
top:300px;
}



a.a1:link {color:gold;} 
a.a1:active {color:gold;}
a.a1:visited {color:gold;} 
a.a1:link {text-decoration:none;}
a.a1:visited {text-decoration:none;}
a.a1:active {text-decoration:underline;}
















