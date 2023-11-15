# chat-application
Real time chat application made with php and node.js

This chat application enables users to engage in live conversations in real-time. It's built using a combination of front-end and back-end technologies, offering several features and utilizing various technologies

Functionality:
User Authentication:

Users can enter their name to join the chat session. This is handled using PHP sessions.
The login form ensures that users must enter a name before participating in the chat.
Chat Interface:

Once logged in, users are greeted and presented with a chat interface.
Existing chat history is displayed from a log file (log.html).
Users can send messages using a text input field and submit button.
Real-time Communication:

The application utilizes WebSockets for real-time communication. It uses Socket.IO on the client-side (JavaScript) and Node.js with Socket.IO on the server-side (JavaScript/Node.js).
Messages sent by users are instantly broadcasted to all connected clients, enabling real-time chat functionality.
Technologies Used:
Frontend:

HTML, CSS, and JavaScript: For the structure, styling, and behavior of the web interface.
jQuery: Simplifies DOM manipulation and AJAX requests for smoother interaction.
Socket.IO Client: Enables WebSocket communication between the client and server.
Backend:

PHP: Handles user authentication and some server-side message processing.
Node.js: Powers the server-side of the WebSocket implementation.
Socket.IO: Manages real-time bidirectional communication between the server and clients.
Express.js: Web framework for Node.js used to set up the HTTP server.
Data Management:

Log File (log.html): Stores chat history, allowing the application to load previous messages when users join.
Styling:

CSS: Defines the visual presentation and layout of the chat interface.
Flow of Operation:
When a user joins the chat and sends a message, the message is processed on the client-side.
The message is then sent to the server using Socket.IO.
The server receives the message and broadcasts it to all connected clients, ensuring everyone sees the new message in real-time.
Additionally, when a user logs in or out, messages reflecting these events are appended to the log file to maintain a history of user activity within the chat.
