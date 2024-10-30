<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="title" content="RealHome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Brandon Goncalves">
    <link rel="stylesheet" type="text/css" href="./sellproperty.css">
    <title>Real Home | Sell or Rent Property Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <a href="buyproperty.php">Buy</a>
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

    <section class="sellheadsection">
        <br/>
        <h1 class="sellpropertyheading">Sell or Rent your property to make someone's Dream Property a Reality</h1>
        <br/><br/>
        <h2 class="sellsubheading">How the Sell or Rent feature works</h2>
        <br/><br/>
        <p class="sellheadinformation">
            <b>Sell or rent out your property to a willing user on the RealHome website. Make someone's dream a reality by selling or renting out your valued property to a willing user and make their living needs a reality. People need you to help make a difference in their life. By selling or renting out your property to a willing person, you make their family a happy one. This make all their living needs come to life, as they will now feel as they have bought their dream home, which is the best thing you can do for a person.</b>
        </p>
        <br/><br/>
        <p class="sellheadinformation">
            <b>To sell or rent out your property on the RealHome website is extremely simple, you need to just gather all required information on your property. Then you need just decide on whether or not you want to sell your property overall, or you make the decision on whether or not you want to just rent your property out to people that find your property as their dream home. Make someone's day, year and life by listing your open property, and make sure a family has their dream home to raise their family, and live the happiest life they have dreamed about.</b>
        </p>
        <br/><br/>
        <p class="sellheadinformation">
            <b>The steps are simple, first register your account on the RealHome platform as an agent/seller. After doing this crucial step, you have to make sure you have taken images of your property, this is so it can be displayed on our website for our users to see your lovely property, thus allowing users to decide whether or not it is their dream home. After this, you need to write about your property, this is crucial information about your property, such as bedroom amount, bathroom amount and how the property overall is, this allows the users to know what the property is like, even without having been to this property, it can give them a home feeling. Once you have done all of this, you can submit it and your property will be listed on our website!</b>
        </p>
        <br/><br/>
    </section>

    <section class="sellRentsection">
        <br/>
        <h1 class="sellheading">List your property for Sale</h1>
        <div class="formcontainer">
            <form id="sellForm" action="submit_property.php" method="POST" enctype="multipart/form-data">
                <label for="sellName">Name of Property for Sale:</label>
                <input type="text" id="sellName" name="sellName" placeholder="Enter the name of the property..." required>

                <label for="sellPrice">Selling Price:</label>
                <input type="number" id="sellPrice" name="sellPrice" placeholder="Enter the amount..." required>

                <label for="sellAddress">Address of Property:</label>
                <input type="text" id="sellAddress" name="sellAddress" placeholder="Address of the property" required>

                <label for="sellLocation">Location:</label>
                <select id="sellLocation" name="sellLocation" required>
                    <option value="">Select the property location:</option>
                    <option value="Randfontein">Randfontein</option>
                    <option value="Pretoria">Pretoria</option>
                    <option value="Krugersdorp">Krugersdorp</option>
                    <option value="Randburg">Randburg</option>
                    <option value="Roodepoort">Roodepoort</option>
                </select>

                <label for="sellImages">Upload the property images:</label>
                <input type="file" id="sellImages" name="sellImages[]" multiple accept="image/*" required>
                <button type="submit">Submit for Sale</button>
            </form>
        </div>

        <h1 class="sellheading">List your property for Rent</h1>
        <div class="formcontainer">
            <form id="rentForm" action="submit_property.php" method="POST" enctype="multipart/form-data">
                <label for="rentName">Name of Property for Rent:</label>
                <input type="text" id="rentName" name="rentName" placeholder="Enter the name of the property..." required>

                <label for="rentPrice">Renting Price:</label>
                <input type="number" id="rentPrice" name="rentPrice" placeholder="Enter the amount..." required>

                <label for="rentAddress">Address of Property:</label>
                <input type="text" id="rentAddress" name="rentAddress" placeholder="Address of the property" required>

                <label for="rentLocation">Location:</label>
                <select id="rentLocation" name="rentLocation" required>
                    <option value="">Select the property location:</option>
                    <option value="Randfontein">Randfontein</option>
                    <option value="Pretoria">Pretoria</option>
                    <option value="Krugersdorp">Krugersdorp</option>
                    <option value="Randburg">Randburg</option>
                    <option value="Roodepoort">Roodepoort</option>
                </select>

                <label for="rentImages">Upload the property images:</label>
                <input type="file" id="rentImages" name="rentImages[]" multiple accept="image/*" required>
                <button type="submit">Submit for Rent</button>
            </form>
        </div>
    </section>

    <script>
    $(document).ready(function() { //This is called ajax code (it is JavaScript) and this is to send an alert upon submission of the property, I needed this in my website to ensure that users know that their property has been submitted and will be reviewed for sale or for rent
        $('#sellForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            
            var formData = new FormData(this); // Create FormData object
            
            $.ajax({
                url: 'submit_property.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Property submitted for sale successfully!');
                    $('#sellForm')[0].reset(); // Resets the form so the old uploaded information is not kept there after submission, so another property can be submitted without having to backspace and delete the old information in the input fields
                },
                error: function() {
                    alert('An error occurred while submitting the property.');
                }
            });
        });

        $('#rentForm').on('submit', function(e) {
            e.preventDefault(); 
            
            var formData = new FormData(this); 
            
            $.ajax({
                url: 'submit_property.php',
                type: 'POST',
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(response) {
                    alert('Property submitted for rent successfully!');
                    $('#rentForm')[0].reset(); 
                },
                error: function() {
                    alert('An error occurred while submitting the property.');
                }
            });
        });
    });
    </script>

    <footer>
        <p id="footerinformation"><b>&copy; RealHome. All Rights Reserved.<br/> Brandon Goncalves, 20240835</b></p>
    </footer>
</body>
</html>
