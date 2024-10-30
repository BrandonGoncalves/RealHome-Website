<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="title" content="RealHome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Brandon Goncalves">
    <link rel="stylesheet" type="text/css" href="./favourites.css">
    <title>Real Home | Favourites Page</title>
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
    <br/>
    <h1 class="favouritesheading">Your Favourited Properties</h1>
    <br/>
    <div class="favouritebox">
        <h1 class="favouriteboxheading">Favourites</h1>
        <div class="favouritecontainer" id="favourite-container"></div>
    </div>
    <br/>
    <footer>
        <p id="footerinformation"><b>&copy; RealHome. All Rights Reserved.<br/>
            Brandon Goncalves, 20240835</b>
        </p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetchFavourites();
        });

        async function fetchFavourites() {
            try {
                const response = await fetch('get_favourites.php');
                if (!response.ok) throw new Error('Network response was not okay');

                const jsonResponse = await response.json();
                displayFavourites(jsonResponse);
            } catch (error) {
                console.error('Error fetching favourites:', error);
            }
        }

        function displayFavourites(favourites) {
    const container = document.getElementById('favourite-container');
    container.innerHTML = '';

    if (favourites.error) {
        container.innerHTML = '<p>No favourites found.</p>';
        return;
    }

    if (!Array.isArray(favourites)) {
        console.error('Favourites is not an array:', favourites);
        container.innerHTML = '<p>Error retrieving favourites.</p>';
        return;
    }

    favourites.forEach(rental => {
        let images = [];
        if (rental.images) {
            try {
                images = JSON.parse(rental.images);
            } catch (e) {
                console.error(`Error parsing images for rental ID ${rental.id}:`, e);
            }
        }

        const propertyDiv = document.createElement('div');
        propertyDiv.className = 'property';
        propertyDiv.innerHTML = `
            <div class="propertycontent">
                <h3>${rental.title}</h3>
                <h4>${rental.price}</h4>
                <h4><b>${rental.location}</b></h4>
                <h5>${rental.address}</h5>
                <h5>${rental.bedrooms} Bedrooms</h5>
                <h5>${rental.bathrooms} Bathrooms</h5>
                <p>${rental.description}</p>
                <button onclick="removeFromFavourites(${rental.id})" class="remove-favourite-button">Remove from Favourites</button>
            </div>
        `;
        container.appendChild(propertyDiv);
    });
}


        function removeFromFavourites(favouriteId) {
    console.log('Removing favourite with ID:', favouriteId); // Debug log to check ID
    fetch('remove_favourite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: favouriteId }), // Ensure this matches what PHP expects
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        if (data.error) {
            console.error('Error removing favourite:', data.error);
        } else {
            console.log('Successfully removed:', data);
            fetchFavourites(); // Refresh the favourites display after successful removal
        }
    })
    .catch(error => {
        console.error('Error removing favourite:', error);
    });
}

    </script>
</body>
</html>
