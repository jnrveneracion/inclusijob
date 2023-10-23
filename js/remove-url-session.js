// Check if the page is being refreshed
if (performance.navigation.type === 1) {
     // Remove session data from the URL
     window.history.replaceState({}, document.title, window.location.pathname);
     
     // Clear any session data stored in sessionStorage
     sessionStorage.clear();
}