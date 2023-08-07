<!DOCTYPE html>
<html>

<head>
    <title>RAO Life - Care</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="reset.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <style>
        body {
            width: 100%;
            position: relative;
            font-family: 'Open Sans', 'Helvetica Neue', 'Helvetica', 'Roboto', 'Arial', sans-serif;
            font-size: 14px;
            color: #001837;
        }
        
        body a {
            color: #ededed;
            text-decoration: none;
        }
        
        body a:hover {
            color: #001837;
        }
        
        body a.btn {
            color: #fff;
            background-color: #95BCD1;
            border-radius: 3px;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            font-weight: 600;
            line-height: 54px;
            margin: 28px 0 16px;
            padding: 0 30px;
            position: relative;
            text-align: center;
            text-decoration: none;
            -webkit-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        
        body a.btn:hover {
            background-color: #001837;
        }
        
        body h2 {
            font-size: 35px;
            text-align: center;
            font-weight: 600;
            margin-bottom: 25px;
        }
        
        body p.subtitle {
            text-align: center;
            padding-top: 15px;
            padding-bottom: 25px;
        }
        
        body p.introsub {
            text-align: center;
            font-size: 3.2vw;
            padding-top: 15px;
            font-weight: 100;
/*            color: #c0f2e5;*/
            color: #fff;
            line-height: 5.5vw;
            padding-bottom: 25px;
        }
        
        body p.introsub span{
            display: block;
            font-size: 5vw;
            line-height: 7vw;
            color: #001837;
            font-weight: bold;
            padding: 2vh 0;
        }
        
        .center {
            margin-right: auto;
            margin-left: auto;
        }
        
        strong{
            font-weight: bold;
        }
        
        section {
            position: relative;
        }
        
        header {
            width: 100%;
            margin-bottom: 13vh;
            padding: 30px 2% 0px 4%;
            box-sizing: border-box;
        }
        
        .container {
            width: 90%;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }
        
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
        
        .pt40{
            padding-top: 40px !important;
        }
        
        .pt50{
            padding-top: 50px !important;
        }
        
        .showd{
            display: none;
        }
        
        .showm{
            display: block;
        }
        
        #menucontainer {
            position: fixed;
            left: 100%;
            top: 0;
        }
        
        #header {
            background: #66c5af;
            /* Old browsers */
            background: -moz-linear-gradient(-45deg, #66c5af 0%, #5890a3 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #66c5af 0%, #5890a3 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #66c5af 0%, #5890a3 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#66c5af', endColorstr='#5890a3', GradientType=1);
            /* IE6-9 fallback on horizontal gradient */
/*            height: 100vh;*/
            min-height: 100vh;
            min-width: 100%;
        }
        
        #user,
        #menu {
            padding: 0px 15px;
        }
        
        #menu:hover svg#bars .st1,
        #user:hover svg#users .st0 {
            fill: #001837;
        }
        
        #menu svg#bars,
        #user svg#users {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
            width: 30px;
        }
        
        #menu,
        #user {
            float: right;
            display: inline-block;
            vertical-align: middle;
        }
        
        #intro {
            text-align: center;
        }
        
        #intro h1 {
            text-align: center;
            color: #ededed;
            font-weight: 300;
/*
            font-size: 6vh;
            line-height: 8.5vh;
*/
            font-size: 6vw;
            line-height: 8.5vw;
        }
        
        #intro h1 span {
/*            font-size: 6.4vh;*/
            font-size: 7vw;
            font-weight: 800;
            color: #001837;
        }
        
        #subscribe {
            overflow: hidden;
            width: 80%;
            display: block;
            vertical-align: middle;
            white-space: nowrap;
        }
        
        #subscribe input#subscribeinput {
            width: 100%;
            height: 50px;
/*            background: #2b303b;*/
            background: #29333f;
            border: none;
            font-size: 10pt;
            float: left;
            box-sizing: border-box;
            color: #fff;
            padding-left: 15px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            
            -webkit-transition: all .55s ease;
            -moz-transition: all .55s ease;
            -ms-transition: all .55s ease;
            -o-transition: all .55s ease;
            transition: all .55s ease;
        }
        
        #subscribe input#subscribeinput:focus {
            outline: none;
            background-color: #394959;
        }
        
        #subscribe button.icon {
            -webkit-border-top-right-radius: 3px;
            -webkit-border-bottom-right-radius: 3px;
            -moz-border-radius-topright: 3px;
            -moz-border-radius-bottomright: 3px;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            border: none;
            background: #232833;
            height: 50px;
            width: 100px;
            color: #4f5b66;
            cursor: pointer;
            font-size: 10pt;
            margin-left: -100px;
            -webkit-transition: all .55s ease;
            -moz-transition: all .55s ease;
            -ms-transition: all .55s ease;
            -o-transition: all .55s ease;
            transition: all .55s ease;
        }
        
        #subscribe:hover button.icon,
        #subscribe:active button.icon,
        #subscribe:focus button.icon,
        #subscribe button.icon:focus {
            outline: none;
        }
        
        #subscribe:hover button.icon:hover {
            background: white;
        }

        
        @media (min-width: 1000px) {
            .container {
                width: 1000px;
            } 
        }
        
        @media (min-width: 736px) {
            
            #intro h1 {
                font-size: 35px;
                line-height: 8.5vh;
            }

            #intro h1 span {
                font-size: 45px;
            }
            
            #subscribe input#subscribeinput {
                width: 600px;
            }
            
            #subscribe {
                width: 600px;
            }
            
             body p.introsub {
                font-size: 15px;
                line-height: 25px;
            }
            
            body p.introsub span{
                font-size: 25px;
                line-height: 30px;
            }
        
            .showd{
                display: block;
            }

            .showm{
                display: none;
            }
        }
    </style>

    <div id="menucontainer">

    </div>

    <section id="header">
        <header class="clearfix">
            <a src="#" target="_blank">
                <img src="img/logo.svg" width="70">
            </a>
            <a href="#" id="menu">
                <svg version="1.1" id="bars" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="136 -204 512 512" style="enable-background:new 136 -204 512 512;" xml:space="preserve">
                    <style type="text/css">
                        .st1 {
                            fill: #ededed;
                        }
                    </style>
                    <g>
                        <rect x="136" y="-143" class="st1" width="512" height="50.9" />
                        <rect x="136" y="196.1" class="st1" width="512" height="50.9" />
                        <rect x="136" y="26.6" class="st1" width="512" height="50.9" />
                    </g>
                </svg>
                Menu
            </a>
            <a href="#" id="user">
                <svg version="1.1" id="users" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="136 -204 512 512" style="enable-background:new 136 -204 512 512;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: #ededed;
                        }
                    </style>
                    <path class="st0" d="M573-129c-99.8-99.8-262.3-99.8-362.1,0c-35,35-59,79-69.3,127.2c-10,47-6.7,95.6,9.5,140.7
	c2,5.4,7.9,8.2,13.3,6.3c5.4-2,8.2-7.9,6.3-13.3c-14.9-41.4-17.9-86.1-8.7-129.3c9.5-44.3,31.5-84.7,63.6-116.9
	c91.7-91.7,240.9-91.7,332.6,0C602-70.6,626.4-12.6,627.1,49.2c0.7,61.6-22.2,120.1-64.7,164.8c-0.5,0.5-1,1.1-1.5,1.6
	c-0.9,0.9-1.8,1.9-2.7,2.8c-91.7,91.7-240.9,91.7-332.6,0c-0.5-0.5-1-1-1.4-1.5c0-1,0-1.9,0-2.8c0-2.1,0-4.2,0.1-6.3
	c0-0.7,0.1-1.4,0.1-2.1c0.1-1.4,0.1-2.8,0.2-4.1c0.1-0.8,0.1-1.6,0.2-2.5c0.1-1.2,0.2-2.5,0.3-3.7c0.1-0.9,0.2-1.7,0.3-2.6
	c0.1-1.2,0.3-2.3,0.5-3.5c0.1-0.9,0.3-1.8,0.4-2.7c0.2-1.1,0.4-2.3,0.6-3.4c0.2-0.9,0.4-1.8,0.5-2.7c0.2-1.1,0.4-2.2,0.7-3.3
	c0.2-0.9,0.4-1.8,0.6-2.7c0.3-1.1,0.5-2.2,0.8-3.2c0.2-0.9,0.5-1.8,0.7-2.7c0.3-1.1,0.6-2.1,0.9-3.2c0.3-0.9,0.6-1.8,0.8-2.6
	c0.3-1,0.7-2.1,1-3.1c0.3-0.9,0.6-1.7,0.9-2.6c0.4-1,0.7-2.1,1.1-3.1c0.3-0.9,0.7-1.7,1-2.6c0.4-1,0.8-2,1.2-3
	c0.4-0.9,0.7-1.7,1.1-2.5c0.4-1,0.9-2,1.3-3c0.4-0.8,0.8-1.7,1.2-2.5c0.5-1,1-1.9,1.5-2.9c0.4-0.8,0.8-1.6,1.3-2.4
	c0.5-1,1-1.9,1.6-2.9c0.4-0.8,0.9-1.6,1.4-2.4c0.5-0.9,1.1-1.9,1.7-2.8c0.5-0.8,1-1.6,1.4-2.3c0.6-0.9,1.2-1.8,1.8-2.7
	c0.5-0.8,1-1.5,1.5-2.3c0.6-0.9,1.2-1.8,1.9-2.7c0.5-0.7,1.1-1.5,1.6-2.2c0.6-0.9,1.3-1.8,2-2.6c0.6-0.7,1.1-1.4,1.7-2.1
	c0.7-0.9,1.4-1.7,2.1-2.6c0.6-0.7,1.1-1.4,1.7-2.1c0.7-0.8,1.5-1.7,2.2-2.5c0.6-0.7,1.2-1.3,1.8-2c0.8-0.8,1.5-1.6,2.3-2.4
	c0.6-0.6,1.2-1.3,1.9-1.9c0.8-0.8,1.6-1.6,2.4-2.4c0.6-0.6,1.3-1.2,1.9-1.8c0.8-0.8,1.7-1.6,2.5-2.3c0.6-0.6,1.3-1.2,1.9-1.8
	c0.9-0.8,1.8-1.5,2.7-2.3c0.7-0.6,1.3-1.1,2-1.7c0.9-0.8,1.9-1.5,2.8-2.2c0.7-0.5,1.3-1,2-1.5c1-0.8,2-1.5,3-2.2
	c0.6-0.5,1.3-0.9,1.9-1.4c1.1-0.8,2.3-1.5,3.4-2.3c0.6-0.4,1.1-0.8,1.7-1.1c1.5-1,3-1.9,4.5-2.8c0.2-0.1,0.5-0.3,0.7-0.4
	c1.8-1.1,3.5-2.1,5.3-3.1c0.6-0.3,1.3-0.7,1.9-1c1.2-0.6,2.4-1.3,3.6-1.9c0.8-0.4,1.6-0.8,2.4-1.1c1-0.5,2-1,3-1.4
	c18.9,18,44.1,28.3,70.2,28.3c26.2,0,51.3-10.2,70.2-28.3c36.9,17.1,67,47.7,83.4,84.9c2.3,5.3,8.5,7.7,13.7,5.3
	c5.3-2.3,7.7-8.5,5.3-13.7c-17.9-40.7-49.1-73.3-88.6-92.9c11.5-16.8,17.7-36.7,17.7-57.1c0-56.1-45.7-101.8-101.8-101.8
	c-5.8,0-10.4,4.7-10.4,10.4s4.7,10.4,10.4,10.4c44.6,0,80.9,36.3,80.9,80.9c0,20-7.4,39.2-20.9,54.1c0,0,0,0,0,0
	C436.7,59.2,414.8,69,392,69c-22.8,0-44.7-9.8-60.1-26.8c0,0,0,0,0,0C318.5,27.2,311.1,8,311.1-11.9c0-21.8,8.5-42.2,24-57.5
	c4.1-4,4.1-10.6,0.1-14.7c-4-4.1-10.6-4.1-14.7-0.1c-19.5,19.3-30.2,45-30.2,72.4c0,20.5,6.2,40.3,17.6,57.1
	c-0.1,0.1-0.2,0.1-0.3,0.2c-0.8,0.4-1.6,0.8-2.4,1.3c-1.2,0.6-2.5,1.3-3.7,1.9c-0.9,0.5-1.7,1-2.6,1.4c-1.1,0.6-2.3,1.3-3.4,2
	c-0.9,0.5-1.7,1.1-2.6,1.6c-1.1,0.7-2.2,1.3-3.2,2c-0.9,0.6-1.7,1.1-2.6,1.7c-1,0.7-2.1,1.4-3.1,2.1c-0.9,0.6-1.7,1.2-2.5,1.8
	c-1,0.7-2,1.4-3,2.2c-0.8,0.6-1.7,1.3-2.5,1.9c-1,0.7-1.9,1.5-2.8,2.2c-0.8,0.7-1.6,1.3-2.4,2c-0.9,0.8-1.8,1.6-2.7,2.3
	c-0.8,0.7-1.6,1.4-2.3,2.1c-0.9,0.8-1.8,1.6-2.7,2.4c-0.8,0.7-1.5,1.4-2.3,2.1c-0.9,0.8-1.7,1.7-2.6,2.5c-0.7,0.7-1.5,1.5-2.2,2.2
	c-0.8,0.9-1.7,1.8-2.5,2.7c-0.7,0.7-1.4,1.5-2.1,2.2c-0.8,0.9-1.6,1.9-2.4,2.8c-0.6,0.8-1.3,1.5-1.9,2.3c-0.8,1-1.6,2-2.4,3
	c-0.6,0.7-1.2,1.5-1.8,2.2c-0.8,1.1-1.6,2.2-2.5,3.3c-0.5,0.7-1,1.4-1.5,2.1c-1,1.4-2,2.9-3,4.3c-0.3,0.4-0.5,0.8-0.8,1.1
	c-1.2,1.8-2.4,3.7-3.6,5.6c-0.4,0.6-0.8,1.3-1.2,2c-0.8,1.2-1.5,2.5-2.2,3.8c-0.5,0.8-0.9,1.6-1.3,2.4c-0.6,1.1-1.3,2.3-1.9,3.4
	c-0.5,0.9-0.9,1.7-1.3,2.6c-0.6,1.1-1.1,2.2-1.7,3.4c-0.4,0.9-0.8,1.8-1.3,2.7c-0.5,1.1-1,2.2-1.5,3.4c-0.4,0.9-0.8,1.9-1.2,2.8
	c-0.5,1.1-0.9,2.2-1.4,3.4c-0.4,1-0.7,1.9-1.1,2.9c-0.4,1.1-0.8,2.3-1.3,3.4c-0.3,1-0.7,1.9-1,2.9c-0.4,1.1-0.8,2.3-1.1,3.5
	c-0.3,1-0.6,2-0.9,3c-0.3,1.2-0.7,2.3-1,3.5c-0.3,1-0.5,2-0.8,3c-0.3,1.2-0.6,2.4-0.9,3.6c-0.2,1-0.5,2-0.7,3
	c-0.3,1.2-0.5,2.4-0.8,3.7c-0.2,1-0.4,2-0.6,3c-0.2,1.2-0.4,2.5-0.6,3.8c-0.2,1-0.3,2-0.5,3c-0.2,1.3-0.3,2.6-0.5,3.9
	c-0.1,1-0.3,1.9-0.4,2.9c-0.1,1.4-0.3,2.7-0.4,4.1c-0.1,0.9-0.2,1.8-0.2,2.7c-0.1,1.5-0.2,3.1-0.3,4.6c0,0.8-0.1,1.5-0.1,2.3
	c-0.1,2.3-0.1,4.6-0.1,7c0,2.5,0.1,4.9,0.2,7.5c0,0.6,0.1,1.2,0.2,1.8c0,0,0,0.1,0,0.1c0.1,0.6,0.3,1.1,0.5,1.6c0,0.1,0,0.1,0.1,0.2
	c0.2,0.5,0.5,1,0.8,1.5c0,0.1,0.1,0.1,0.1,0.2c0.3,0.5,0.7,0.9,1,1.3c0,0,0,0.1,0.1,0.1l1.4,1.5c1,1.1,2.1,2.2,3.2,3.3
	c49.9,49.9,115.5,74.9,181,74.9s131.1-25,181-74.9c1.1-1.1,2.1-2.2,3.2-3.3l1.4-1.5C623.8,179.7,648.8,116,648,48.9
	C647.2-18.3,620.6-81.5,573-129z" />
                </svg>
                Login
            </a>
        </header>

        <!--end header and logo-->
        <div class="container">

            <div id="intro">
                <h1>
                We're building <br>
                <span>a revolutionary health insurance</span><br>
                for Thailand.
                </h1>
                
                <p class="introsub pt50">One big coverage amount that you can use at your hospital of choice, for all medical treatments.
                <span>Starting from <br class="showm">
                10,000 baht per year.</span>
                Sign up to be the first to know when we launch</p>
                
                <form id="subscribe" class="center" method="POST" action="mail.php">
                    <input type="email" name="email" id="subscribeinput" placeholder="Enter your Email" />
                    <button class="icon" type="submit" form="subscribe" value="Submit">Subscribe</button>
                </form>    
            </div>

        </div>
        <!--end container-->

    </section>
    <!-- header section-->


    <!--<section id="things">
        <div class="container">
            <h2>Things we do</h2>
            <p class="subtitle">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor fermentum tortor sit amet hendrerit.
            </p>
            
            

        </div>
        <!--end container-->
    <!--</section>
    <!--end things section-->
</body>

</html>