# chat-application
Real time chat application made with php and node.js

This chat application enables users to engage in live conversations in real-time. It's built using a combination of front-end and back-end technologies, offering several features and utilizing various technologies:

Features:
Real-time Messaging: Users can send and receive messages instantly without page reloading.
User Authentication: Users are required to enter a username to access the chat, facilitating personalized interactions.
Session Handling: Tracks user sessions and logs them in/out, maintaining session data.
Message Formatting: Supports basic text formatting like bold and italic using markdown-like syntax.
Timestamp Display: Messages display the time they were sent in the user's local time zone.
Responsive Design: The interface adapts to different screen sizes for seamless user experience.
Technologies Used:
HTML/CSS/JavaScript: Front-end development for creating the user interface and client-side functionality.
PHP: Backend scripting language for managing user sessions, handling form submissions, and generating HTML content.
Socket.IO (JavaScript Library): Enables real-time bidirectional event-based communication between clients and server.
Node.js (Server-Side): Utilized with Socket.IO to create the server application handling live communication.
jQuery: Simplifies JavaScript code, aiding DOM manipulation and AJAX requests.
Regular Expressions: Employed in PHP to sanitize and format user input for chat messages.
Project Overview:
Client-Side (HTML/JS/CSS): Handles the user interface, message input/output, and form submissions. Utilizes Socket.IO to send/receive messages in real-time.
Server-Side (Node.js): Manages the server application to handle incoming connections, messaging, and disconnections.
PHP Backend (index.php/post.php): Manages user sessions, login/logout functionality, and message handling.
This project offers a simple yet effective platform for real-time communication. It emphasizes real-time interactions, user authentication, and basic message formatting, creating an engaging and interactive chat experience.
