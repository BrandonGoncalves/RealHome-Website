let rentals = []; // Global variable to hold properties

async function fetchRentals() {
    try {
        const response = await fetch('get_rentproperties.php');
        if (!response.ok) throw new Error('Network response was not ok');

        const jsonResponse = await response.json();
        rentals = jsonResponse; // Store properties globally

        rentals.forEach(rental => {
            rental.currentImageIndex = 0; // Initialize currentImageIndex for each rental
        });

        displayRentals(rentals);
    } catch (error) {
        console.error('Error fetching rentals:', error);
    }
}

function displayRentals(rentals) {
    const container = document.querySelector('.propertycontainer');
    container.innerHTML = ''; // Clear the container

    if (rentals.length === 0) {
        container.innerHTML = '<p>No rentals available.</p>';
        return;
    }

    rentals.forEach(rental => {
        let images = [];
        if (rental.images) {
            try {
                images = JSON.parse(rental.images); // Parse the images from JSON
            } catch (e) {
                console.error(`Error parsing images for rental ID ${rental.id}:`, e);
            }
        }

        const propertyDiv = document.createElement('div');
        propertyDiv.className = 'property';
        propertyDiv.innerHTML = `
            <div class="slideshow-container">
                <button onclick="prevImage(${rental.id})">❮</button>
                <img id="image-${rental.id}" src="Rentimages/${images[0] || ''}" alt="Property Image" class="PropertyImage"/>
                <button onclick="nextImage(${rental.id})">❯</button>
            </div>
            <div class="propertycontent">
                <h3>${rental.title}</h3>
                <h4>${rental.price}</h4>
                <h4><b>${rental.location}</b></h4>
                <h5>${rental.address}</h5>
                <h5>${rental.bedrooms}</h5>
                <h5>${rental.bathrooms}</h5>
                <p>${rental.description}</p>
                <button onclick="showPopup(${rental.id})" class="propertybutton">Read More</button>
                <button onclick="removeRental(${rental.id})" class="remove-button">Remove</button>
                <button onclick="addFavourite(${rental.id})" class="favourite-button">Add to Favourites</button>
            </div>
        `;
        container.appendChild(propertyDiv);
    });
}

function removeRental(id) {
    const index = rentals.findIndex(rental => rental.id === id);
    if (index > -1) {
        rentals.splice(index, 1); // Remove from the array
        displayRentals(rentals); // Refresh the displayed properties
    }
}

// Image navigation functions
function prevImage(id) {
    const rental = rentals.find(p => p.id === id);
    const images = JSON.parse(rental.images || '[]');
    rental.currentImageIndex = (rental.currentImageIndex - 1 + images.length) % images.length;
    document.getElementById(`image-${id}`).src = `Rentimages/${images[rental.currentImageIndex]}`;
}

function nextImage(id) {
    const rental = rentals.find(p => p.id === id);
    const images = JSON.parse(rental.images || '[]');
    rental.currentImageIndex = (rental.currentImageIndex + 1) % images.length;
    document.getElementById(`image-${id}`).src = `Rentimages/${images[rental.currentImageIndex]}`;
}

// Popup functions
function showPopup(id) {
    const rental = rentals.find(r => r.id === id);
    const popupContent = `
        <h2>${rental.title}</h2>
        <p><b>Price:</b> ${rental.price}</p>
        <p><b>Description:</b> ${rental.description}</p>
        <p><b>Agency:</b> ${rental.agent}</p>
        <p><b>Contact Us:</b><br/>
        <a href="mailto: ${rental.agentemail}">${rental.agentemail}</a></p>
        ${rental.googlemap}
    `;
    const popup = document.getElementById('popup');
    popup.querySelector('.popup-content').innerHTML = popupContent; // Inject content
    popup.style.display = 'flex'; // Show the popup
    document.body.style.overflow = 'hidden';
}

function closePopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none'; // Hide the popup
    document.body.style.overflow = 'auto';
}

// Filter functions and event listeners
function priceFilter(price, filter) {
    const priceValue = parseInt(price.replace('R', '').replace(/\s/g, ''));
    if (filter === 'Low') return priceValue < 7000;
    if (filter === 'Medium') return priceValue >= 7000 && priceValue < 8000;
    if (filter === 'High') return priceValue >= 8000;
    return true;
}

document.getElementById('searchbarform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent page refresh
    const searchQuery = event.target.elements.Searchbar.value.toLowerCase();
    const filteredRentals = rentals.filter(rental => rental.location.toLowerCase().includes(searchQuery));
    displayRentals(filteredRentals);
});

document.getElementById('locationfilter').addEventListener('change', function() {
    const selectedLocation = this.value;
    const filteredRentals = rentals.filter(rental => rental.location === selectedLocation || selectedLocation === '');
    displayRentals(filteredRentals);
});

document.getElementById('pricefilter').addEventListener('change', function() {
    const selectedPrice = this.value;
    const filteredRentals = rentals.filter(rental => priceFilter(rental.price, selectedPrice));
    displayRentals(filteredRentals);
});

document.getElementById('propertytypefilter').addEventListener('change', function() {
    const selectedType = this.value;
    const filteredRentals = rentals.filter(rental => rental.type === selectedType || selectedType === '');
    displayRentals(filteredRentals);
});

async function addFavourite(favouriteID) {
    try {
        const response = await fetch('save_favourites.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify([{id:favouriteID}])
        });
        if (response.ok) {
            alert('Property added to favourites!');
        } else{
            alert('Failed to add property to Favourites!');
        } 
    } catch (error) {
        console.error('Error adding favourite:', error);
    }
}

// Fetch rentals on page load
fetchRentals();
