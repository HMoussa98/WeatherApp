// Function to fetch weather data
// Function to fetch weather data
function fetchWeather(latitude, longitude) {
    fetch(`http://dataservice.accuweather.com/forecasts/v1/daily/1day/nl?apikey=izab662&language=dutch&details=true&metric=true`)
        .then(response => response.json())
        .then(data => {
            console.log(data); // Log de ontvangen weerdata in de console
            const currentTemperature = data.DailyForecasts[0].Temperature.Maximum.Value;
            const weatherDescription = data.Headline.Text;
            const weatherInfo = document.getElementById("weatherInfo");
            weatherInfo.innerHTML = `
                <p><strong>Current Temperature:</strong> ${currentTemperature} °C</p>
                <p><strong>Weather Description:</strong> ${weatherDescription}</p>
            `;
        })
        .catch(error => console.error('Error:', error));
}

// Function to get location
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}


// Function to show position
function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // Request to OpenCage Geocoding API
    fetch(`https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=80e5ec40493448d79dccd5e92ed2210b&language=en&pretty=1`)
        .then(response => response.json())
        .then(data => {
            let city = data.results[0].components.city || data.results[0].components.town || data.results[0].components.village || "Unknown";
            const province = data.results[0].components.state || "Unknown";
            const country = data.results[0].components.country || "Unknown";
            const date = new Date();
            const currentTime = date.toLocaleTimeString();
            const currentDate = date.toLocaleDateString();
            const currentDay = date.toLocaleDateString('en-US', { weekday: 'long' }); // Get the current day


            const locationInfo = document.getElementById("locationInfo");
            locationInfo.innerHTML = `
                <p><strong>Country:</strong> ${country}</p>
                <p><strong>Location:</strong> ${city}, ${province}</p>
                <p><strong>Current Time:</strong> ${currentTime}</p>
                <p><strong>Current Date:</strong> ${currentDay}, ${currentDate}</p>
            `;

            // Fetch weather data
            fetchWeather(latitude, longitude);
        })
        .catch(error => console.error('Error:', error));

}
