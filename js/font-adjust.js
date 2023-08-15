const smallerFontButton = document.getElementById('smaller-font');
const largerFontButton = document.getElementById('larger-font');
const changableElements = document.querySelectorAll('.changeable-font-size');

smallerFontButton.addEventListener('click', () => {
     changableElements.forEach(element => {
          const currentFontSize = window.getComputedStyle(element).fontSize;
          const newFontSize = parseFloat(currentFontSize) * 0.8; // Decrease font size by 20%
          element.style.fontSize = `${newFontSize}px`;
     });
});

largerFontButton.addEventListener('click', () => {
     changableElements.forEach(element => {
          const currentFontSize = window.getComputedStyle(element).fontSize;
          const newFontSize = parseFloat(currentFontSize) * 1.2; // Increase font size by 20%
          element.style.fontSize = `${newFontSize}px`;
     });
});