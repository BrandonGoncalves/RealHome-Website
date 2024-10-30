<?php 
session_start();
include('loginandregisterconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="title" content="RealHome">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="Author" content="Brandon Goncalves">
            <link rel="stylesheet" type="text/css" href="./HomePage.css">
            <title>Real Home | Home Page</title>
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
        <h1 class="homepageheading">Find Your Dream Property</h1>
        <br/>
        <div class="buypropertybox">
            <h1 class="buypropertyheading">Buy Property</h1>
            <div class="propertycontainer">
                <div class="property">
                    <img src="./Buyproperty1.jpg" alt="Buy Property 1" class="Propertyimage"/>
                    <div class="propertycontent">
                        <h3>3 Bedroom House in Fleurhof</h3>
                        <h4>R1 199 000</h4>
                        <h4><b>Roodepoort</b></h4>
                        <h5>29 Ketel Avenue, Fleurhof, Roodepoort</h5>
                        <h5>3 Bedroom</h5>
                        <h5>2 Bathroom</h5>
                        <p>
                            This 3 Bedroom and 2 Bathroom house ensures ample space for your family. This home is designed for easy maintenance and has open spaces allowing for effortless cleaning and organisation.
                        </p>
                    </div>
                </div>
                <div class="property">
                    <img src="./Buyproperty2.jpg" alt="Buy Property 2" class="Propertyimage"/>
                    <div class="propertycontent">
                        <h3>3 Bedroom Farm in Elandsvlei</h3>
                        <h4>R800 000</h4>
                        <h4><b>Randfontein</b></h4>
                        <h5>Elandsvlei 249-Iq, Randfontein, 1759</h5>
                        <h5>3 Bedroom</h5>
                        <h5>2 Bathroom</h5>
                        <p>
                            This lovely farm with a beautiful family home set features a beautiful kitchen, has 3 Bedrooms and 2 Bathrooms in place. This is a charming flatlet with it's own entrance, offers a spacious kitchen, lounge area and a bathroom with a toilet, basin and a shower.
                        </p>
                    </div>
                </div>
                <div class="property">
                    <img src="./Buyproperty3.png" alt="Buy Property 3" class="Propertyimage"/>
                    <div class="propertycontent">
                        <h3>2 Bedroom Apartment in Six Fountains Estate</h3>
                        <h4>R1 599 000</h4>
                        <h4><b>Pretoria</b></h4>
                        <h5>Six Fountains Residential Estate, Pretoria</h5>
                        <p>
                            This beautiful 2 Bedroom apartment in Six Fountains Security Estate, this is a stunning unit boasting 2 Bedrooms and has 2 Bathrooms in this lovely unit. This property has open-plan kitchen equipped with a gas stove for easy cooking and has a spacious living area perfect for your family and even guests.
                        </p>
                    </div>
                </div>
            </div>
            <a href="buyproperty.php">
                <button class="seemore">See All</button>
            </a>
        </div>
        <br/>
        <h1 class="homepageheading">Rent out your Dream Property</h1>
        <br/>
        <div class="rentpropertybox">
            <h1 class="rentpropertyheading">Rent Property</h1>
            <div class="propertycontainer">
                <div class="property">
                    <img src="./rentproperty1.jpg" alt="Rent Property 1" class="Propertyimage"/>
                    <div class="propertycontent">
                        <h3>Apartment Property</h3>
                        <h4>R6,999.00</h4>
                        <h4><b>Pretoria</b></h4>
                        <h5>Corner Palace & Church Street, Church Square, Pretoria</h5>
                        <p>
                            This lovely apartment building is an amazing family residence. This apartment property has two bedrooms, and one and a half bathrooms, perfect for you and your family.
                            Not only is this apartment spacious for your family, it gives you enough space for your living necessities. The location of this apartment is also in a safe and suitable area, where
                            there are the best, thoughtful and extremely kind neighbours.
                        </p>
                    </div>
                </div>
                <div class="property">
                    <img src="./rentproperty2.jpg" alt="Rent Property 2" class="Propertyimage"/>
                    <div class="propertycontent">
                        <h3>Roodepoort Property</h3>
                        <h4>R14,299.00</h4>
                        <h4><b>Roodepoort</b></h4>
                        <h5>Roodepoort Central, Roodepoort, Gauteng</h5>
                        <p>
                            This Roodepoort central house for rent, is fitted with three bedrooms and two bathrooms, which is an amazing size for you and your family to live comfortably. This property
                            has a big, cozy TV room and a garage for the space of two vehicles. This is a really big house for you and your family to live in, not only does it provide a spacious
                            living quarter, it provides comfort and room for a happy life. This property is best suited for you and your family.
                        </p>
                    </div>
                </div>
                <div class="property">
                    <img src="./rentproperty3.png" alt="Rent Property 3" class="Propertyimage"/>
                    <div class="propertycontent">
                        <h3>Finsbury Property</h3>
                        <h4>R9,000.00</h4>
                        <h4><b>Randfontein</b></h4>
                        <h5>Finsbury, Randfontein, Gauteng</h5>
                        <p>
                            This Finsbury home for rent is the best for your family, as it has three bedrooms, and it has two bathrooms. This house is also fitted with a 
                            dining room, a nice lounge for you and your family, a garage fitting one car, a nice spacious kitchen, and a beautiful garden. This is a comfortable home, 
                            that you and your family will enjoy, not only is it a beautiful home, there are charming neighbours and the street is quiet and lovely for families.
                        </p>
                    </div>
                </div>
            </div>
            <a href="rentproperty.php">
                <button class="seemore">See All</button>
            </a>
        </div>
        <br/>
        <h1 class="homepageheading">Sell or Rent out your Property, and help others find their Dream Home</h1>
        <br/>
        <div class="sellpropertybox">
            <h1 class="sellpropertyheading">Sell or Rent Property</h1>
            <div class="propertycontainer">
                <div class="sellsteps">
                    <div class="propertycontent">
                        <h1><u>Step 1: Register as an Agent</u></h1>
                        <hr/>
                        <p>
                            To start of selling your lovely property on the RealHome website, you need to firstly register yourself as an agent/seller. This is important as it grants you access on our platform
                            to sell your amazing property here. This also allows people to view your contact information in the case that they want to purchase your property.
                        </p>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <img src="./agent-sellericon.png" alt="Agent/Seller Icon" class="sellicons"/>
                    </div>
                </div>
                <div class="sellsteps">
                    <div class="propertycontent">
                        <h1><u>Step 2: Upload all your pictures of your property</u></h1>
                        <hr/>
                        <p>
                            You then need to upload pictures of your property, this is important as it allows people to see your amazing property, and it helps people determine if that is their dream home.
                            You need to ensure that you upload enough pictures of your property so people can make an informed decision.
                        </p>
                        <br/>
                        <br/>
                        <img src="./houseicon.png" alt="Home icon" class="sellicons"/>
                    </div>
                </div>
                <div class="sellsteps">
                    <div class="propertycontent">
                        <h1><u>Step 3: Add all necessary information on your property and submit</u></h1>
                        <hr/>
                        <p>
                            This is the most important part, you need to add all the information of your property, meaning you explain the detailing of your property, such as bedroom amount and bathroom amount.
                            After adding all necessary information, you press submit and your property is now being listed on the RealHome platform!
                        </p>
                        <img src="./checkicon.png" alt="Check mark icon" class="sellicons"/>
                    </div>
                </div>
            </div>
            <a href="sellproperty.php">
                <button class="seemore">See All</button>
            </a>
        </div>
        <br/>
        <script>

        </script>
        <footer>
            <p id="footerinformation"><b>&copy; RealHome. All Rights Reserved.<br/>
                Brandon Goncalves, 20240835</b>
            </p>
        </footer>
    </body>
</html>