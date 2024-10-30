let properties = []; // Global variable to hold properties

async function fetchProperties() {
    try {
        const response = await fetch('get_buyproperties.php');
        if (!response.ok) throw new Error('Network response was not ok');

        const jsonResponse = await response.json();
        properties = jsonResponse; // Store properties globally

        properties.forEach(property => {
            property.currentImageIndex = 0; // Initialize currentImageIndex for each property
        });

        displayProperties(properties);
    } catch (error) {
        console.error('Error fetching properties:', error);
    }
}

function displayProperties(properties) {
    const container = document.querySelector('.propertycontainer');
    container.innerHTML = ''; // Clear the container

    if (properties.length === 0) {
        container.innerHTML = '<p>No rentals available.</p>';
        return;
    }

    properties.forEach(property => {
        let images = [];
        if (property.images) {
            try {
                images = JSON.parse(property.images); // Parse the images from JSON
            } catch (e) {
                console.error(`Error parsing images for rental ID ${property.id}:`, e);
            }
        }

        const propertyDiv = document.createElement('div');
        propertyDiv.className = 'property';
        propertyDiv.innerHTML = `
            <div class="slideshow-container">
                <button onclick="prevImage(${property.id})">❮</button>
                <img id="image-${property.id}" src="Buyimages/${images[0] || ''}" alt="Property Image" class="PropertyImage"/>
                <button onclick="nextImage(${property.id})">❯</button>
            </div>
            <div class="propertycontent">
                <h3>${property.title}</h3>
                <h4>${property.price}</h4>
                <h4><b>${property.location}</b></h4>
                <h5>${property.address}</h5>
                <h5>${property.bedrooms}</h5>
                <h5>${property.bathrooms}</h5>
                <p>${property.description}</p>
                <button onclick="showPopup(${property.id})" class="propertybutton">Read More</button>
                <button onclick="removeProperty(${property.id})" class="remove-button">Remove</button>
                <button onclick="addWishlist(${property.id})" class="wishlist-button">Add to Wishlist</button>
            </div>
        `;
        container.appendChild(propertyDiv);
    });
}

function removeProperty(id) {
    const index = properties.findIndex(property => property.id === id);
    if (index > -1) {
        properties.splice(index, 1); 
        displayProperties(properties);
    }
}

// Image navigation functions
function prevImage(id) {
    const property = properties.find(p => p.id === id);
    const images = JSON.parse(property.images || '[]');
    property.currentImageIndex = (property.currentImageIndex - 1 + images.length) % images.length;
    document.getElementById(`image-${id}`).src = `Buyimages/${images[property.currentImageIndex]}`;
}

function nextImage(id) {
    const property = properties.find(p => p.id === id);
    const images = JSON.parse(property.images || '[]');
    property.currentImageIndex = (property.currentImageIndex + 1) % images.length;
    document.getElementById(`image-${id}`).src = `Buyimages/${images[property.currentImageIndex]}`;
}

// Popup functions
function showPopup(id) {
    const property = properties.find(p => p.id === id);
    const popupContent = `
        <h2>${property.title}</h2>
        <p><b>Price:</b> ${property.price}</p>
        <p><b>Description:</b> ${property.description}</p>
        <p><b>Agency:</b> ${property.agent}</p>
        <p><b>Contact Us:</b><br/>
        <a href="mailto:${property.agentemail}">${property.agentemail}</a></p>
        ${property.googlemap}
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
    if (filter === 'Low') return priceValue < 500000;
    if (filter === 'Medium') return priceValue >= 500000 && priceValue < 1000000;
    if (filter === 'High') return priceValue >= 1000000;
    return true;
}

document.getElementById('searchbarform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent page refresh
    const searchQuery = event.target.elements.Searchbar.value.toLowerCase();
    const filteredProperties = properties.filter(property => property.location.toLowerCase().includes(searchQuery));
    displayProperties(filteredProperties);
});

document.getElementById('locationfilter').addEventListener('change', function() {
    const selectedLocation = this.value;
    const filteredProperties = properties.filter(property => property.location === selectedLocation || selectedLocation === '');
    displayProperties(filteredProperties);
});

document.getElementById('pricefilter').addEventListener('change', function() {
    const selectedPrice = this.value;
    const filteredProperties = properties.filter(property => priceFilter(property.price, selectedPrice));
    displayProperties(filteredProperties);
});

document.getElementById('propertytypefilter').addEventListener('change', function() {
    const selectedType = this.value;
    const filteredProperties = properties.filter(property => property.type === selectedType || selectedType === '');
    displayProperties(filteredProperties);
});

async function addWishlist(wishlistID) {
    try {
        const response = await fetch('save_wishlists.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify([{id:wishlistID}])
        });
        if (response.ok) {
            alert('Property added to Wishlists!');
        } else{
            alert('Failed to add property to Wishlists!');
        } 
    } catch (error) {
        console.error('Error adding favourite:', error);
    }
}

// Fetch properties on page load
fetchProperties();
