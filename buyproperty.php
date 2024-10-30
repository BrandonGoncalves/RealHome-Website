<!DOCTYPE html>
<html lang="en">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="title" content="RealHome">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="Author" content="Brandon Goncalves">
            <link rel="stylesheet" type="text/css" href="./buyproperty.css">
            <title>Real Home | Buy Property Page</title>
    </head>
    <body>
        <header>
        <br/>
            <img src="./RealHome.webp" class="realhomelogo" alt="RealHome logo Icon">
            <br/>
            <nav>
                <div class="navbar">
                    <a href="HomePage.php" class="navlink">Home</a>
                    <div class="dropdown">
                        <button class="dropbutton">Property Listings<i class="fa fa-caret-down"></i></button>
                        <div class="dropdowncontent">
                            <a href="buyproperty.php.">Buy</a>
                            <a href="rentproperty.php">Rent</a>
                            <a href="sellproperty.php">Sell</a>
                        </div>
                    </div>
                    <a href="agents.php" class="navlink">Agents</a>
                    <a href="favourites.php" class="navlink">Favourites</a>
                    <a href="wishlist.php" class="navlink">Wishlist</a>
                    <div class="dropdown-account">
                        <button class="dropbutton">Account<i class="fa fa-caret-down"></i></button>
                        <div class="dropdown-accountcontent">
                          <a href="RealHomeLogin.php" id="login">Login</a> 
                          <a href="RealHomeLogin.php" id="register">Register</a> 
                          <a href="realhomelogout.php" id="logout">Logout</a> 
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <br/>
        <h1 class="buypropertyheading">Buy your Dream Property</h1>
        <div id="searchcontainer">
            <form action="" id="searchbarform">
                <input type="text" placeholder="Search Property" name="Searchbar">
                <button type="submit"><img src="./searchicon.png"></button>
            </form>
        </div>
        <div class="filterfunction">
            <select id="locationfilter">
                <option value="">Select Location</option>
                <option value="Randfontein">Randfontein</option>
                <option value="Pretoria">Pretoria</option>
                <option value="Krugersdorp">Krugersdorp</option>
                <option value="Randburg">Randburg</option>
                <option value="Roodepoort">Roodepoort</option>
            </select>
        </div>
        <div class="filterfunction">
            <select id="pricefilter">
                <option value="">Select Price Range</option>
                <option value="All">All</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="filterfunction">
            <select id="propertytypefilter">
                <option value="">Select Property Type</option>
                <option value="House">House</option>
                <option value="Apartment">Apartment</option>
                <option value="Farm">Farm</option>
            </select>
        </div>
        <hr/>
        <br/>
        <div class="buypropertybox">
            <h1 class="buycontainerheading">Buy Property</h1>
            <div class="propertycontainer">
            </div>
        </div>
        <br/>
        <div id="popup" class="popup" style="display:none;">
        <button class="close-button" onclick="closePopup()">✖</button>
            <div class="buypropertyboxdetails">
            <h1 class="buypropertyheading">Property Details</h1>
                <div class="popup-container">
                    <div class="popup-content"></div>
                </div>
            </div>
        </div>
        <script src="./buyproperty.js"></script>
        <footer>
            <p id="footerinformation"><b>&copy; RealHome. All Rights Reserved.<br/>
                Brandon Goncalves, 20240835</b>
            </p>
        </footer>
    </body>
</html>