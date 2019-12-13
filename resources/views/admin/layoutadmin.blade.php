<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        *{
            font-family: "Calibri Light";
            margin: 0px;
            padding: 0px;
        }
        /* Style the header with a grey background and some padding */
        .header {
            display: flex;
            overflow: hidden;
            background-color: #F37A71;
            width: 100%;
        }

        /* Style the header links */
        .header a, .rightheader .datediv{
            float: left;
            color: white;
            text-align: center;
            padding: 10px 5px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 4px;
            margin: 0px 10px;
        }
        /* Change the background color on mouse-over */
        .menu:hover{
            background-color: white;
            color: #F37A71;
        }

        /* The dropdown container */
        .dropdown {
            width: fit-content;
            height: 0px;
        }

        /* Dropdown button */
        .dropbtn {
            font-size: 14px;
            border: none;
            outline: none;
            color: white;
            padding: 10px 5px;
            background-color: #F37A71;
            border-radius: 4px;
            margin: 0px 10px;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            padding: 2px;
            display: none;
            position: absolute;
            background-color: white;
            min-width: 150px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
        }


        /* Links inside the dropdown */
        .dropdown-content a {
            float: none;
            color: #F37A71;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            border-radius: 4px;
        }

        .dropdown-content a:hover{
            float: none;
            color: #ffffff;
            text-decoration: none;
            display: block;
            text-align: left;
            border-radius: 4px;
            background-color: #F37A71;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            margin-left: 10px;
            display: block;
        }

        i {
            border: solid black;
            border-width: 0 2px 2px 0;
            display: inline-block;
            padding: 2px;
            border-color: white;
            margin-bottom: 2px;
        }
        .down {
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
        }
        .dropbtn:hover i{
            border-color: #F37A71;
        }
        .rightheader{
            display: flex;
            justify-content: flex-end;
            padding-right: 100px;
            width: 50%;
        }
        .leftheader{
            display: flex;
            justify-content: flex-start;
            width: 50%;
            padding-left: 100px;
        }

        .messagealert, .messagealertdanger{
            padding-top: 10px;
        }

        .alert-success{
            display: block;
            font-size: 20px;
            background-color: aquamarine;
            width: 500px;
            height: 50px;
            text-align: center;
            color: #228B22;
            font-weight: bold;
            padding-top: 22px;
            border-style: solid;
            border-color: #38c172;
            border-radius: 10px;
        }

        .alert-danger{
            display: block;
            font-size: 20px;
            background-color: #ffb2b2;
            width: 500px;
            height: 50px;
            text-align: center;
            color: #e3342f;
            font-weight: bold;
            padding-top: 22px;
            border-style: solid;
            border-color: #e3342f;
            border-radius: 10px;
        }

        .insertbtn{
            color: white;
            text-align: center;
            padding: 10px 5px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 4px;
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: #F37A71;
            border: 1px solid #F37A71;
        }
        .insertbtn:hover{
            background-color: white;
            color: #F37A71;
            border: 1px solid #F37A71;
        }
        .content{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .content hr{
            margin-top: 10px;
            margin-bottom: 10px;
            width: 80%;
            border: solid #F37A71 1px;
        }
        .content #title{
            margin-top: 20px;
            font-size: 50px;
            color: #F37A71;
        }
        #date{
            font-family: "Sitka Banner", serif;
        }

        .rem{
            max-width: 500px;
            padding: 10px 0px 0px 142px;
            font: 13px Arial, Helvetica, sans-serif;
        }

        .form-insert{
            max-width: 500px;
            padding: 20px 12px 10px 20px;
            font: 13px Arial, Helvetica, sans-serif;
        }
        .form-insert label{
            display: block;
            margin: 0px 0px 15px 0px;
        }
        .form-insert label > span{
            width: 116px;
            font-weight: bold;
            float: left;
            padding-top: 8px;
            padding-right: 5px;
            margin-right: 20px;
            text-align: right;
            font-size:16px;
        }

        .form-insert tr{
            display: block;
            margin: 0px 0px 15px 0px;
        }

        .form-insert td > span{
            width: 100px;
            font-weight: bold;
            float: left;
            padding-top: 8px;
            padding-right: 5px;
            margin-right: 20px;
            text-align: right;
            font-size:16px;
        }

        .form-insert td > input{
            width: 300px;
            font-weight: lighter;
            float: left;
            padding-top: 8px;
            padding-right: 5px;
            padding-left: 8px;
            margin-right: 10px;
            margin-left: 10px;
            text-align: left;
            font-size:16px;
        }

        .form-insert input.input-field, .form-insert .select-field{
            width: 48%;
        }

        .namedes{
            padding-top: 15px;
        }

        .detailorder .d1{
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        .detailorder{
            display: flex;
        }

        .name{
            padding-top: 10px;
            font-size: 22px;
            font-weight: bold;
            padding-left: 10px;
        }

        .form-insert .input-search{
            box-sizing: border-box;
            border: 1px solid #C2C2C2;
            box-shadow: 1px 1px 4px #EBEBEB;
            border-radius: 7px;
            padding: 7px;
            width: 350px;
            height: 37px;
            outline: none;
            margin-right: 15px;
        }

        .des{
            padding-left: 10px;
            max-height: 100px;
            overflow: auto;
        }

        .buttonhome{
            display: inline;
        }

        .form-insert input.input-field,
        .form-insert .textarea-field,
        .form-insert .select-field{
            box-sizing: border-box;
            border: 1px solid #C2C2C2;
            box-shadow: 1px 1px 4px #EBEBEB;
            border-radius: 3px;
            padding: 7px;
            width: 300px;
            outline: none;
        }
        .form-insert .input-field:focus,
        .form-insert .textarea-field:focus,
        .form-insert .select-field:focus{
            border: 1px solid #F37A71;
        }
        .form-insert .textarea-field{
            height:135px;
            width: 60%;
        }

        .form-insert input[type=submit],
        .detailorder input[type=submit],
        .form-insert button,
        .form-insert input[type=button]{
            border: solid #F37A71 1px;
            padding: 5px 15px 5px 15px;
            background: #F37A71;
            color: #fff;
            font-size: 20px;
            box-shadow: 1px 1px 4px #DADADA;
            border-radius: 6px;
            width: 100px;
            margin-bottom: 10px;
        }
        .form-insert input[type=submit]:hover,
        .form-insert button:hover,
        .detailorder input[type=submit]:hover{
            background: white;
            color: #F37A71;
            border-color: #F37A71;
            cursor: pointer;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            opacity: 1;
        }

        .radio-group{
            padding-top: 13px;
            font-family: "Helvetica";
            font-size: 15px;
        }

        .forgot{
            text-decoration: none;
            font-size: 15px;
            color: #3490dc;
            padding-left: 152px;
            padding-bottom: 15px;
        }

        .submit{
            display: flex;
            justify-content: center;
        }

        form.search input[type=text] {
            padding: 5px;
            font-size: 17px;
            border: 1px solid #F37A71;
            float: left;
            width: 300px;
            background: white;
            margin-right: 10px;
            border-radius: 7px;
        }
        form.search button {
            float: left;
            width: 100px;
            padding: 5px;
            background: #F37A71;
            color: white;
            font-size: 17px;
            border: 1px solid #F37A71;
            border-radius: 7px;
            cursor: pointer;
        }
        form.search button:hover {
            background: white;
            color: #F37A71;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="leftheader">
        <a href="/homepage" class="logo">Online Florist</a>
        <a href="#home" class="menu">Profile</a>
        <div class="dropdown">
            <button href="#contact" class="menu dropbtn">
                Admin Menu
                <i class="arrow down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/homepage">Home Page</a>
                <a href="/admin/flowers">Manage Flower</a>
                <a href="/admin/flowers/type">Manage Flower Type</a>
                <a href="/admin/couriers">Manage Courier</a>
                <a href="/cart">Cart</a>
            </div>
        </div>
    </div>
    <div class="rightheader">
        <div class="datediv"><p id="date"></p></div>
        <div class="dropdown">
            <button href="#contact" class="menu dropbtn">
                {{Session::get('username')}}
                <i class="arrow down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Profile</a>
                <a href="{{url('/logout')}}">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    @section('contents')
    @show()
    <hr>
</div>
</body>
<script>
    function updateTime() {
        n =  new Date();
        y = n.getFullYear();
        m = n.getMonth();
        d = n.getDay();
        h = n.getHours();
        minute = n.getMinutes();
        second = n.getSeconds();
        var month = new Array();
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Aug";
        month[8] = "Sep";
        month[9] = "Oct";
        month[10] = "Nov";
        month[11] = "Dec";
        var day = new Array();
        day[0] = "Sun";
        day[1] = "Mon";
        day[2] = "Tue";
        day[3] = "Wed";
        day[4] = "Thu";
        day[5] = "Fri";
        day[6] = "Sat";
        var dtString = h + ":" + minute + ":" + second + " " + month[m] + "/" + day[d] + "/" + y;;
        document.getElementById("date").innerHTML = dtString
        setTimeout(updateTime,1000);
    }
    updateTime();
</script>
</html>
