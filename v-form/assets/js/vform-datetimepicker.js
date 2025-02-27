function initializeDatetimePicker(input) {
  const type = input.getAttribute('data-type') || 'date'; // Default to "date"
  const format = input.getAttribute('data-format') || 'mm/dd/yy'; // Default format

  const calendar = document.createElement('div');
  calendar.classList.add('calendar');
  calendar.style.display = 'none';
  calendar.setAttribute('id', 'vformcalendar');
  calendar.innerHTML = `
    <div class="calendar-header" ${type === 'time' ? 'style="display: none;"' : ''}>
      <button class="prev-month" type="button">◀</button>
      <div class="month-year">
        <select class="month-select"></select>
        <select class="year-select"></select>
      </div>
      <button class="next-month" type="button">▶</button>
    </div>
    ${type !== 'time' ? `
    <table>
      <thead>
        <tr>
          <th>Sun</th>
          <th>Mon</th>
          <th>Tue</th>
          <th>Wed</th>
          <th>Thu</th>
          <th>Fri</th>
          <th>Sat</th>
        </tr>
      </thead>
      <tbody class="calendar-body"></tbody>
    </table>` : ''}
    ${(type === 'time' || type === 'datetime') ? `
    <div class="time-picker">
      <label>Hour:</label>
      <select class="hours"></select>
      <label>Minute:</label>
      <select class="minutes"></select>
    </div>` : ''}
    <button class="set-datetime" type="button">Set</button>
  `;
  input.parentElement.appendChild(calendar);

  let currentDate = new Date();

  function generateMonthYearSelectors() {
    const monthSelect = calendar.querySelector('.month-select');
    const yearSelect = calendar.querySelector('.year-select');

    if (!monthSelect || !yearSelect) return;

    monthSelect.innerHTML = '';
    yearSelect.innerHTML = '';
    const months = [
      'January', 'February', 'March', 'April', 'May', 'June',
      'July', 'August', 'September', 'October', 'November', 'December'
    ];

    months.forEach((month, index) => {
      const option = document.createElement('option');
      option.value = index;
      option.textContent = month;
      if (index === currentDate.getMonth()) option.selected = true;
      monthSelect.appendChild(option);
    });

    const startYear = currentDate.getFullYear() - 150;
    const endYear = currentDate.getFullYear() + 50;
    for (let year = startYear; year <= endYear; year++) {
      const option = document.createElement('option');
      option.value = year;
      option.textContent = year;
      if (year === currentDate.getFullYear()) option.selected = true;
      yearSelect.appendChild(option);
    }

    monthSelect.addEventListener('change', generateCalendar);
    yearSelect.addEventListener('change', generateCalendar);
  }

  function generateCalendar() {
    if (type === 'time') return;

    const monthSelect = calendar.querySelector('.month-select');
    const yearSelect = calendar.querySelector('.year-select');
    const calendarBody = calendar.querySelector('.calendar-body');

    const selectedMonth = parseInt(monthSelect.value);
    const selectedYear = parseInt(yearSelect.value);
    currentDate = new Date(selectedYear, selectedMonth);

    const firstDay = new Date(selectedYear, selectedMonth, 1).getDay();
    const daysInMonth = new Date(selectedYear, selectedMonth + 1, 0).getDate();

    calendarBody.innerHTML = '';
    let row = document.createElement('tr');
    for (let i = 0; i < firstDay; i++) {
      row.appendChild(document.createElement('td'));
    }

    for (let day = 1; day <= daysInMonth; day++) {
      const cell = document.createElement('td');
      cell.textContent = day;
      cell.addEventListener('click', () => {
        input.dataset.selectedDate = new Date(selectedYear, selectedMonth, day).toISOString().split('T')[0];
        highlightSelectedDate(calendarBody, day);
      });
      row.appendChild(cell);
      if ((day + firstDay) % 7 === 0 || day === daysInMonth) {
        calendarBody.appendChild(row);
        row = document.createElement('tr');
      }
    }
  }

  function highlightSelectedDate(calendarBody, day) {
    calendarBody.querySelectorAll('td').forEach(td => {
      td.style.background = td.textContent == day ? '#d0f0d0' : '';
    });
  }
 
  function formatDate(date, format) {
    const day = date.getDate();
    const month = date.getMonth() + 1; // Months are 0-indexed
    const year = date.getFullYear();
    const shortYear = String(year).slice(-2);
    const dayName = date.toLocaleString('default', { weekday: 'long' }); // Full day name
    const monthName = date.toLocaleString('default', { month: 'long' }); // Full month name
    const shortMonthName = date.toLocaleString('default', { month: 'short' }); // Short month name

    // Use a map for replacements
    const replacements = {
        'DD': dayName,                       // Full day name (e.g., "Wednesday")
        'd': day,                            // Day without leading zero
        'dd': String(day).padStart(2, '0'),  // Day with leading zero
        'MM': monthName,                     // Full month name (e.g., "December")
        'M': shortMonthName,                 // Short month name (e.g., "Dec")
        'mm': String(month).padStart(2, '0'), // Month with leading zero
        'm': month,                          // Month without leading zero
        'yy': year,                          // Full year
        'y': shortYear                       // Two-digit year
    };

    // Handle single-quoted text by skipping replacement inside quotes
    return format.replace(/'([^']*)'|DD|mm|m|d{1,2}|MM|M|yy|y/g, (match, quotedText) => {
        if (quotedText !== undefined) {
            // Return quoted text without changes
            return quotedText;
        }
        // Otherwise, replace the token
        return replacements[match] || match;
    });
  }







  

  function generateTimeSelectors() {
    if (type === 'date') return;

    const hoursSelect = calendar.querySelector('.hours');
    const minutesSelect = calendar.querySelector('.minutes');
    hoursSelect.innerHTML = '';
    minutesSelect.innerHTML = '';

    for (let h = 0; h < 24; h++) {
      const option = document.createElement('option');
      option.value = h;
      option.textContent = String(h).padStart(2, '0');
      hoursSelect.appendChild(option);
    }
    for (let m = 0; m < 60; m++) {
      const option = document.createElement('option');
      option.value = m;
      option.textContent = String(m).padStart(2, '0');
      minutesSelect.appendChild(option);
    }
  }


  // Navigation buttons
  calendar.querySelector('.prev-month').addEventListener('click', () => {
    const monthSelect = calendar.querySelector('.month-select');
    const yearSelect = calendar.querySelector('.year-select');

    let selectedMonth = parseInt(monthSelect.value);
    let selectedYear = parseInt(yearSelect.value);

    // Decrease month
    selectedMonth -= 1;
    if (selectedMonth < 0) {
      selectedMonth = 11;
      selectedYear -= 1;
    }

    monthSelect.value = selectedMonth;
    yearSelect.value = selectedYear;
    generateCalendar();
  });

  calendar.querySelector('.next-month').addEventListener('click', () => {
    const monthSelect = calendar.querySelector('.month-select');
    const yearSelect = calendar.querySelector('.year-select');

    let selectedMonth = parseInt(monthSelect.value);
    let selectedYear = parseInt(yearSelect.value);

    // Increase month
    selectedMonth += 1;
    if (selectedMonth > 11) {
      selectedMonth = 0;
      selectedYear += 1;
    }

    monthSelect.value = selectedMonth;
    yearSelect.value = selectedYear;
    generateCalendar();
  });

  input.addEventListener('click', (e) => {
    e.stopPropagation();
    calendar.style.display = calendar.style.display === 'none' ? 'block' : 'none';
    if (type !== 'time') {
      generateMonthYearSelectors();
      generateCalendar();
    }
    generateTimeSelectors();
  });

  document.addEventListener('click', (e) => {
    if (!calendar.contains(e.target) && e.target !== input) {
      calendar.style.display = 'none';
    }
  });

  calendar.querySelector('.set-datetime').addEventListener('click', () => {
    let value = '';
    if (type !== 'time') {
      const selectedDate = input.dataset.selectedDate || new Date().toISOString().split('T')[0];
      value = formatDate(new Date(selectedDate), format);
    }

    if (type === 'datetime' || type === 'time') {
      const hours = calendar.querySelector('.hours').value;
      const minutes = calendar.querySelector('.minutes').value;
      value += type === 'datetime' ? ` ${hours}:${minutes}` : `${hours}:${minutes}`;
    }

    input.value = value;
    calendar.style.display = 'none';
  });

//   generateMonthYearSelectors();
//   generateCalendar();
//   generateTimeSelectors();
}


document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.datetime-input').forEach(input => {
    initializeDatetimePicker(input);
  });
});