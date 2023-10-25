// <!-- <select class="form-control" name="birthMonth" id="birthMonth" aria-label="Month" required>
// <option value="">Month</option>
// <option value="01">January</option>
// <option value="02">February</option>
// <option value="03">March</option>
// <option value="04">April</option>
// <option value="05">May</option>
// <option value="06">June</option>
// <option value="07">July</option>
// <option value="08">August</option>
// <option value="09">September</option>
// <option value="10">October</option>
// <option value="11">November</option>
// <option value="12">December</option>
// </select>
// <select class="form-control" name="birthDay" id="birthDay" aria-label="Day" required>
// <option value="">Day</option>
// </select>
// <select class="form-control" name="birthYear" id="birthYear" aria-label="Year" required>
// <option value="">Year</option>
// </select> -->

const birthMonth = document.getElementById('birthMonth');
const birthDay = document.getElementById('birthDay');
const birthYear = document.getElementById('birthYear');
const birthday = document.getElementById('birthday');
let selectedDay = ''; // To keep track of the selected day

// Populate the year dropdown with options ranging from the current year minus 18 to earlier years
const currentYear = new Date().getFullYear();
for (let year = currentYear - 18; year >= 1900; year--) {
    const option = document.createElement('option');
    option.value = year;
    option.textContent = year;
    birthYear.appendChild(option);
}

birthMonth.addEventListener('change', updateDays);
birthYear.addEventListener('change', updateDays);
birthDay.addEventListener('change', updateBirthday);

// Function to populate day options based on the selected month and year
function updateDays() {
    const month = birthMonth.value;
    const year = birthYear.value;
    selectedDay = birthDay.value; // Store the selected day

    // Calculate the number of days in the selected month
    const daysInMonth = new Date(year, month, 0).getDate();

    // Populate day options
    birthDay.innerHTML = '<option value="">Day</option>';
    for (let day = 1; day <= daysInMonth; day++) {
        birthDay.innerHTML += `<option value="${day}">${day}</option>`;
    }

    // Restore the selected day if it exists
    if (selectedDay) {
        birthDay.value = selectedDay;
    }

    // Update the birthday input when the month or year changes
    updateBirthday();
}

// Function to update the hidden birthday input
function updateBirthday() {
    const month = birthMonth.value;
    const day = birthDay.value.padStart(2, '0');
    const year = birthYear.value;
    if (month && day && year) {
        const date = `${year}-${month}-${day}`;
        birthday.value = date;
    } else {
        birthday.value = '';
    }

    // Limit month selection based on the current year
    if (year == currentYear) {
        const currentMonth = new Date().getMonth() + 1;
        birthMonth.innerHTML = '<option value="">Month</option>';
        for (let i = 1; i <= currentMonth; i++) {
            birthMonth.innerHTML += `<option value="${i}">${new Date(0, i - 1).toLocaleString('en', { month: 'long' })}</option>`;
        }
    } else {
        // Restore the full month list
        birthMonth.innerHTML = '<option value="">Month</option>';
        for (let i = 1; i <= 12; i++) {
            birthMonth.innerHTML += `<option value="${i}">${new Date(0, i - 1).toLocaleString('en', { month: 'long' })}</option>`;
        }
    }
}