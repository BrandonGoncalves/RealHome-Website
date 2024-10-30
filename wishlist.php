<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="title" content="RealHome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Brandon Goncalves">
    <link rel="stylesheet" type="text/css" href="./wishlist.css">
    <title>Real Home | Wishlist Page</title>
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
    <h1 class="wishlistheading">Your Wishlist Properties</h1>
    <br/>
    <div class="wishlistbox">
        <h1 class="wishlistboxheading">Wishlist</h1>
        <div class="wishlistcontainer" id="wishlist-container"></div>
    </div>
    <br/>
    <footer>
        <p id="footerinformation"><b>&copy; RealHome. All Rights Reserved.<br/>
            Brandon Goncalves, 20240835</b>
        </p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetchWishlist();
        });

        async function fetchWishlist() {
            try {
                const response = await fetch('get_wishlists.php');
                if (!response.ok) throw new Error('Network response was not okay');

                const jsonResponse = await response.json();
                displayWishlist(jsonResponse);
            } catch (error) {
                console.error('Error fetching wishlist:', error);
            }
        }

        function displayWishlist(wishlists) {
    const container = document.getElementById('wishlist-container');
    container.innerHTML = '';

    if (wishlists.error) {
        container.innerHTML = '<p>No wishlists found.</p>';
        return;
    }

    if (!Array.isArray(wishlists)) {
        console.error('Wishlists is not an array:', wishlists);
        container.innerHTML = '<p>Error retrieving wishlists.</p>';
        return;
    }

    wishlists.forEach(property => {
        let images = [];
        if (property.images) {
            try {
                images = JSON.parse(property.images);
            } catch (e) {
                console.error(`Error parsing images for property ID ${property.id}:`, e);
            }
        }

        const propertyDiv = document.createElement('div');
        propertyDiv.className = 'property';
        propertyDiv.innerHTML = `
            <div class="propertycontent">
                <h3>${property.title}</h3>
                <h4>${property.price}</h4>
                <h4><b>${property.location}</b></h4>
                <h5>${property.address}</h5>
                <h5>${property.bedrooms} Bedrooms</h5>
                <h5>${property.bathrooms} Bathrooms</h5>
                <p>${property.description}</p>
                <button onclick="removeFromWishlist(${property.id})" class="remove-wishlist-button">Remove from Wishlist</button>
            </div>
        `;
        container.appendChild(propertyDiv);
    });
}


        function removeFromWishlist(wishlistId) {
    console.log('Removing wishlist with ID:', wishlistId); // Debug log to check ID
    fetch('remove_wishlist.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: wishlistId }), // Ensure this matches what PHP expects
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        if (data.error) {
            console.error('Error removing wishlist:', data.error);
        } else {
            console.log('Successfully removed:', data);
            fetchWishlist(); // Refresh the favourites display after successful removal
        }
    })
    .catch(error => {
        console.error('Error removing wishlist:', error);
    });
}

    </script>
</body>
</html>
