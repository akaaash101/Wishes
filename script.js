document.addEventListener('DOMContentLoaded', function() {
    const wishForm = document.getElementById('wishForm');
    const wishText = document.getElementById('wishText');
    const wishList = document.getElementById('wishList');
    
    // Load wishes from the server
    fetch('get_wishes.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(wish => {
                addWishToList(wish);
            });
        });

    // Handle form submission
    wishForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const newWish = wishText.value;

        // Add the wish to the list
        addWishToList(newWish);

        // Send the wish to the server
        fetch('add_wish.php', {
            method: 'POST',
            body: JSON.stringify({ wish: newWish }),
        });

        wishText.value = '';
    });

    function addWishToList(wish) {
        const li = document.createElement('li');
        li.textContent = wish;
        wishList.appendChild(li);
    }
});
