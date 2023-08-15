const speakButton = document.getElementById('speak-texts');
     const speakableTexts = document.querySelectorAll('.speakable-text');
     let currentlyReadingIndex = 0; // To keep track of the currently reading index

     speakButton.addEventListener('click', () => {
     // Reset background color of all elements
     speakableTexts.forEach(element => {
          element.style.backgroundColor = '';
     });

     // Start reading from the first element
     currentlyReadingIndex = 0;
     readNextText();
     });

     function readNextText() {
     if (currentlyReadingIndex >= speakableTexts.length) {
          return; // All texts have been read
     }

     const textToConvert = speakableTexts[currentlyReadingIndex].textContent;

     if (textToConvert.trim() === '') {
          // Skip empty texts
          currentlyReadingIndex++;
          readNextText(); // Move to the next text
          return;
     }

     // Change background color to gray while speaking
     speakableTexts[currentlyReadingIndex].style.backgroundColor = 'rgb(227, 227, 227)';

     // Convert text to speech
     responsiveVoice.speak(textToConvert, 'US English Female', {
          onend: () => {
          // Restore original background color
          speakableTexts[currentlyReadingIndex].style.backgroundColor = '';

          // Move to the next text
          currentlyReadingIndex++;
          readNextText();
          }
     });
}