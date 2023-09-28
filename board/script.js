
// Wait until the DOM is loaded

document.addEventListener('DOMContentLoaded', function() {


const xhr = new XMLHttpRequest();
xhr.open('GET', 'loader_m.php');
xhr.onload = function() {
    if (xhr.status === 200) {
        // Parse the JSON response
        const response = JSON.parse(xhr.responseText);
        // Loop through each post in the response
        response.forEach(post => {
            // Create a new div element with class "post"
            const postDiv = document.createElement('div');
            postDiv.classList.add('post');
            // Create a new h2 element with the post title
            const title = document.createElement('h2');
            title.textContent = post.title;
            // Create a new h4 element with the post content
            const content = document.createElement('h4');
            content.textContent = post.content;
            // Append the title and content to the post div
            postDiv.appendChild(title);
            postDiv.appendChild(content);
            // Append the post div to the document body
            document.body.appendChild(postDiv);
        });
    } else {
        console.error('Error loading posts');
    }
};
xhr.send();


});

function post() {
    // Get values from the input fields
    var title = document.getElementById("title").value;
    var content = document.getElementById("content").value;

    // Create the JSON object
    var postData = {
        title: title,
        content: content
    };

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it: specify the type of request and the URL
    xhr.open("POST", "m_handler.php", true);

    // Set the request header to specify the content type
    xhr.setRequestHeader("Content-Type", "application/json");

    // Define a callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // If the request was successful, you can handle the response here
            // For example, you can refresh the page after a successful post
            location.reload();
        }
        // You can add more conditions to handle other cases (e.g., errors)
    };

    // Send the JSON data in the request without stringifying
    xhr.send(postData);
}
