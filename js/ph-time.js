function updatePHTime() {
     const phTimeElement = document.getElementById('ph-time');
     const now = new Date();

     const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
     const monthsOfYear = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

     const dayOfWeek = daysOfWeek[now.getDay()];
     const month = monthsOfYear[now.getMonth()];
     const day = now.getDate();
     const year = now.getFullYear();
     let hours = now.getHours();
     const minutes = now.getMinutes();
     const seconds = now.getSeconds();
     const meridiem = hours >= 12 ? 'PM' : 'AM';

     // Convert to 12-hour format
     if (hours > 12) {
          hours -= 12;
     }
     if (hours === 0) {
          hours = 12;
     }

     const formattedTime = `${dayOfWeek}, ${month} ${day}, ${year} ${hours}:${minutes}:${seconds} ${meridiem}`;
     
     phTimeElement.textContent = formattedTime;
}

     // Update time initially and then every second
     updatePHTime();
     setInterval(updatePHTime, 1000);