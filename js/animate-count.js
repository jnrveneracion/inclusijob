// Function to count up to a target number
function countUp(target, element) {
     const duration = 180; // 2 seconds
     const interval = 10; // Update every 10 milliseconds
     const step = (target / (duration / interval));
 
     let current = 0;
 
     const updateElement = () => {
         if (current < target) {
             current += step;
             element.textContent = Math.round(current);
             requestAnimationFrame(updateElement);
         } else {
             element.textContent = target;
         }
     };
 
     updateElement();
 }
 
 // Get all elements with class 'animate-count'
 const elements = document.querySelectorAll('.animate-count');
 
 // Start counting for each element
 elements.forEach((element) => {
     const target = parseInt(element.textContent, 10);
     countUp(target, element);
 });
 